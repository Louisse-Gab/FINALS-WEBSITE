<?php
require_once '../connection.php';
require '../vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? 0;

    if (!in_array($action, ['Confirmed', 'Declined']) || !is_numeric($id)) {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit;
    }

    try {
        $conn->begin_transaction();

        // 1. Get adoption record
        $stmt = $conn->prepare("SELECT * FROM adopt WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            throw new Exception("Adoption record not found");
        }

        $adoptionData = $result->fetch_assoc();

        // 2. Determine status
        $status = $action === 'Confirmed' ? 'Confirmed' : 'Declined';

        // 3. Update adoption status
        $update = $conn->prepare("UPDATE adopt SET status = ? WHERE id = ?");
        $update->bind_param("si", $status, $id);
        $update->execute();

        // 4. If confirmed, update pet status
        if ($status === 'Confirmed') {
            $petStmt = $conn->prepare("UPDATE pets SET status = 'Adopted' WHERE pet_name = ?");
            $petStmt->bind_param("s", $adoptionData['desiredPet']);
            $petStmt->execute();
        }

        // 5. Send Email Notification
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shelteroflightphh@gmail.com'; // Replace with your email
            $mail->Password = 'kvrxsmzjxrptpejs';         // Use App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('t3ster3mail123@gmail.com', 'Shelter of Light');
            $mail->addAddress($adoptionData['email'], $adoptionData['fullName']);

            $subject = "Adoption Request " . ($status === 'Confirmed' ? 'Approved' : 'Declined');
            $body = "Hello {$adoptionData['fullName']},<br><br>";
            $body .= "Your adoption request for <strong>{$adoptionData['desiredPet']}</strong> has been <strong>{$status}</strong>.<br><br>";
            $body .= "Thank you for supporting pet adoption.<br><br>Shelter of Light";

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Mailer Error: ' . $mail->ErrorInfo
            ]);
            exit;
        }

        // 6. Commit transaction
        $conn->commit();

        echo json_encode([
            'success' => true,
            'message' => "Adoption request {$status} successfully and email sent."
        ]);

    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

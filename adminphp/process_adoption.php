<?php
require_once '../connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? 0;
    
    // Validate input
    if (!in_array($action, ['approve', 'decline']) || !is_numeric($id)) {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit;
    }

    try {
        // Start transaction
        $conn->begin_transaction();

        // 1. First, verify the record exists
        $stmt = $conn->prepare("SELECT * FROM adopt WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            throw new Exception("Adoption record not found");
        }

        // 2. For approvals: You might want to move to another table
        if ($action === 'approve') {
            // Example: Insert into approved_adoptions table
            // $record = $result->fetch_assoc();
            // $insert = $conn->prepare("INSERT INTO approved_adoptions (...) VALUES (...)");
            // $insert->bind_param(...);
            // $insert->execute();
        }

        // 3. Delete from main table
        $delete = $conn->prepare("DELETE FROM adopt WHERE id = ?");
        $delete->bind_param("i", $id);
        $delete->execute();

        // Commit transaction
        $conn->commit();

        echo json_encode([
            'success' => true,
            'message' => "Adoption request {$action}d successfully"
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
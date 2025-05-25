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

        // 1. First, get the adoption record
        $stmt = $conn->prepare("SELECT * FROM adopt WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            throw new Exception("Adoption record not found");
        }

        $adoptionData = $result->fetch_assoc();
        
        // 2. For approvals: Move to approved table and update pet status
        if ($action === 'approve') {
            // Get pet ID from name
            $petStmt = $conn->prepare("SELECT id FROM pets WHERE pet_name = ?");
            $petStmt->bind_param("s", $adoptionData['desiredPet']);
            $petStmt->execute();
            $petResult = $petStmt->get_result();
            $petId = $petResult->num_rows > 0 ? $petResult->fetch_assoc()['id'] : null;
            
            // Insert into approved_adoptions table
            $insert = $conn->prepare("INSERT INTO approved_adoptions 
                (user_id, pet_id, pet_name, fullName, address, phone, age, email, socialMedia, jobTitle, income, 
                 desiredPet, whyAdopt, primaryCaregiver, whyNow, petOwnershipExperience, currentPets, 
                 currentPetsDetails, petLocation, aloneHours, petCarePlan, vetContact, emergencyPlan, 
                 adoptionReason, submitted_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $insert->bind_param("iisssssssssssssssssssssss", 
                $adoptionData['user_id'], 
                $petId,
                $adoptionData['desiredPet'],
                $adoptionData['fullName'], 
                $adoptionData['address'], 
                $adoptionData['phone'], 
                $adoptionData['age'], 
                $adoptionData['email'], 
                $adoptionData['socialMedia'], 
                $adoptionData['jobTitle'], 
                $adoptionData['income'], 
                $adoptionData['desiredPet'],
                $adoptionData['whyAdopt'],
                $adoptionData['primaryCaregiver'],
                $adoptionData['whyNow'],
                $adoptionData['petOwnershipExperience'],
                $adoptionData['currentPets'],
                $adoptionData['currentPetsDetails'],
                $adoptionData['petLocation'],
                $adoptionData['aloneHours'],
                $adoptionData['petCarePlan'],
                $adoptionData['vetContact'],
                $adoptionData['emergencyPlan'],
                $adoptionData['adoptionReason'],
                $adoptionData['submitted_at']);
            
            $insert->execute();
            
            // Update pet status to 'Adopted' if pet was found
            if ($petId) {
                $updatePet = $conn->prepare("UPDATE pets SET status = 'Adopted' WHERE id = ?");
                $updatePet->bind_param("i", $petId);
                $updatePet->execute();
            }
            
            // Send approval email (you would implement this)
            // sendApprovalEmail($adoptionData['email'], $adoptionData['fullName']);
        } else {
            // For declines, you might want to send a notification
            // sendDeclineEmail($adoptionData['email'], $adoptionData['fullName']);
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
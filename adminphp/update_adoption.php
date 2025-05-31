<?php
require_once '../connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'Missing adoption ID']);
    exit;
}

try {
    // Prepare the update statement
    $stmt = $conn->prepare("UPDATE adopt SET 
        fullName = ?, 
        address = ?, 
        phone = ?, 
        age = ?, 
        email = ?, 
        socialMedia = ?, 
        jobTitle = ?, 
        desiredPet = ?
        WHERE id = ?");
    
    $stmt->bind_param(
        "ssssssssi",
        $data['fullName'],
        $data['address'],
        $data['phone'],
        $data['age'],
        $data['email'],
        $data['socialMedia'],
        $data['jobTitle'],
        $data['desiredPet'],
        $data['id']
    );
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Record updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update record']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
<?php
require_once '../connection.php';

header('Content-Type: application/json');

if (!isset($_GET['name']) || empty($_GET['name'])) {
    echo json_encode(['success' => false, 'message' => 'Pet name is required']);
    exit;
}

$petName = $_GET['name'];

try {
    // Get pet details
    $stmt = $conn->prepare("SELECT * FROM pets WHERE pet_name = ?");
    $stmt->bind_param("s", $petName);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Pet not found']);
        exit;
    }
    
    $petData = $result->fetch_assoc();
    
    echo json_encode([
        'success' => true,
        'message' => 'Pet details retrieved',
        'id' => $petData['id'],
        'pet_name' => $petData['pet_name'],
        'type' => $petData['type'],
        'pet_breed' => $petData['pet_breed'],
        'pet_age' => $petData['pet_age'],
        'pet_gender' => $petData['pet_gender'],
        'pet_vacinated' => $petData['pet_vacinated'],
        'description' => $petData['description']
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}


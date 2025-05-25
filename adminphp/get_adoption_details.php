<?php
require_once '../connection.php';

header('Content-Type: application/json');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid ID']);
    exit;
}

$id = $_GET['id'];

try {
    // Get adoption form details
    $stmt = $conn->prepare("SELECT * FROM adopt WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        throw new Exception("Adoption record not found");
    }
    
    $adoptionData = $result->fetch_assoc();
    
    // Combine all data
    $response = [
        'success' => true,
        'message' => 'Data retrieved successfully',
        ...$adoptionData
    ];
    
    echo json_encode($response);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
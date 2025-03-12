<?php
session_start();
include 'databaseconnection.php'; // Ensure your database connection is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (
        !isset($input['cart']) || 
        !isset($input['deliveryOption']) || 
        !isset($input['paymentOption']) || 
        !isset($input['buildingOption']) || 
        !isset($input['totalAmount'])
    ) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit();
    }

    $cart = $input['cart'];
    $deliveryOption = $input['deliveryOption'];
    $paymentOption = $input['paymentOption'];
    $buildingOption = $input['buildingOption'];
    $totalAmount = $input['totalAmount'];
    $userId = $_SESSION['user_id'] ?? null;

    if (!$userId) {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
        exit();
    }

    // Save order details
    $sql = "INSERT INTO orders (UserId, DeliveryOption, PaymentOption, BuildingOption, TotalAmount) 
            VALUES ('$userId', '$deliveryOption', '$paymentOption', '$buildingOption', '$totalAmount')";

    if ($conn->query($sql)) {
        $orderId = $conn->insert_id; // Get the ID of the inserted order

        // Save each item in the order_items table
        foreach ($cart as $item) {
            $itemName = $conn->real_escape_string($item['name']);
            $itemPrice = $conn->real_escape_string($item['price']);
            $sqlItem = "INSERT INTO order_items (OrderId, ItemName, ItemPrice) 
                        VALUES ('$orderId', '$itemName', '$itemPrice')";

            if (!$conn->query($sqlItem)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save order items.']);
                exit();
            }
        }

        echo json_encode(['status' => 'success', 'message' => 'Order saved successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save order.']);
    }
    exit();
}
?>

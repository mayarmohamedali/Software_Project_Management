<?php
session_start();
include 'databaseconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Retrieve the most recent order by this user
$sql = "SELECT * FROM orders WHERE UserId = '$userId' ORDER BY OrderId DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
    $orderId = $order['OrderId'];
    
    // Retrieve order items
    $sqlItems = "SELECT * FROM order_items WHERE OrderId = '$orderId'";
    $itemsResult = $conn->query($sqlItems);
    $items = $itemsResult->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No recent order found.";
    exit();
}
?>

<!DOCTYPE html>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: rgb(246, 236, 208);
    padding: 20px;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

.home-btn {
            background-color: rgb(255, 211, 91);
            color: black;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .home-btn:hover {
            background-color: rgb(255, 181, 37);
        }
    
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <!-- <link rel="stylesheet" href="style.css"> Link your CSS file -->
</head>
<body>
    <div class="summary-container">
        <h1>Order Summary</h1>
        
        <h3>Order ID: <?php echo $order['OrderId']; ?></h3>
        <p><strong>Delivery Option:</strong> <?php echo ucfirst($order['DeliveryOption']); ?></p>
        <p><strong>Payment Option:</strong> <?php echo ucfirst($order['PaymentOption']); ?></p>
        <p><strong>Building Option:</strong> <?php echo $order['BuildingOption']; ?></p>
        <p><strong>Total Amount:</strong> $<?php echo $order['TotalAmount']; ?></p>
        
        <h2>Items:</h2>
        <ul>
            <?php foreach ($items as $item): ?>
                <li><?php echo $item['ItemName']; ?> - $<?php echo $item['ItemPrice']; ?></li>
            <?php endforeach; ?>
        </ul>


        <form action="rating.php" method="POST" id="home-form">
    <button class="home-btn" type="submit">Back To Home Page</button>
</form>

        <!-- <a href="user.php"  class="btn">Back To Home Page</a> -->
    </div>
</body>
</html>

<?php
// Include database connection
include('db_connection.php');

// Check if the order ID is provided in the URL
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Query to get order details from the orders table
    $order_sql = "SELECT * FROM orders WHERE id = '$order_id'";
    $order_result = mysqli_query($conn, $order_sql);
    
    if ($order_result) {
        $order_data = mysqli_fetch_assoc($order_result);
    } else {
        echo "Order not found.";
        exit;
    }

    // Query to get menu items for the specific order from the order_items table
    $items_sql = "SELECT * FROM order_items WHERE order_id = '$order_id'";
    $items_result = mysqli_query($conn, $items_sql);

    if (!$items_result) {
        echo "Error fetching order items: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Invalid order ID.";
    exit;
}

// Calculate the down payment (20% of total amount)
$dp = $order_data['total_amount'] * 0.20;

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Print</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        h2, h3 {
            text-align: center;
        }
        .instructions {
            margin-top: 20px;
        }
        .btn-print {
            margin-top: 20px;
            text-align: center;
        }
        .btn-print button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>

    <h2>Order Details - Print</h2>
    
    <h3>Order Information</h3>
    <table>
        <tr>
            <td><strong>Name</strong></td>
            <td><?php echo $order_data['nama']; ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?php echo $order_data['email']; ?></td>
        </tr>
        <tr>
            <td><strong>Phone Number</strong></td>
            <td><?php echo $order_data['no_hp']; ?></td>
        </tr>
        <tr>
            <td><strong>Date</strong></td>
            <td><?php echo $order_data['tanggal']; ?></td>
        </tr>
        <tr>
            <td><strong>Total Amount</strong></td>
            <td><?php echo "Rp. " . number_format($order_data['total_amount'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td><strong>Status</strong></td>
            <td><?php echo ucfirst($order_data['status_reservasi']); ?></td>
        </tr>
        <tr>
            <td><strong>Menu Items</strong></td>
            <td><?php echo $order_data['menu_items']; ?></td>
        </tr>
        <tr>
            <td><strong>Down Payment (20%)</strong></td>
            <td><?php echo "Rp. " . number_format($dp, 0, ',', '.'); ?></td>
        </tr>
    </table>

    <h3>Ordered Menu Items</h3>
    <table>
        <thead>
            <tr>
                <th>Menu Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = mysqli_fetch_assoc($items_result)): ?>
                <tr>
                    <td><?php echo $item['menu_item']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo "Rp. " . number_format($item['price'] / $item['quantity'], 0, ',', '.'); ?></td>
                    <td><?php echo "Rp. " . number_format($item['price'], 0, ',', '.'); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h3>Payment Instructions</h3>
    <p>Please make a down payment of 20% of the total amount (as shown above) to the following bank account:</p>
    <p><strong>Bank Account:</strong> Bank XYZ</p>
    <p><strong>Account Number:</strong> 123-456-789</p>
    <p><strong>Account Name:</strong> Your Company Name</p>
    <p>Once the payment is made, please upload the proof of payment to confirm your reservation.</p>

    <div class="btn-print">
        <button onclick="printPage()">Print Order Details</button>
    </div>

</body>
</html>

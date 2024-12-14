<?php
// Include database connection
include('db_connection.php');

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $total_amount = $_POST['total_amount'];

    // Menu items and their quantities
    $menu_items = [
        'MieGoreng' => $_POST['MieGorengQty'],
        'MieKuah' => $_POST['MieKuahQty'],
        'MieMager' => $_POST['MieMagerQty'],
        'AyamLadoIjo' => $_POST['AyamLadoIjoQty'],
        'AyamGeprek' => $_POST['AyamGeprekQty'],
        'PecelAyam' => $_POST['PecelAyamQty'],
        'AyamBakar' => $_POST['AyamBakarQty'],
        'NasiSlengekan' => $_POST['NasiSlengekanQty'],
        'NasiDadar' => $_POST['NasiDadarQty']
    ];

    // Prepare query to insert order into orders table
    $sql = "INSERT INTO orders (nama, email, no_hp, tanggal, total_amount) VALUES ('$nama', '$email', '$no_hp', '$tanggal', '$total_amount')";

    if (mysqli_query($conn, $sql)) {
        // Get the last inserted order ID
        $order_id = mysqli_insert_id($conn);
        
        // Prepare a string to store the menu items
        $menu_items_string = '';
        $prices = [
            'MieGoreng' => 9000,
            'MieKuah' => 11000,
            'MieMager' => 17000,
            'AyamLadoIjo' => 14000,
            'AyamGeprek' => 16000,
            'PecelAyam' => 14000,
            'AyamBakar' => 15000,
            'NasiSlengekan' => 12000,
            'NasiDadar' => 9000
        ];

        // Insert menu items and their quantities into the order_items table
        foreach ($menu_items as $menu_item => $qty) {
            if ($qty > 0) {
                // Get the price for the menu item
                $price = $prices[$menu_item];
                $total_price = $price * $qty;

                // Insert into order_items table
                $sql_item = "INSERT INTO order_items (order_id, menu_item, quantity, price) VALUES ('$order_id', '$menu_item', '$qty', '$total_price')";
                mysqli_query($conn, $sql_item);

                // Append this item to the menu_items_string
                $menu_items_string .= "$menu_item x $qty, ";
            }
        }

        // Remove the trailing comma and space
        $menu_items_string = rtrim($menu_items_string, ", ");

        // Update the orders table with the menu items string
        $update_sql = "UPDATE orders SET menu_items = '$menu_items_string' WHERE id = '$order_id'";
        mysqli_query($conn, $update_sql);

        // Redirect to the order detail page with the order ID
        header('Location: order_details.php?id=' . $order_id);
        exit;

    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Form not submitted.";
}

// Close the database connection
mysqli_close($conn);
?>

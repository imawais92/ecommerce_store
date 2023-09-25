<?php
include "header.php";
?>



<?php
if (isset($_POST['place_order'])) {
    // Collect user information (name, phone, city, address)

    // Initialize total order amount
    $totalAmount = 0;

    // Loop through the selected products
    for ($i = 0; $i < count($_POST['product_name']); $i++) {
        $productName = $_POST['product_name'][$i];
        $quantity = $_POST['quantity'][$i];
        $productPrice = $_POST['product_price'][$i];
        $itemTotal = $quantity * $productPrice;

        // Calculate the total order amount
        $totalAmount += $itemTotal;

        // Insert each product into the database
        $query = "INSERT INTO `user_orders` (`name`, `phone`, `city`, `address`, `product_name`, `quantity`, `product_price`, `itemTotal`)
                  VALUES ('$name', '$phone', '$city', '$address', '$productName', '$quantity', '$productPrice', '$itemTotal')";

        if (mysqli_query($conn, $query)) {
            // Product inserted successfully
        } else {
            echo 'Failed to insert the record: ' . mysqli_error($conn);
        }
    }

    // Output the total order amount
    echo 'Total Order Amount: ' . $totalAmount;
}

?>

<?php
include "footer.php";
?>
<?php
$server = 'localhost';
$username = 'root';
$pass = '';
$db = 'glory';

$conn = mysqli_connect($server, $username, $pass, $db);
?>
<!-- =====================main index page all php start============== -->
<!-- selectproductgotointhecart ================= -->
<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_POST['add_to_cart'])) {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $quantity = 1;
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        ?>
        <?php
        } else {
            $query = "SELECT * FROM glory_product WHERE id = $product_id";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $product = mysqli_fetch_assoc($result);
                $_SESSION['cart'][$product_id] = [
                    'quantity' => $quantity,
                    'product_id' => $product_id,
                    'product_name' => $product['product_name'],
                    'product_price' => $product['product_price'],
                ];
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
        <script>
            window.location.assign('index.php');
        </script>
        <?php
    } else {
        echo "Product ID is not set in the form.";
    }
}
$query = "SELECT * FROM glory_product";
$q = mysqli_query($conn, $query);
?>

<!-- ===================data submit in data_base order table============ -->

<?php
if (isset($_POST['place_order'])) {
    // Collect user information
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    // Initialize a variable to store the total order amount
    $totalOrderAmount = 0;

    // Loop through items in the cart to insert order data
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $product_name = $item['product_name'];
        $quantity = $item['quantity'];
        $product_price = $item['product_price'];
        $itemTotal = $item['quantity'] * $item['product_price'];

        // SQL query to insert the order information
        $query = "INSERT INTO `user_orders` (`name`, `phone`, `city`, `address`, `product_name`, `quantity`, `product_price`, `itemTotal`)
                  VALUES ('$name', '$phone', '$city', '$address', '$product_name', '$quantity', '$product_price', '$itemTotal')";

        if (mysqli_query($conn, $query)) {
            // Successfully inserted the order data
            $totalOrderAmount += $itemTotal;

            // Remove the product from the cart
            unset($_SESSION['cart'][$product_id]);
        } else {
            echo 'Failed to insert the record: ' . mysqli_error($conn);
        }
    }

    // Display a message with the total order amount
    echo '<script>alert("Your order has been placed successfully. Total Amount: ' . $totalOrderAmount . '")</script>';
}

?>
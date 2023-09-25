<?php
$server = 'localhost';
$username = 'root';
$pass = '';
$db = 'glory';

$dbc = mysqli_connect($server, $username, $pass, $db);

// if (!$dbc) {
//     echo 'Not connected.';
// } else {
//     echo 'Connected.';
// }

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_des = $_POST['product_des'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];

    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $image_tmp = $_FILES['photo']['tmp_name'];
        $image_name = $_FILES['photo']['name'];
        $image_path = 'img/' . $image_name;

        // Move the uploaded image to the desired location
        if (move_uploaded_file($image_tmp, $image_path)) {
            // Insert the product details into the glory_product table
            $query = "INSERT INTO `glory_product` (`product_name`, `product_des`, `product_price`, `photo`, `product_category`) VALUES ('$product_name', '$product_des', '$product_price', '$image_name', '$product_category')";
            $q = mysqli_query($dbc, $query);

            if ($q) {
                // header("Location: service.php");
                echo '<script>alert("Your data added Successfully")</script>';
            } else {
                echo 'Failed to insert the product record.';
            }
        } else {
            echo 'Error moving the uploaded image.';
        }
    } else {
        echo 'Error uploading the image.';
    }
}


if (isset($_POST['update'])) {
    $edit_id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $product_des = $_POST['product_des'];
    $product_price	 = $_POST['product_price'];


    $query = "UPDATE `glory_product` SET `product_name`='$product_name', `product_des`='$product_des',`product_price`='$product_price',  WHERE id = '$edit_id'";
    $q = mysqli_query($dbc, $query);

    if ($q) {
        echo "Data updated successfully.";
        exit();
    } else {
        echo "Failed to update data: " . mysqli_error($dbc);
    }
}


if (isset($_REQUEST['delete'])) {
    $del_id = $_REQUEST['delete'];

    $query = "DELETE FROM `glory_product` WHERE id = $del_id";

    $result = mysqli_query($dbc, $query);

    if ($result) {
        echo "Data deleted successfully.";
    } else {
        echo "Failed to delete data: " . mysqli_error($dbc);
    }
}

if (isset($_REQUEST['edit'])) {
    $edit_id = $_REQUEST['edit'];
    $query = "SELECT * FROM `user_orders` WHERE id = $edit_id";

    $result = mysqli_query($dbc, $query);
    $data = mysqli_fetch_assoc($result);
} ?>
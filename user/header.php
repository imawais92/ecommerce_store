<?php
// session_start(); // Start the session
include "db/dbc_connection.php";

// Initialize the "cart" array if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <!-- small================navbar======================= -->
    <div class="container-fluid " style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 10.5);background-color:#ffff">
        <div class="row">
            <div class="col-md-2 col-lg-2 col-sm-2 mt-3 pl-4">
                <div>
                    <img src="img/customer-service (2).png" alt="" width="30px"> Customer Support
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-6 pl-5 mt-3">
                <div class="pl-4">
                    <p><img src="img/gmail.png" alt="" width="20px"> hellovazii@gmail.com <span>| <img
                                src="img/facebook (2).png" alt="" width="20px"> Follow us on Facebook </span> <span>|
                            <img src="img/google.png" alt="" width="20px"> Follow us on Facebook </span></p>
                </div>
            </div>
            <!-- modal====================add toc cart -->
            <div class="col-md-4 col-lg- col-sm-4 pl-5 mt-3" style="float:right;display: space-between;">
                <div style="float:right;">
                    <!-- Button trigger modal -->
                    <a href="#" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                        <img src="img/add-to-cart.png" id="cart-icon" alt="" width="90px" ;>
                        <?php
                        $cartItemCount = count($_SESSION['cart']);
                        if ($cartItemCount > 0) {
                            echo "<span class='cart-count'>($cartItemCount)</span>";
                        }
                        ?>
                    </a>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <?php
                                        if ($cartItemCount > 0) {
                                            echo 'Your Cart';
                                        } else {
                                            echo 'Your Cart is Empty';
                                        }
                                        ?>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    if ($cartItemCount > 0) {
                                        ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product Images</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $totalCartPrice = 0; // Initialize total cart price
                                            
                                                if (isset($_SESSION['cart'])) {
                                                    foreach ($_SESSION['cart'] as $product_id => $item) {
                                                        $query = "SELECT * FROM glory_product WHERE id = $product_id";
                                                        $result = mysqli_query($conn, $query);

                                                        if ($result) {
                                                            $product = mysqli_fetch_assoc($result);

                                                            // Calculate the total price for this product
                                                            $itemTotal = $product['product_price'] * $item['quantity'];
                                                            $totalCartPrice += $itemTotal; // Update the total cart price
                                                            ?>
                                                            <tr class="cart-row" data-product-id="<?php echo $product_id; ?>">
                                                                <td>
                                                                    <img src="../adminpanel/img/<?php echo $product['photo'] ?>"
                                                                        alt="Product Image"
                                                                        style="width: 50px; height: 50px; border-radius: 50px;">
                                                                </td>
                                                                <td>
                                                                    <?php echo $product['product_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control quantity"
                                                                        value="<?php echo $item['quantity']; ?>" min="1">
                                                                </td>
                                                                <td>
                                                                    <span class="price"
                                                                        data-price="<?php echo $product['product_price']; ?>">
                                                                        <?php echo $product['product_price']; ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="total">
                                                                        <?php echo $itemTotal; ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <form method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to remove this product?');">
                                                                        <input type="hidden" name="remove_product_id"
                                                                            value="<?php echo $product_id; ?>">
                                                                        <button type="submit" class="btn btn-outline-danger"
                                                                            name="remove_item">Remove</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        } else {
                                                            // Handle the case where the query fails
                                                            echo "Error: " . mysqli_error($conn);
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <h3 class="text-center text-primary">Total Cart Price: Rs <span id="totalCartPrice">
                                                <?php echo $totalCartPrice; ?>
                                            </span></h3>
                                        <a class="btn btn-primary" href="check_out.php" role="button"
                                            style="float:right">Check Out</a>

                                        <?php
                                    } else {
                                        // Display a message when the cart is empty
                                        echo '<p>Your cart is empty. Continue shopping.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pr-2 mr-2" style="float:right;border-right:2px solid black"><a
                        href="../session/register.php"><img src="img/man.png" alt="" white="10px"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar================= -->
    <nav class=" mt-3 navbar navbar-expand-lg navbar-light"
        style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(121,88,9,0.9976365546218487) 100%, rgba(0,212,255,1) 100%);">
        <a class="navbar-brand" href="#"> <img src="img/logo.png" alt="" style="width:20%"> UPHAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse pl-4" id="navbarSupportedContent" style="font-weight:500;font-size:20px;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color:white;margin-right: 20px;">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mobile.php" style="color:white;margin-right: 20px;">MOBILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="laptop.php" style="color:white;margin-right: 20px;">LAPTOP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="watches.php" style="color:white;margin-right: 20px;">WATCHES</a>
                </li>
            </ul>
            <form method="POST" action="#" class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        name="search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </form>
        </div>
    </nav>


    <!-- \==================contant========= -->
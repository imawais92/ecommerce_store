<?php
session_start();
include "header.php";
include "all.php";
?>
<!-- ===============product information display ================= -->
<div class="text-center mt-5">
    <h2 style="font-size:40px;font-weight:800;"><i> TOTAL PRODUCT IN YOUR CART </i> </h2>
</div>
<form action="#" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-8 mt-3">
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                    <img id="cart-icon" alt="" width="90px">
                    <?php
                    $cartItemCount = count($_SESSION['cart']);
                    if ($cartItemCount > 0) {
                        echo "<span>($cartItemCount)</span>";
                    }
                    ?>
                </a>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <img src="../adminpanel/img/<?php echo $product['photo'] ?>" alt="Product Image"
                                                        style="width: 50px; height: 50px; border-radius: 50px;">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="product_name"
                                                        value="<?php echo $product['product_name']; ?>">
                                                    <?php echo $product['product_name']; ?>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control quantity" name="quantity"
                                                        value="<?php echo $item['quantity']; ?>" min="1">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="product_price" id=""
                                                        value="<?php echo $product['product_price']; ?>">
                                                    <?php echo $product['product_price']; ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="itemTotal" value="<?php echo $itemTotal; ?>">
                                                    <?php echo $itemTotal; ?>
                                                </td>
                                                <td>
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
                        <h3 class="text-center text-primary">Total Product Price : Rs <span id="totalCartPrice">
                                <?php echo $totalCartPrice; ?>
                            </span></h3>

                        <!-- <a type="submit" class="btn btn-" href="place_order.php" role="button"
                        style="float:right;background-color:#f57224;color:white">Place order
                        <?php
                        echo "<span>($cartItemCount)</span>"; ?>
                    </a> -->
                    <div class="col-md-4 col-lg-4 col-sm-4 mt-5">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Mobile Number</label>
                    <input class="form-control" type="text" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input class="form-control" type="text" name="city" id="city" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" type="text" name="address" id="address" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" name="place_order">Place Order</button>
            </div>
                        <?php
                    } else {
                        // Display a message when the cart is empty
                        echo '<div class="text-center  mt-5"><p class="text-center mt-5">There are no items in this cart</p>
                    <a type="submit" class="btn btn-outline-dark text-center"href="index.php" role="button" name="add_to_cart">CONTINUE SHOPPING</a> </div> ';
                    }
                    ?>
                </div>
            </div>
            <!-- user iformation======================= -->
            
        </div>
    </div>
</form>



<?php
if (isset($_POST['remove_item'])) {
    $remove_product_id = $_POST['remove_product_id'];
    if (isset($_SESSION['cart'][$remove_product_id])) {
        unset($_SESSION['cart'][$remove_product_id]);
        echo '<script>alert("your product has been removed in this cart")</script>';
        ?>
        <script>
            window.location.assign('check_out.php');
        </script>
        <?php
    }
}

?>


<?php
include "footer.php";
?>
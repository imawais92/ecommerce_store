<?php
session_start();
include "header.php";
include "all.php";
?>

<!-- ===============product information display ================= -->
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
        </div>

        <!-- User information section -->
        <div class="col-md-4 col-lg-4 col-sm-4 mt-5">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" required placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="phone">Mobile Number</label>
                <input class="form-control" type="text" name="phone" id="phone" required
                    placeholder="Enter your mobile number">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input class="form-control" type="text" name="city" id="city" required placeholder="Enter your city">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address" required
                    placeholder="Enter your address">
            </div>
            <button type="submit" class="btn btn-primary btn-lg" name="place_order">Place Order</button>
        </div>
    </div>
</div>

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

include "footer.php";
?>
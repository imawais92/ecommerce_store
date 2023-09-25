<?php
session_start();
include "header.php";
include "all.php";
?>
<div>
    <img class="d-block w-100" src="img/laptop-slider.jpg" alt="First slide" height="50%">
</div>

<div class="container">
    <div class="row">
        <?php
        $sql = "SELECT * FROM glory_product WHERE product_category = 'laptop'";
        $result = mysqli_query($conn, $sql);
        while ($c = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4 col-lg-4 col-sm-4 mt-5">
                <div class="card-container" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card" style="width: 100%; height: 100%;">
                        <img src="../adminpanel/img/<?php echo $c['photo'] ?>" alt="not found" width="348" height="350"
                            style="object-fit:containe;">
                        <h5 class="pl-3 mt-4">
                            <?php echo $c['product_name'] ?>
                        </h5>
                        <p class="pl-3" style="color: red;">Rs
                            <span class="price" data-price="<?php echo $c['product_price']; ?>"><?php echo $c['product_price']; ?></span>
                        </p>
                        <p class="pl-3" style="height: 20px; overflow-y: hidden;">
                            <?php echo $c['product_des'] ?>
                        </p>
                        <!-- Add to Cart button -->
                        <form class="pl-3" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $c['id']; ?>">
                            <button type="submit" class="btn btn-outline-dark mb-3" name="add_to_cart">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
if (isset($_POST['remove_item'])) {
    $remove_product_id = $_POST['remove_product_id'];
    if (isset($_SESSION['cart'][$remove_product_id])) {
        unset($_SESSION['cart'][$remove_product_id]);
        ?>
        <script>
            window.location.assign('laptop.php');
        </script>
        <?php
    }
}
?>
<?php
include "footer.php";
?>
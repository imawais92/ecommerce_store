<?php
session_start();
include "header.php";
include "all.php";
?>
<div>
    <img src="img/slider-img1.jpg" alt="" width="100%">
</div>
<div class="container">
    <div class="row text-center">
        <?php
        $sql = "SELECT * FROM glory_product WHERE product_category = 'mobile'";
        $result = mysqli_query($conn, $sql);
        while ($c = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4 col-lg-4 col-sm-4 mt-5">
                <div class="card-container" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card" style="width: 100%; height: 100%;">
                        <img src="../adminpanel/img/<?php echo $c['photo'] ?>" alt="not found" width="348" height="350"
                            style="object-fit:containe;">
                        <h5>
                            <?php echo $c['product_name'] ?>
                        </h5>
                        <p style="color: red;">Rs
                            <span class="price" data-price="<?php echo $c['product_price']; ?>"><?php echo $c['product_price']; ?></span>
                        </p>
                        <p style="height: 20px; overflow-y: hidden;">
                            <?php echo $c['product_des'] ?>
                        </p>
                        <!-- Add to Cart button -->
                        <form method="post">
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
include "footer.php";
?>
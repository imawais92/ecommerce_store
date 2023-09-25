<?php
include "header.php";
include "all.php";

?>


<div class="container mt-3">
    <div class="row ">
        <div class="col-md-12 col-lg-12 col-sm-12 ">
            <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr style="background: linear-gradient(269.22deg, #023D5F -24.3%, #00A3FF 99.48%);color:white;">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Address</th>
                            <!-- <th>Product image</th> -->
                            <th>Proudct Name</th>
                            <th>Quantiity</th>
                            <th>Product Price</th>
                            <th>Item Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM user_orders";
                        $result = mysqli_query($dbc, $query);
                        $x = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>

                                <td>
                                    <?php echo $row['id'] ?>
                                </td>


                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['phone'] ?>
                                </td>
                                <td>
                                    <?php echo $row['city'] ?>
                                </td>
                                <td>
                                    <?php echo $row['address'] ?>
                                </td>
                                <!-- <td>
                                    <img src="img/<?php echo $row['photo'] ?>" alt=""
                                        style="width:50px;height:50px; border-radius:50px;">

                                </td> -->
                                <td>
                                    <?php echo $row['product_name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['quantity'] ?>
                                </td>
                                <td>
                                    <?php echo $row['itemTotal'] ?>
                                </td>
                                <td>
                                    </a>
                                    <a href="glory_product.php?edit=<?= $row['id'] ?>">
                                        <img src="img/edit.png" alt="" style="width: 25px;">
                                    </a>

                                    <a href="glory_product.php?delete=<?= $row['id'] ?>">
                                        <img src="img/trash (1).png" alt="" style="width:25px;">
                                </td>
                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<?php
include "footer.php";
?>
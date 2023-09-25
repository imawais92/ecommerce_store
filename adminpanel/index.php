<?php
include "header.php";
include "all.php";

?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">

                                <div class="form-group">
                                    <input type="hidden" name="edit_id" value="<?php echo $data['id'] ?>">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="product_name"
                                        placeholder="Enter your name" required
                                        value="<?php echo @$data['product_name'] ?>">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="father">Product price</label>
                                    <input type="number" class="form-control" id="father" name="product_price"
                                        placeholder="Enter your father name" required
                                        value="<?php echo @$data['product_price'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Product Category</label>
                                <select name="product_category" id="product_category" class="form-control">
                                    <option value="mobile">Mobile</option>
                                    <option value="laptop">Laptop</option>
                                    <option value="smart_watch">Smart Watch</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Product Description</label>
                                    <textarea type="text" class="form-control" id="" cols="30" rows="0"
                                        name="product_des" placeholder="Enter your email" required
                                        value="<?php echo @$data['product_des'] ?>"></textarea>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <label for="photo">Image</label>
                                    <input type="file" name="photo" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="row ">
        <div class="col-md-12 col-lg-12 col-sm-12 ">
            <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr style="background: linear-gradient(269.22deg, #023D5F -24.3%, #00A3FF 99.48%);color:white;">
                            <th>Id</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Description</th>
                            <th>Product Category</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM glory_product";
                        $result = mysqli_query($dbc, $query);
                        $x = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>

                                <td>
                                    <?php echo $row['id'] ?>
                                </td>

                                <td>
                                    <img src="img/<?php echo $row['photo'] ?>" alt=""
                                        style="width:50px;height:50px; border-radius:50px;">

                                </td>
                                <td>
                                    <?php echo $row['product_name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['product_price'] ?>
                                </td>
                                <td>
                                    <?php echo $row['product_des'] ?>
                                </td>
                                <td>
                                    <?php echo $row['product_category'] ?>
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
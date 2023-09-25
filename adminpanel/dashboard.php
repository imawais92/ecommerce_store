<?php
include "header.php";
include "all.php";
?>
<style>
    .service-box {
        background-color: white;
        /* Background color */
        padding: 20px;
        /* Padding inside the box */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Box shadow */
        border-radius: 15px;
        /* Border radius for rounded corners */
        /* text-align: center; */
        /* Center-align text */
    }

    /* Add responsive styles */
    @media (max-width: 767px) {
        .service-box {
            margin-bottom: 20px;
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-4 mb-4">
            <div class="service-box">
                <img class="mb-4" src="img/bag.png" alt="" width="100px" style="display:flex:float">
                <?php
                $query = "SELECT id FROM glory_product ORDER BY  id";
                $query_run = mysqli_query($dbc, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h2>' . $row . '<br> </h2>';

                echo " <h2> Total Product </h2> ";
                ?>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 mb-4">
            <div class="service-box">
                <img class="mb-4" src="img/user (5).png" alt="" width="100px">
                <?php
                $query = "SELECT id FROM glory_user ORDER BY  id";
                $query_run = mysqli_query($dbc, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h2>' . $row . '<br> </h2>';
                echo " <h2> Total Users </h2> ";
                ?>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 mb-4">
            <div class="service-box">
                <img class="mb-4" src="img/truck.png" alt="" width="100px">
                <?php
                $query = "SELECT id FROM user_orders ORDER BY  id";
                $query_run = mysqli_query($dbc, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h2>' . $row . '<br> </h2>';
                echo " <h2> Total Orders </h2> ";
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
            <canvas id="myChart" style="width:500%;max-width:1000px"></canvas>
            <script>
                const xValues = ["Total Product", "Total Users", "Total Orders"];
                const yValues = [55, 49, 44, 24, 15];
                const barColors = ["red", "green", "blue", "orange", "brown"];

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: " Daily Updates"
                        }
                    }
                });
            </script>

        </div>
    </div>
</div>
<?php
include "footer.php";
?>
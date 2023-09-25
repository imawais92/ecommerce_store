<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<!-- <script src="index.js"></script> -->
<script>
    $(document).ready(function () {
        // Function to update the total price when quantity changes
        function updateTotalPrice(row) {
            const quantity = parseInt($(row).find('.quantity').val());
            const price = parseFloat($(row).find('.price').data('price'));
            const total = quantity * price;
            $(row).find('.total').text(total.toFixed(2));
        }

        // Update total prices on page load
        $('.cart-row').each(function () {
            updateTotalPrice(this);
        });

        // Listen for changes in quantity input fields
        $('.quantity').on('input', function () {
            updateTotalPrice($(this).closest('.cart-row'));
        });

        // Function to update the cart count icon
        function updateCartCount() {
            const itemCount = Object.keys(<?php echo json_encode($_SESSION['cart']); ?>).length;
            $('#cart-icon').text(itemCount);
        }

        // Update cart count on page load
        updateCartCount();

        // Handle adding a product to the cart
        $('form[name="add_to_cart_form"]').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'add_to_cart.php',
                data: $(this).serialize(),
                success: function () {
                    updateCartCount();
                }
            });
        });

        // Display cart details when cart icon is clicked
        $('#cart-icon').click(function () {
            $('#cart-details').modal('show');
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cartRows = document.querySelectorAll(".cart-row");
        const totalCartPriceElement = document.getElementById("totalCartPrice");

        cartRows.forEach((row) => {
            const quantityInput = row.querySelector(".quantity");
            const priceElement = row.querySelector(".price");
            const totalElement = row.querySelector(".total");

            quantityInput.addEventListener("input", function () {
                updateRowTotal(row);
                updateTotalCartPrice(cartRows, totalCartPriceElement);
            });
        });

        function updateRowTotal(row) {
            const quantityInput = row.querySelector(".quantity");
            const priceElement = row.querySelector(".price");
            const totalElement = row.querySelector(".total");

            const quantity = parseInt(quantityInput.value);
            const price = parseFloat(priceElement.getAttribute("data-price"));
            const total = quantity * price;

            if (!isNaN(total) && total >= 0) {
                totalElement.textContent = total.toFixed(2);
            } else {
                // Prevent negative quantities
                quantityInput.value = 1;
                totalElement.textContent = price.toFixed(2);
            }
        }

        function updateTotalCartPrice(cartRows, totalCartPriceElement) {
            let newTotalCartPrice = 0;
            cartRows.forEach((cartRow) => {
                const rowTotal = parseFloat(cartRow.querySelector(".total").textContent);
                newTotalCartPrice += rowTotal;
            });
            totalCartPriceElement.textContent = newTotalCartPrice.toFixed(2);
        }
    });
</script>
<script></script>
<!-- ===============footer ==================== -->
<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small indigo mt-5" style="background-color: black; color: white">

    <div class="container text-center text-md-left">

        <div class="row">

            <div class="col-md-3 mx-auto">

                <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color:red;">PRIVACY POLICY</h5>
                <p style="font-size: 14px;word-spacing: 2px;">Our eCommerce website prioritizes your privacy. We
                    protect your personal
                    information and ensure secure <i> transactions. We only collect essential data for </i>seamless
                    shopping
                    experiences and do not share your details with third parties. Your trust is our commitment to
                    maintaining a safe and secure shopping environment.</p>

            </div>

            <hr class="clearfix w-100 d-md-none">

            <div class="col-md-3 mx-auto" style="line-height:2">
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color:red;">CATAGORY</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!" style="color: white;">HOME</a>
                    </li>
                    <li>
                        <a href="#!" style="color: white;">MOBILE</a>
                    </li>
                    <li>
                        <a href="#!" style="color: white;">LAPTOPS</a>
                    </li>
                    <li>
                        <a href="#!" style="color: white;">WATCHES</a>
                    </li>
                </ul>

            </div>

            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-3 mx-auto" style="line-height:2">
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color:red;">PAGES</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!" style="color: white;">ABOUT US</a>
                    </li>
                    <li>
                        <a href="#!" style="color: white;">CONTACT US</a>
                    </li>
                    <li>
                        <a href="#!" style="color: white;">PRIVACY POLICY</a>
                    </li>
                    <li>
                        <a href="#!" style="color: white;">TERMS & CONDITIONS</a>
                    </li>
                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none">

            <div class="col-md-3 mx-auto">

                <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color:red;">PAYMENT METHOD</h5>
                <div>
                    <img src="img/bank (1).png" alt="" style="width:50px">
                </div>
                <div class="mt-4">
                    <img src="img/paypal.png" alt="" width="50px" height="auto">
                    <img src="img/atm-card.png" alt="" width="50px" height="auto">
                    <img src="img/visa.png" alt="" width="50px" height="auto">
                </div>
                <div class="mt-4">
                    <img src="img/qr-code (1).png" alt="" style="width:50px">
                </div>
            </div>

        </div>

    </div>

    <div class="footer-copyright text-center py-3">Develope By Vazii sab © 2020 Copyright:
        <a href="/" style="color: blue;">MDBootstrap.com</a>
    </div>

</footer>

<!-- Footer -->
</body>

</html>
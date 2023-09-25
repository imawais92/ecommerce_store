<?php
include "all.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                <img class="mt-5" src="logo.png" alt="" width="40%">
                <div class="mt-4">
                    <h2>Login</h2>
                </div>
                <p class="mt-3 text-dark">If you don’t have an account</p> You can <a href="register.php"
                    class="text-info">Register
                    here!</a></h6>
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form action="" method="post">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Enter Email</label>
                                <input type="email" id="loginName" class="form-control" placeholder="Enter your email"
                                    name="glory_email">
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">Enter Password</label>
                                <input type="password" id="loginPassword" class="form-control"
                                    placeholder="Enter your password" name="glory_password" />
                            </div>
                            <div>
                                <button type="login" name="login" class="btn btn-primary btn-block mb-7"
                                    style="border-radius:50px;background: linear-gradient(184.27deg, #00A3FF 3.46%, #023D5F 96.53%);">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 mt-5">
                <div class="">
                    <img class="mt-5" src="2mobile.jpg" alt="" width="100%" height="550px" style=" border-radius:30px 0px ">
                </div>
            </div>
        </div>
    </div>

</html>
</body>
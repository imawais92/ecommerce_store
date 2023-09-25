<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'glory';

$dbc = mysqli_connect($server, $username, $password, $db);

// if (!$dbc) {
//     echo 'Not connected.';
// } else {
//     echo 'Connected.';
// }
?>
<!-- =============register============= -->


<?php
if (isset($_POST['submit'])) {
    $name = $_POST['glory_name'];
    $email = $_POST['glory_email'];
    $password = $_POST['glory_password'];

    $query = "INSERT INTO `glory_user` (`glory_name`,  `glory_email`, `glory_password`) VALUES
			('$name', '$email', '$password')";

    $q = mysqli_query($dbc, $query);
    if ($q) {
        header("location:login.php");
        // echo 'Data inserted successfully.';
    } else {
        echo 'Error: ' . mysqli_error($dbc);
    }
}
?>
<!-- =============login============= -->


<?php
if (isset($_POST['login'])) {
    $name = $_POST['glory_email'];
    $password = $_POST['glory_password'];

    $query = "SELECT * FROM `glory_user` WHERE glory_email='$name' AND glory_password='$password'";
    $q = mysqli_query($dbc, $query);
    if (mysqli_num_rows($q) > 0) {

        $a = mysqli_fetch_assoc($q);
        // print_r($a['id']);
        $_SESSION['user_id'] = $a['id'];
        // print_r($_SESSION['user_id']);
        header("location:../user/index.php");

        echo '<script>alert("Your data match with our record")</script>';

    } else {
        echo '<script>alert("Your data don`t match with our record")</script>';

    }
}

?>
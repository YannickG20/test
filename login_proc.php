<?php

include("global.php");

$username = mysqli_real_escape_string($connection,$_POST["username"]);
$u_password = mysqli_real_escape_string($connection,$_POST["u_password"]);

$result = mysqli_query($connection,"select * from users_llk where username = '$username' and u_password = '$u_password'");

// check if login info is valid
if (mysqli_num_rows($result) == 0) {
    $errormessage = "Invalid Login";
    include("login.php");
    die();
}

echo "logged in";
// compare to see if login match the database
$row = mysqli_fetch_assoc($result);
$_SESSION["username"] = $row["username"];
$_SESSION["u_password"] = $row["u_password"];
$_SESSION["user_id"] = $row["user_id"];

header("Location: home_page.php");

?>

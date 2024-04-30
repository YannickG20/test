<?php

include("global.php");

$username = $_POST["username"];
$email = $_POST["email"];
$u_password = $_POST["u_password"];
$r_password = $_POST["r_password"];
$user_id = $_POST["user_id"];

$username = mysqli_real_escape_string($connection,$username);
$email = mysqli_real_escape_string($connection,$email);
$u_password = mysqli_real_escape_string($connection,$u_password);
$user_id = intval($user_id);

// validating username
if ($username == "")
	$errormessage .= "Username is required<br />";

// checking the email is valid or empty
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errormessage .= "Valid email is required<br />";
}
else{
    $checkDuplicate = mysqli_query($connection,"select email from users_llk where email = '$email'");
    if(mysqli_num_rows($checkDuplicate)) {
        $errormessage .= "This email has been used<br />";
    }
        }
  
// validating password
if (strlen($u_password) < 8)
	$errormessage .= "Password is too short<br />";

if ($u_password !== $r_password)
    $errormessage .= "Password doesn't match<br />";


if ($errormessage != "") {
    include("register.php");
    die();
}


if ($id == 0)
    $sql = "insert into users_llk (username,email,u_password) values ('$username','$email','$u_password')";
else
    $sql = "select * from appointment where username = '$username'";

mysqli_query($connection,$sql) or die("Invalid SQL: $sql " . mysqli_error($connection));

header("Location: login.php");

?>

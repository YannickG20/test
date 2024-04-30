<?php
include ("global.php");

session_start();

if(isset($_SESSION['user_id'])){ 
    $user_id = $_SESSION['user_id'];
    $service_id = $_POST["service_id"];
    $appointment_date = $_POST["appointment_date"];
    $dropoff_time = $_POST["dropoff_time"];
    $appointment_id = $_POST["appointment_id"];
    $day_of_week = date("l", strtotime($appointment_date));

    $errormessage = '';

    // validation
    if ($service_id == "")
        $errormessage .= "Service type is required<br />";

    if ($appointment_date == "")
        $errormessage .= "Please select the date of your appointment<br />";

    if ($dropoff_time == "")
        $errormessage .= "Please select a dropoff time<br />";

    if ($errormessage != "") {
        include("appointments.php");
        die();
    }

    $appointment_id = intval($appointment_id);
    $service_id = intval($service_id);
    $user_id = intval($user_id);
    $appointment_date = mysqli_real_escape_string($connection,$appointment_date);
    $dropoff_time = mysqli_real_escape_string($connection,$dropoff_time);
    $pickup_time = mysqli_real_escape_string($connection,$pickup_time);
    $day_of_week = mysqli_real_escape_string($connection,$day_of_week);

    //getting the service info
    $service_query = mysqli_query($connection,"select * from services where service_id = $service_id");
    $service_row = mysqli_fetch_assoc($service_query);
    $service_name = mysqli_real_escape_string($connection, $service_row["service_name"]);
    $service_duration = mysqli_real_escape_string($connection, $service_row["duration"]);

    // calculate pick_up time
    $duration_parts = explode(":", $service_row["duration"]); // the explode function splits the duration into hours and minutes
    $hours = intval($duration_parts[0]);
    $minutes = intval($duration_parts[1]);
    $duration_minutes = $hours * 60 + $minutes;

    $start_time = strtotime($_POST["dropoff_time"]); // convert start time to a Unix timestamp
    $pickup_time = date('H:i', strtotime("+$duration_minutes minutes", $start_time));

    // Calculate total duration of appointment in minutes
    $start_datetime = strtotime($dropoff_time);
    $end_datetime = strtotime($pickup_time);
    $total_duration = ($end_datetime - $start_datetime) / 60; // convert to minutes
    $blocks_needed = ceil($total_duration / 15);

    //getting the user info
    $user_query = mysqli_query($connection,"select * from users_llk where user_id = $user_id");
    $user_row = mysqli_fetch_assoc($user_query);
    $username = mysqli_real_escape_string($connection, $user_row["username"]);

    if ($appointment_id == 0)
        //insert a new appointment
        $sql = "insert into appointment (service_name,day_of_week,appointment_date,dropoff_time,pickup_time,user_id,username) 
                values ('$service_name','$day_of_week','$appointment_date','$dropoff_time', '$pickup_time', $user_id, '$username')";
    else
        //update an existing appointment
        $sql = "update appointment set service_name = '$service_name', day_of_week = '$day_of_week', appointment_date = '$appointment_date', 
                dropoff_time = '$dropoff_time', pickup_time = '$pickup_time', username = '$username', user_id = $user_id where appointment_id = $appointment_id";

    mysqli_query($connection,$sql) or die("Invalid SQL: $sql " . mysqli_error($connection));


    header("Location: appointment_view.php");
}
else{ 
    header("Location: login.php");
}
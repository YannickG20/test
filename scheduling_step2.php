<?php
include("global.php");

session_start();

if(isset($_SESSION['user_id'])){ 
    $user_id = $_SESSION['user_id'];
    $service_id = intval($_POST["service_id"]);
    $appointment_date = date("Y-m-d H:i:s", strtotime($_POST["appointment_date"]));
    $appointment_id = intval($_POST["appointment_id"]);
    $day_of_week = date("l", strtotime($appointment_date));

    $service_id = mysqli_real_escape_string($connection, $service_id);
    $appointment_date = mysqli_real_escape_string($connection, $appointment_date);
    $appointment_id = mysqli_real_escape_string($connection, $appointment_id);

    //Getting service duration
    $service_query = mysqli_query($connection, "select * from services where service_id = $service_id");
    $service_row = mysqli_fetch_assoc($service_query);
    $service_duration = mysqli_real_escape_string($connection, $service_row["duration"]);

    //Getting availability
    $available_query = mysqli_query($connection, "select * from days_available where day_of_week = '$day_of_week'");
    $available_row = mysqli_fetch_assoc($available_query);
    //$start_time = date("H:i", strtotime($available_row["start_time"]));
    //$end_time = date("H:i", strtotime($available_row["end_time"]));
    $start_time = strtotime("9:00 AM");
    $end_time = strtotime("5:00 PM");

    $current_time = $start_time;
    $interval = 15 * 60;

    $available_times = [];

    // Adding the times that my uncle works to $available_times
    while ($current_time < $end_time) {
        $available_times[] = date("H:i", $current_time);
        $current_time += $interval;
    }

    $sql = "select dropoff_time, pickup_time from appointment where appointment_date = '$appointment_date'";
    $res = mysqli_query($connection, $sql);

    // Loop over booked appointments and remove their times from the available_times array
    while ($appointment_row = mysqli_fetch_assoc($res)) {
        $pickup_time = date("H:i", strtotime($appointment_row['pickup_time']));
        $dropoff_time = date("H:i", strtotime($appointment_row['dropoff_time']));

        //delete booked appointments times
        $start_index = array_search($dropoff_time, $available_times);
        $end_index = array_search($pickup_time, $available_times);
        if ($start_index !== false && $end_index !== false) {
            // Remove booked times from the available_times array
            for ($i = $start_index; $i <= $end_index; $i++) {
                unset($available_times[$i]);
            }
        }
    }

    // Display available times
    ?>
    <form class="container" action="appointments_proc.php" method="POST">
        <h3>Select Drop-off Time:</h3>
        <table>
            <tbody>
                <?php 
                // Loop through available times
                foreach ($available_times as $time) { ?>
                    <tr>
                        <td><?php echo date('H:i', strtotime($time)); ?></td>
                        <td><input type="radio" name="dropoff_time" value="<?php echo $time; ?>"></td>
                    </tr>
                    <?php
                }
                 ?>
             </tbody>
         </table>
         <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
         <input type="hidden" name="appointment_date" value="<?php echo $appointment_date; ?>">
         <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
         <input type="submit" class="register-btn" style="margin-bottom: 20px;" value="Save">
     </form>
     <?php

}
else{ 
    header("Location: login.php");
}
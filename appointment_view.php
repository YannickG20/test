<?php 
session_start();
include("global.php");
include("header.php");

if(isset($_SESSION['user_id'])){
?>

    <div class="container">
    <table style="text-align: center;">
        
        <?php
        $user_id = $_SESSION["user_id"];
        //Execute a database query to get the data
        $result = mysqli_query($connection,"select * from appointment where user_id = $user_id");

        //Check if any appointments exits
        if(mysqli_num_rows($result) > 0) {
            
            // table titles?>
            <tr style="font-weight: bold;">
            <td> Service Type </td><td> | </td>
            <td> Appointment Date </td><td> | </td>
            <td> Day Of Week </td><td> | </td>
            <td> Dropoff Time </td><td> | </td>
            <td> Pickup Time </td><td> | </td>
            <td>Action</td>
            </tr>
            <?php
        //Loop once per record
        while ($row = mysqli_fetch_assoc($result)) {
            //Show each record
            ?>
            <tr>
                <td><?php echo $row["service_name"]; ?></td><td> | </td>
                <td><?php echo date("Y-m-d", strtotime($row["appointment_date"])); ?></td><td> | </td>
                <td><?php echo $row["day_of_week"]; ?></td><td> | </td>
                <td><?php echo $row["dropoff_time"]; ?></td><td> | </td>
                <td><?php echo $row["pickup_time"]; ?></td><td> | </td>
                <td><a href="appointment_edit.php?appointment_id=<?php echo $row["appointment_id"];?>">Edit</a></td>
            </tr>
        <?php
        }

        mysqli_free_result($result);

        } else {
            echo "No appointments found.";
        }

        mysqli_close($connection);
        ?>
    </table>
    </div>
    
    <div id="showcase">
        <div class="container">
            <div class="showcase-content">
                <a class="btn" href="appointments.php">Schedule a new appointment</a><br /><br />
            </div>
        </div>
    </div>
<?php 
} else { ?>
    <div class="container">
        <p>Please log in to see your appointments or schedule a new one.</p><br />
        <a class="btn" href="login.php">Login</a><br /><br />
    </div>
    <?php
}
?>

<?php
include("footer.php");?>

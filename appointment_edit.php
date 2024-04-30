<?php
include("header.php");
include("global.php");

session_start();

if(isset($_SESSION['user_id'])){ 
    ?>
    <section id="showcase3">
        <div class="container" style="text-align: center;" >
            <div class="showcase-content3">
                <?php // if logged in, show who is logged in
                if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){ ?>
                    <h2 style="text-align: center;">Hello, <?php echo $_SESSION['username']?></h2>
                <?php } ?>
            </div>
        </div>
        <div class="container" style="text-align: center;">
            <table style="text-align: center; background: white;">
                <h2 style="text-align: center;">Editing this appointment</h2>
                <?php
                $user_id = $_SESSION['user_id'];
                $appointment_id = intval($_GET["appointment_id"]);

                $result = mysqli_query($connection,"select * from appointment where user_id = $user_id and appointment_id = $appointment_id");
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
                        <td><button onclick="confirmCancel(<?php echo $row["appointment_id"]; ?>)">Cancel</button></td>
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
    </section>

    <div class="clr"></div>

    <?php
    // Display form with appointment details pre-filled
    ?>
    <section id="showcase2">
        <div style="color: red;">
            <?php echo $errormessage;?>
        </div>

        <div class="container">
            <div class="showcase2-content3" style="text-align: center; background: white;">
                <form action="scheduling_step2.php" method="POST">
                    <h2>Schedule a new appointment</h2>
                    <h3>Appointment Date: <input type="date" name="appointment_date" id="appointment_date" onchange="validateDate()" value="<?php echo htmlspecialchars($appointment_date, ENT_QUOTES); ?>"><br /></h3>
                    
                    <h3>Select a service package:<br /></h3>
                    <label for="service1">Simple Wash Package</label>
                    <input type="radio" id="service1" name="service_id" value="1"><br />
                    <label for="service2">Vacuum & Shine Package</label>
                    <input type="radio" id="service2" name="service_id" value="2"><br />
                    <label for="service3">Full Package</label>
                    <input type="radio" id="service3" name="service_id" value="3"><br />

                    <input type="hidden" name="appointment_id" value="<?php echo $appointment_id;?>">
                    <input type="submit" class="register-btn" style="margin-bottom: 20px;" value="Save">
                </form>
            </div>
        </div>
    </section>
    
    <script>
        //javascript to cancel appoinrment
        function confirmCancel(appointmentId) {
            if (confirm("Are you sure you want to cancel this appointment?")) {
                // Redirect to appointment_cancel.php with appointment_id
                window.location.href = "appointment_cancel.php?appointment_id=" + appointmentId;
            }
        }
    </script>

    <?php

    }
    else{ 
        header("Location: login.php");

}
?>
<?php
include("footer.php");?>
<?php include("global.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="style1.css">
    <title>LKK Auto Detailing | Welcome</title>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/72b863ffa3.js" crossorigin="anonymous"></script>

    
    <script>
        // javascript to validate login form
        function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("u_password").value;

        if (username.trim() === "" || password.trim() === "") {
            alert("Please enter both username and password");
            return false;
        }
        return true;
    }
    </script>
    
    <script>
        // Javascript function to update appointment view
        function updateAppointmentList() {
            location.reload();
        }
    </script>

    <script>
        // javascript to make sure user only select saturdays or sundays when scheduling
        function validateDate() {
            var selectedDate = new Date(document.getElementById("appointment_date").value);
            var dayOfWeek = selectedDate.getDay();

            // Check if the selected date is a Saturday (5) or Sunday (6)
            if (dayOfWeek != 6 && dayOfWeek != 5) {
                alert("Please select a Saturday or Sunday for the appointment.");
                document.getElementById("appointment_date").value = ""; // Clear the selected date
            }
        }
    </script>

    <script>
        // Javascript to cancel an appointment
        function confirmCancel(appointment_id) {
            if (confirm("Are you sure you want to cancel this appointment?")) {
                window.location.href = "appointment_cancel.php?appointment_id=" + appointment_id;
            }
        }
    </script>


</head>
<body>
    <nav id="navbar">
        <div class="container">
                <a href="home_page.php">
                    <img src="images/Branco@300x.png" alt="logo" class="navbar-logo">
                </a>
                <h1 class="logo"><a href="home_page.php"><span class="text-primary">LKK Auto Detailing</span></a></h1>
            <ul>
                <li><a href="home_page.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="about.php">About</a></li>
                <?php 
                // if not logged in, show button to login
                if(!isset($_SESSION['user_id'])){ ?> 
                    <li><a href="login.php">Login</a></li>
                <?php } 
                // if logged in, show button to logout
                if(isset($_SESSION['user_id'])){ ?> 
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>
            </ul>    
        </div>
    </nav>
       
<br><br>


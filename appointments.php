<?php include("header.php");
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

                <a class="btn" style="text-align: center;" href="appointment_view.php">My appointments</a><br /><br />
            </div>
        </div>
    </section>

    <div class="clr"></div>

    <section id="showcase2">
        <div style="color: red;">
            <?php echo $errormessage;?>
        </div>

        <div class="container">
            <div class="showcase2-content3" style="text-align: center; background: white;">
                <form class="container" action="scheduling_step2.php" method="POST">
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

    <div class="clr"></div>

<?php 
}
else{ 
    header("Location: login.php");
}

include("footer.php");
?>
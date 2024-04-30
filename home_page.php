<?php 
include("header.php"); 
include("global.php");
?>

<section id="showcase">
    <div class="container" style="text-align: center;" >
        <div class="showcase-content2">
            <?php
            // if logged in, show who is logged in
            if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){ ?>
                <h2 style="text-align: center">Hello, <?php echo $_SESSION['username']?></h2>
            <?php
            }?>
        </div>
        <div class="showcase-content">
        <h1>Welcome to the official website of LKK Detailing</h1>
        <p>Here at LKK Detailing, we provide the best detailing service to your vehicle,
            leaving it with a clean and shiny look that it deserves. We are located in Rhode Island and provide on-site service
            if you are not able to bring your vehicle to us.</p>
        </div>
        <a class="btn" href="about.php">About Our Company</a><br /><br />
    </div>
</section>

<div class="clr"></div>

<!-- this is the code to generate the slider that displays the work being done in another cars -->
<section id="slider">
    <div class = "container_slider">
        <figure>
            <img src="images/seat1.jpeg" alt="car seat">
            <img src="images/seat2.jpeg" alt="car seat">
            <img src="images/under_seat1.jpeg" alt="under car seat">
            <img src="images/under_seat2.jpeg" alt="under car seat">
            <img src="images/motor2.jpeg" alt="car motor">
            <img src="images/motor3.jpeg" alt="car motor">
            <img src="images/front_light1.jpeg" alt="car light">
            <img src="images/front_light2.jpeg" alt="car light">
            <img src="images/seat1.jpeg" alt="car seat">
        </figure>
    </div>
</section>

<div class="clr"></div>

<section id="services">
    <div class="box-container">
        <div class="box bg-light">
            <i class="fa-solid fa-soap fa-3x"></i>
            <h3>Simple Wash Package</h3>
            <p>A simple exterior wash of the body and wheels of your car with water and our premium soap that will leave your
                car with a clean look like it deserves to be.</p><br /><br />
        </div>
        <div class="box bg-principal">
            <i class="fa-solid fa-wind fa-3x"></i>
            <h3>Vacuum & Shine Package</h3>
            <p>An inside cleanup including vacuum, chairs and mats cleaning, and a simple exterior 
                wash with our premium soapy water that leaves your car's body and tires with a clean look both inside and outside.</p><br />
        </div>
        <div class="box bg-light">
            <i class="fa-solid fa-spray-can-sparkles fa-3x"></i>
            <h3>Full Package</h3>
            <p>A fully detailed cleaning service on both the inside and exterior, including vacuum, 
                clean chairs, stear wheel, mats, windows, exterior wash on body and tires, plus a polishing service, that will leave your car 
                shiny in the inside and the outside like new.</p>
        </div>
    </div>
</section>

<div class="clr"></div>

<?php
include("footer.php"); ?>

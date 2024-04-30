<?php 
include("header.php"); 
include("global.php");
?>

<section id="showcase_services">
    <div class="container" style="text-align: center;" >
        <div class="showcase_services-content2">
            <?php
            // if logged in, show who is logged in
            if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){ ?>
                <h2 style="text-align: center">Hello, <?php echo $_SESSION['username']?></h2>
            <?php
            }?>
        </div>
        <div class="showcase_services-content">
        <h1>Services</h1>
        <h2>This is our services page where you can find detailed information about the services we provide
            including prices and description of each service.</h2>
        </div>
    </div>
</section>

<div class="clr"></div>

<section id="services">
    <div class="box-container">
        <div class="box bg-light">
            <i class="fa-solid fa-soap fa-3x"></i>
            <h3>Simple Wash Package</h3>
            <p>A simple exterior wash of the body and wheels of your car with water and our premium soap that will leave your
                car with a clean look like it deserves to be.</p><br /><br /><br />
            <p><i class="fa-solid fa-clock"></i> Duration: 30 minutes</p>
            <p><i class="fa-solid fa-hand-holding-dollar"></i> Price: $50.00</p>
        </div>
        <div class="box bg-principal">
            <i class="fa-solid fa-wind fa-3x"></i>
            <h3>Vacuum & Shine Package</h3>
            <p>An inside cleanup including vacuum, chairs and mats cleaning, and a simple exterior 
                wash that leaves your car's body and tires with a clean look both inside and outside.</p><br /><br />
            <p><i class="fa-solid fa-clock"></i> Duration: 45 minutes</p>
            <p><i class="fa-solid fa-hand-holding-dollar"></i> Price: $100.00</p>
        </div>
        <div class="box bg-light">
            <i class="fa-solid fa-spray-can-sparkles fa-3x"></i>
            <h3>Full Package</h3>
            <p>A fully detailed cleaning service on both the inside and exterior, including vacuum, 
                clean chairs, stear wheel, mats, windows, exterior wash on body and tires, plus a polishing service, that will leave your car 
                shiny in the inside and the outside like new.</p><br />
            <p><i class="fa-solid fa-clock"></i> Duration: 2 hours</p>
            <p><i class="fa-solid fa-hand-holding-dollar"></i> Price: $250.00</p>
        </div>
    </div>
</section>

<div class="clr"></div>

<?php include("footer.php"); ?>
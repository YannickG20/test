<?php include("header.php"); ?>

<div>
    <form action="register_proc.php" method="POST">
    <div class="container signin">
        <h1>Register</h1>
        <p>Please fill in this form to create an account:</p>
        
        <i class="fa-solid fa-user"></i>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES); ?>"><br /><br />
        
        <i class="fa-solid fa-envelope"></i>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>"><br /><br />
        
        <i class="fa-solid fa-lock"></i>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="u_password" id="u_password" value="<?php echo htmlspecialchars($u_password, ENT_QUOTES); ?>"><br /><br />

        <i class="fa-solid fa-lock"></i>
        <label for="r_password"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="r_password" id="r_password" value="<?php echo htmlspecialchars($r_password, ENT_QUOTES); ?>"><br /><br />
        
        <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
        <button type="submit" class="btn">Sign up</button>
    </div>
    </form>
</div>

<div style="color: red; text-align: center;">
	<?php echo $errormessage;?>
</div>

<div class="container signin">
    <p>Already have an account? <a href="login.php">Log in</a><br></p>
</div>


<?php include("footer.php"); ?>

<?php include("header.php"); ?>

<div>    
    <form action="login_proc.php" method="POST">
    <div class="container">
        <div class="signin">
            <h1>Log in</h1>
            <p>Please fill in this form to sign in:</p><br />
            
            <i class="fa-solid fa-user"></i>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES); ?>"><br /><br />
            
            <i class="fa-solid fa-lock"></i>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="u_password" id="u_password" value="<?php echo htmlspecialchars($u_password, ENT_QUOTES); ?>"><br /><br />
            <button type="submit" class="btn">Log in</button>
        </div>
    </div>
    </form>
</div>

<div style="color: red; text-align: center;">
	<?php echo $errormessage;?>
</div>

<div class="container signin">
    <p>Don't have an account? <a href="register.php">Sign up</a><br></p>
</div>

<?php include("footer.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="style.css">


</head>
<body>

    <form action="loginProcess.php" method="POST">
        <h2>Login</h2>

        <?php
            if(isset($_GET['error'])){ ?>
                <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>

        <p class="hint-text">Enter Login Details</p>
        	
            <input type="username" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
        
            <button type="submit" value="save">Login</button>
        <label>Don't have an account?</label><a href="signup.php">Register Here</a>
    </form>

</div>
</body>
</html>
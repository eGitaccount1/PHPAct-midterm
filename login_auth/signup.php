
<?php
include "dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="style.css">


<!DOCTYPE html>
<html>
<head>



</head>
<body>

    <form action="signup_a.php" method="POST">
		<h2>Register</h2>

        <?php
            if(isset($_GET['error'])){ ?>
                <p class="error"> <?php echo $_GET['error']; ?> </p>
            
        <?php } ?>


		<p class="hint-text">Create your account</p>
        
			
			<input type="text" name="username" placeholder="Username">
        
        	<input type="email" name="email" placeholder="Email">
		
            <input type="password" name="password" placeholder="Password">
        
            <input type="password" name="cpassword" placeholder="Confirm Password">
               
            <button type="submit" name="save">Create Account</button>
        
        <label></label>Already have an account? <a href="../login.php">Sign in</a></label>
    </form>
	

</body>
</html> 
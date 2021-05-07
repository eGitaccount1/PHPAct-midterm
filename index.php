<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
		<style>
		body{
			margin: 0;
			padding: 0;
			background: url(img/img1.jpg);
            background-size: cover;
			background-repeat:no repeat;
			font-family: 'Poppins', sans-serif;
			font-weight:700;
		}
		.boxer{
			width: 320px;
			height: 400px;
			background: #ffff;
			color: dimgray;
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			box-sizing: border-box;
			padding: 30px 30px;
			opacity:0.5;
	
		}
		.pik{
			width: 100px;
			height: 100px;
			border-radius: 50%;
			position: absolute;
			top: -50px;
			left: calc(50% - 50px);
		}
		h2{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 32px;
			font-family: Brush Script MT, Brush Script Std, cursive;
		}
		.boxer p {
			margin: 0;
			padding: 0;
			font-weight: bold;
		}
		.boxer input{
			width: 100%;
			margin-bottom: 20px;
			
		}
		.boxer input[type="text"], input[type="password"]{
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			height: 40px;
			color: black;
			font-size: 16px;	
			
		}
		.boxer input[type="submit"]{
			border: none;
			outline: none;
			height: 40px;
			background: #008CBA;
			color: #fff;
			font-size: 18px;
			border border-radius: 20px;
		}

		.boxer input[type="submit"]:hover {
			background-color: #7b6079;
		}

		.boxer input[type="submit"]:active {
		background-color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
		}
		.signup{
			position:absolute;
			bottom:60px;
		}
</style>
</head>
<body>
     <form action="login.php" method="post">
     	<div class="boxer">
            <center><h2>LOG IN</h2></center>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<input type="password" name="password" placeholder="Password"><br>
            
        <input type="submit" value="Login">
		
		<a class="signup" href="login_auth/signup.php">Sign up</a>
		
		<a href="changpass.php" class="ca">Forgot Password</a><br><br>
     	    
          
     </form>
</body>
</html>
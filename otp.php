<html>
	<head>
		<title> OTP </title>
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
			height: 300px;
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
		.h1{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
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
			background-color: #7b6079
		}
		.boxer input[type="submit"]:active {
		background-color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
		}
</style>
			
		</head>
	<body>
		<form action="otpx.php" method="post">
			<div class="boxer">
		<h1>Enter</h1>
			
		
          <?php if (isset($_GET['num1'])) { ?>
               <input type="text" 
                      name="num1" 
                      placeholder="Username"
                      value="<?php echo $_GET['num1']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="num1" 
                      placeholder="OTP"><br>
          <?php }?>
			<input type="submit" value="Send">
		</form>
	<?php 
?> </div>
		</body>
	</html>
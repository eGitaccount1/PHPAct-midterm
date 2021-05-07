<?php 
session_start();
  
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    
    <style>
          body{
            position:absolute;
            background-image:url('img1.jpg');
            margin:20px;
            font-family:Brush Script MT (cursive);
            color:green;
            font-size:25px;
            top:50%;
            left:50%;
            transform:translate(-50%, -100%);
        }
        .glow {
            
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
}
    
    </style>
</head>
<body>
    
    <div class="page-header">
        <h1><b>Welcome.</h1>
    </div>
    <p>
       
        <a href="logout.php" class="glow">Sign Out</a>
    </p>
    
</body>
</html>
<?php 
session_start();
  
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
}
  
require_once "config.php";

$_SESSION["verify"] = false;
$_SESSION["code_access"] = false;
  
 
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    if(empty(trim($_POST["username"]))){
        echo "<script>alert('ENTER USERNAME');</script>";
    } else{
        $username = trim($_POST["username"]);
    }
     
    if(empty(trim($_POST["password"]))){
        echo "<script>alert('ENTER PASSWORD');</script>";
    } else{
        $password = trim($_POST["password"]);
    }
     
    if(empty($username_err) && empty($password_err)){ 
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){ 
            mysqli_stmt_bind_param($stmt, "s", $param_username);
             
            $param_username = $username;
             
            if(mysqli_stmt_execute($stmt)){ 
                mysqli_stmt_store_result($stmt);
                 
                if(mysqli_stmt_num_rows($stmt) == 1){ 
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            $_SESSION["verify"] = true;
                            $_SESSION["code_access"] = true;
                            
                            $_SESSION["id"] = $id;
                            header("location: verification.php");
                            

                        } else{ 
                             
                            echo "<script>alert('PASSWORD ERROR');</script>";
                        }
                    }
                } else{ 
                    echo "<script>alert('USERNAME DOES NOT EXIST');</script>";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body{
            background-image:url('img1.jpg');
            margin:20px;
            font-family:Brush Script MT (cursive);
        }
        .wrapper{
            position:absolute;
            background-color:light blue;
            font-size:20px;
            font-weight:500;
            color:crimson;
            height:300px;
            width:300px;
            transform:translate(20%, -10%);
            padding:10px;
            margin:auto;
            top:20%;
            right:40%;
            border:2px solid grey;
            
        }
        .form-group{
            padding:10px;
        
        }
        .btn-primary{
            padding:3px;
            border-radius:5px;
            transition-duration: 0.4s;
        }
        .btn-primary:hover{
            padding:3px;
            border-radius:5px;
            background-color:blue;
        }
        .change{
            position:absolute;
            bottom:50px;
            left:20px;
            color:white;
            font-size:15px;
        }
        a{
            position:absolute;
            bottom:70px;
            left:20px;
            font-size:15px;
            color:white;
        }

    </style>
   
   
</head>  
<body>
       
    <div class="wrapper" style="">
        <h2 style="text-align:center;">Login</h2>
      
        
        <form action="" method="post">
            <div class="next">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
               
            </div>
            <div class="form-group">
                <input type="submit" class="btn-primary" value="Login">  
                <a href="signup.php">Sign up</a>
                <a class="change" href="auditTrail/changpass.php">Forgot Password</a>
            </div>
           
            
            
        
            </div>
        </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php

include "dbconn.php";

function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


// define variables
$uname = validate($_POST['username']);
$pass = validate($_POST['password']);
$cpass = validate($_POST['cpassword']);
$email = validate($_POST['email']);

if(isset($_POST['save']))
{
     //Validates Username
    if(empty($_POST["username"])) 
        {
        header("Location: signup.php?error=Username is required");
        exit();
        }else 
            {
            $uname = ($_POST["username"]);
            }
    //Validates email
    if (empty($_POST['email'])) 
        {
        header("Location: signup.php?error=Password is required");
        exit(); 
        }else
            {
            $email = ($_POST['email']);
            // check if e-mail address syntax is valid
            if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) 
                {
                header("Location: signup.php?error=Please Enter a valid Email");
                 exit();
                }
            }
    //validates email if already exist
    $sql=mysqli_query($conn,"SELECT * FROM myuser where Email='$email'");
    if(mysqli_num_rows($sql)>0)
        {
        header("Location: signup.php?error=Email ID Already Exists");
        exit();
        }
    

    //validates password        
    if(strlen(trim($_POST["password"])) < 8)
        {
            header("Location: signup.php?error=Password need atleast 8 characters");
            exit();
            
        }
        else if(!preg_match("/(?=.*?[#?!@$%^&*-])/",$_POST['password']))
        {
            header("Location: signup.php?error=Password need atleast (1) special characters.");
            exit();
            
        }
        else if(!preg_match("/(?=.*?[0-9])/",$_POST['password']))
        {
            header("Location: signup.php?error=Password need atleast (1) number.");
            exit();       }
        else if(!preg_match("/(?=.*?[a-z])/",$_POST['password']))
        {
            header("Location: signup.php?error=Password need atleast (1) lowercase letter.");
            exit();
        }
        else if(!preg_match("/(?=.*?[A-Z])/",$_POST['password']))
        {
            header("Location: signup.php?error=Password need atleast (1) uppercase letter.");
            exit(); 
        }
        else{

            //insert data in database
            if ($_POST['password'] === $_POST['cpassword'])
                {
                    $query = "insert into myuser (username,password,confirmpassword,email) values ('$uname','$pass','$cpass','$email')";
                    mysqli_query($conn,$query);
                    echo "<script>alert('Account Created Successfuly!')</script>";
                    header("Location: signup.php?error=Account Created Successfuly!.");
                    
                }
                else {
                    echo "<script>alert('Password did not match!')</script>";
                    }
            }

}


?>

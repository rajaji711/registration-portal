<?php

session_start();
if(isset($_SESSION['username']))
{
    header("location: profile.php");
    exit;
}
require_once "connection.php";

$username = $password = "";
$err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username and password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
  $sql = "SELECT id, username, password FROM users WHERE username = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $param_username);
  $param_username = $username;
  
    
    
  if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
     if(mysqli_stmt_num_rows($stmt) == 1)
       {
         mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
         if(mysqli_stmt_fetch($stmt))
         {
          if(password_verify($password, $hashed_password))
            {
                         
             session_start();
             $_SESSION["username"] = $username;
             $_SESSION["id"] = $id;
             $_SESSION["loggedin"] = true;

                           
            header("location: dashboardp.php");
                         
            }
            else{
                $err='Invalid password';     
                 }
          }

      }
     else{
         $err='Invalid username';
       }             

    }
   
}    


}


?>



<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form</title>
</head>
<body>
    <style>
       
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 90vh;
  width: 100%;
  background-image: url(bs.jpg);
}
.container{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 420px;
  width: 90%;
  background: #eeeaea;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
}
#check:checked ~ .login{
  display: none;
}
#check{
  display: none;
}
.container .form{
  padding: 2rem;
}
.form header{
  font-size: 1.5rem;
  font-weight: 500;
  text-align: center;
  margin-bottom: 1rem;
}
 .form input{
   height: 50px;
   width: 100%;
   padding: 0 10px;
   font-size: 14px;
   margin-bottom: 1rem;
   border: 1px solid #efefef;
   border-radius: 6px;
   outline: none;
 }
 .form input:focus{
   box-shadow: 0 1px 0 rgba(0,0,0,0.2);
 }
.form a{
  font-size: 16px;
  color: #009579;
  text-decoration: none;
}
.form a:hover{
  text-decoration: underline;
}
.button{
  color: #ffffff;
  background: #7a62ef;
  font-size: 1rem;
  font-weight: 400;
  letter-spacing: 1px;
  margin-top: 1rem;
  cursor: pointer;
  transition: 0.4s;
  height: 50px;
  width: 350px;
}
.button:hover{
  background: #1102bd;
}
.signup{
  font-size: 14px;
  text-align: center;
}
.signup label{
  color: #009579;
  cursor: pointer;
}
.signup label:hover{
  text-decoration: underline;
}
    </style>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form  action="" method="POST">
        <input type="text" name='username'  placeholder=" Enter your username">
        <input type="password"  name='password' placeholder="Enter your password">
        <a href="http://localhost/learnphp/final/forgot-password.php">Forgot password?</a>
        <button class="button" type="submit" >Login</button>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check"><a href="http://localhost/learnphp/final/registerp.php">Signup</label>
            <p>
                <?php echo $err; ?>
                </p>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
<?php
require_once "connection.php";

$username=$password=$confirm_password="";
$username_err=$password_err=$confirm_password_err=$err=$age=$dob_err="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    
    $year=date("d-m-Y");
    $name=ucwords($_POST['name']);
   
    $email=$_POST['email'];
   
    $dob=$_POST['dob'];
  
    if(empty(trim($_POST["username"])))
    {
        $username_err="Username cannot be blank";
       
    }
    else
    {
        $sql="SELECT id FROM users WHERE username=?";
        $stmt=mysqli_prepare($conn,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"s",$param_username);
            $param_username=trim($_POST['username']);
           if(mysqli_stmt_execute($stmt))
         {
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)==1)
            {
                $username_err="Username already taken";
                
            }
            else{
                $username=trim($_POST['username']);
            }
         }
        
        
        }
        
        mysqli_stmt_close($stmt);
    }

     
    $age=date_diff(date_create($dob),date_create($year));
    if($age->format("%y")>=15 )
    {
        $dob=$_POST['dob'];
    }

    else{
        $dob_err='Not eligible';
    }
     
     
    if( preg_match("/^([0-9]{10})$/",$_POST['mobile_number']))
     {
       $mobile_number=$_POST['mobile_number'];
        
     }
     else{
        $err='Enter Valid mobile number';
      }

     echo $mobile_number;
 
 

    if(empty(trim($_POST['password']))){
      $password_err="password cannot be blank";
       
         }
         elseif(strlen(trim($_POST['password']))<5){
            $password_err="password cannot be less than 5 digits";
            
         }
         else{
            $password=trim($_POST['password']);
             
         }
         if(trim($_POST['password'])!=trim($_POST['confirm_password'])){
            $confirm_password_err="password should match";
         
        }   

     if(empty($username_err)&& empty($password_err) && empty($confirm_password_err) && empty($err)&& empty($dob_err)){
     $sql="INSERT INTO users (name,username,password,mobile_number,email,dob) VALUES(?,?,?,?,?,?) ";
    
     $stmt=mysqli_prepare($conn,$sql);
     if($stmt)
     {
        mysqli_stmt_bind_param($stmt,"ssssss",$name,$param_username,$param_password,$mobile_number,$email,$dob);
        
        $param_username=$username;
        $param_password=password_hash($password,PASSWORD_DEFAULT);
        
        if(mysqli_stmt_execute($stmt))
        {
            header("location:loginp.php");
        }
        else{
            echo "Something went wrong....cannot redirect!";
        }
     }
     mysqli_close($stmt);
}
     mysqli_close($conn);

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
  background-color: #7a62ef;
  font-size: 1rem;
  font-weight: 400;
  letter-spacing: 1px;
  margin-top: 1rem;
  cursor: pointer;
  transition: 0.4s;
  width:350px;
  height: 50px;
}
.button:hover{
  background: #1102bd ;
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
      <header>Create Account</header>
      <form action=" " method="POST">
        <input type="text"  name="name" placeholder=" Enter your name">
        <input type="text" name="username" placeholder=" Enter your username"> <?php echo $username_err; ?>
        <input type="email" name="email" placeholder="Enter your email">
        <input type="tel" name="mobile_number" placeholder="Enter your mobile number"><?php echo $err; ?>
        <input type="date" name="dob" placeholder="Enter your date of birth"> <?php echo $dob_err; ?>
        <input type="password"  name="password" placeholder="Enter your password"> <?php echo $password_err; ?>
        <input type="password"  name="confirm_password" placeholder="Confirm password"> <?php echo $confirm_password_err; ?>
        <button class="button" type="submit">Create</button>
      <div class="signup">
        <span class="signup">Already havean account?
         <label for="check" ><a href="http://localhost/learnphp/final/loginp.php">Login</label>
        </span>
      </div>
    </div>
  </div>
  </form>
</body>
</html>
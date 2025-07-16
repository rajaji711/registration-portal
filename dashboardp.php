<?php
include_once "connection.php";
session_start();
$name=$father_name=$mother_name=$dob=$mobile_number=$email=$username=$uid="";
$work="Enter your data.";
$roll_no=$guardian_contact=$gender=$caste=$address=$branch=$semester=$year=$hosteller=$room_no="";
$sql="SELECT * FROM student_data";
$stmt=mysqli_query($conn,$sql);
 if($stmt)
 {
   while($rows=mysqli_fetch_assoc($stmt)){
  if($rows['username']==$_SESSION['username'])
   {
    $username=$_SESSION['username'];
    $name=$rows['name'];
    $email=$rows['email'];
    $mobile_number=$rows['mobile_number'];
    $dob=$rows['dob'];
    $branch=$rows['branch'];
    $caste=$rows['caste'];
    $father_name=$rows['father_name'];
    $mother_name=$rows['mother_name'];
    $guardian_contact=$rows['guardian_contact'];
    $gender=$rows['gender'];
    $roll_no=$rows['roll_no'];
    $address=$rows['address'];
    $semester=$rows['semester'];
    $year=$rows['year'];
    $hosteller=$rows['hosteller'];
    $room_no=$rows['room_no'];
    $work="";
   }
  
  }  
 
  } 



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DASHBOARD</title>
  </head>
  <body>
    <style>
        /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
   background-image: url('pass.jpeg');
    background-size: cover;
     background-repeat: no-repeat;
}
.sidebar {
  position: fixed;
  height: 100%;
  width: 260px;
  background: #11101d;
  padding: 15px;
  z-index: 99;
}
.logo {
  font-size: 25px;
  padding: 0 15px;
}
.sidebar a {
  color: #fff;
  text-decoration: none;
}
.menu-content {
  position: relative;
  height: 100%;
  width: 100%;
  margin-top: 40px;
  overflow-y: scroll;
}
.menu-content::-webkit-scrollbar {
  display: none;
}
.menu-items {
  height: 100%;
  width: 100%;
  list-style: none;
  transition: all 0.4s ease;
}
.submenu-active .menu-items {
  transform: translateX(-56%);
}
.menu-title {
  color: #fff;
  font-size: 14px;
  padding: 15px 20px;
}
.item a,
.submenu-item {
  padding: 16px;
  display: inline-block;
  width: 100%;
  border-radius: 12px;
}
.item i {
  font-size: 12px;
}
.item a:hover,
.submenu-item:hover,
.submenu .menu-title:hover {
  background: rgba(206, 204, 204, 0.1);
}
.navbar,
.main {
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
  z-index: 1000;
}
.sidebar.close ~ .navbar,
.sidebar.close ~ .main {
  left: 0;
  width: 100%;
}
.navbar {
  position: fixed;
  color: #fff;
  padding: 15px 20px;
  font-size: 25px;
  background: #2d51b3;
  cursor: pointer;
  height: 70px;
}
.navbar #sidebar-close {
  cursor: pointer;
}


.button {
  padding: 6px 24px;
  border: 2px solid #fff;
  border-radius: 6px;
  cursor: pointer;
  background-color: #e7f2fd;
  position: relative;
  left: 80%;
  font-size: 18px;
}
.button:hover{
  background: #668aec;
}
.button:active {
  transform: scale(0.98);
}
.container {
  position: relative;
  max-width: 900px;
  width: 100%;
  background: #ebd0a7;
  padding: 10px;
  overflow-y: auto;
  height: 570px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 50;
  text-align: center;
}
.container .form {
  margin-top: 10px;
}
.form .input-box {
  width: 70%;
  margin-top: 5px;
  color: #b58cde;
}
.input-box label {
  color: #020202;
  font-size: 16px;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 40px;
  width: 90%;
  outline: none;
  font-size: 1rem;
  color: #232222;
  margin-top: 2px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 10px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 40px;
}

/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
}

    </style>
    <nav class="sidebar">
      <a href="#" class="logo">Dashboard</a>

      <div class="menu-content">
        <ul class="menu-items">
          <div class="menu-title">HOME</div>

          <li class="item">
            <a href="http://localhost/learnphp/final/profilep.php">Profile</a>
          </li>
          <li class="item">
            <a href="http://localhost/learnphp/final/fees.php">Fee Submission</a>
          </li>
          <li class="item">
            <a href="#">Downloads</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <nav class="navbar" >
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
      <a href="http://localhost/learnphp/final/logout.php" class="button" id="form-open">Logout</a>
    </nav>
    
    <br><br><br><br><br><br>
     <center >

    <section class="container">
      <form action="#" class="form">
       <div class="column">
       <div class="input-box">
        <label>Full Name:</label> <?php echo   $name?>
        </div>
       <div class="input-box">
        <label>Fathers Name:</label> <?php echo   $father_name?>
         </div>
       </div>
       <div class="column">
       <div class="input-box">
        <label>Mothers Name:</label> <?php echo   $mother_name?>
        </div>
       <div class="input-box">
        <label>Roll Number:</label> <?php echo   $roll_no?>
         </div>
       </div>
       <div class="column">
       <div class="input-box">
        <label>Email Address:</label> <?php echo   $email?>
        </div>
       <div class="input-box">
          <label>Phone Number:</label> <?php echo   $mobile_number?>
         </div>
        </div>
       <div class="column">
        <div class="input-box">
          <label>Guardian Contact Number:</label> <?php echo   $guardian_contact?>
         </div>

        <div class="input-box">
          <label>Birth Date:</label> <?php echo   $dob?>
           </div>
       </div>
       <div class="column">
        <div class="input-box">
          <label>Address:</label> <?php echo   $address?>
           </div>
         
        <div class="input-box">
          <label>Gender:</label> <?php echo   $gender?>
           </div>
        </div>
       <div class="column">
       <div class="input-box">
        <label>Caste:</label> <?php echo   $caste?>
       </div>
       
       <div class="input-box">
        <label>Branch:</label> <?php echo   $branch?>
         </div>
       </div>
       <div class="column">
        <div class="input-box">
          <label>Semester:</label> <?php echo   $semester?>
          
        </div>
         
        <div class="input-box">
          <label>Year:</label> <?php echo   $year?>
         
        </div>
        </div>
        <div class="column">
        <div class="input-box">
          <label>Hosteller:</label> <?php echo   $hosteller?>
          
        </div>
         
        <div class="input-box">
          <label>Room No:</label> <?php echo   $room_no?>
         
        </div>
        </div>
        <div class="column">
        <div class="input-box">
         <?php echo $work;?>
          
        
         
       
         
        </div>
        </div>
      </form>
    </section>
  </center>
       <script>
        const sidebar = document.querySelector(".sidebar");
const sidebarClose = document.querySelector("#sidebar-close");
const menu = document.querySelector(".menu-content");
const menuItems = document.querySelectorAll(".submenu-item");
const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    menu.classList.add("submenu-active");
    item.classList.add("show-submenu");
    menuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show-submenu");
      }
    });
  });
});

subMenuTitles.forEach((title) => {
  title.addEventListener("click", () => {
    menu.classList.remove("submenu-active");
  });
});
       </script>
  </body>
</html>
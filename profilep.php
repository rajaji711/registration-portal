<?php
include_once "connection.php";
session_start();
$work="";
$sql="SELECT * FROM student_data";
$stmt=mysqli_query($conn,$sql);
 if($stmt)
 {
   while($rows=mysqli_fetch_assoc($stmt)){
  if($rows['username']==$_SESSION['username'])
   {
    $work="Data already exist";
   }
  else{
       $work='insert';
      }
  }  
 
  } 

    $name=$father_name=$mothername=$dob=$mob=$email=$username=$uid="";
$roll_no=$guardian_contact=$gender=$caste=$address=$branch=$semester=$year=$hosteller=$room_no="";
$err="";


       $sql="SELECT * FROM users";
       $result = mysqli_query($conn, $sql);
   if($result)
  {
  while($rows=mysqli_fetch_assoc($result)){
    if($rows['username']==$_SESSION['username'])
    {
      $username=$_SESSION['username'];
      $name=$rows['name'];
      $email=$rows['email'];
      $mobile_number=$rows['mobile_number'];
      $dob=$rows['dob'];
      $uid=$rows['id'];
      }
    }
  }
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $branch=$_POST['branch'];
    $caste=$_POST['caste'];
    $father_name=ucwords($_POST['father_name']);
    $mother_name=ucwords($_POST['mother_name']);
    $guardian_contact=$_POST['guardian_contact'];
    $gender=$_POST['gender'];
    $roll_no=$_POST['roll_no'];
    $locality=$_POST['locality'];
    $house_no=$_POST['house_no'];
    $district=$_POST['district'];
    $state=$_POST['state'];
    $semester=$_POST['semester'];
    $year=$_POST['year'];
    $hosteller=$_POST['hosteller'];
    $room_no="Not applied";
   
    if($hosteller=="Yes")
    {
      $room_no=ucwords($_POST['room_no']);
    }
    if(preg_match("/^([0-9]{10})$/",$guardian_contact))
    {
      $guardian_contact=$_POST['guardian_contact'];
       
    }
    else{
       $err='Enter Valid mobile number';
     }
    
      $address=$house_no." ".$locality." ".$district." ".$state;
      $address=ucwords($address);
      if($work=="insert"){
        
      if(empty($err)){
      $stmt="INSERT INTO `student_data`(`username`, `uid`, `name`, `branch`, `father_name`, `mother_name`, `dob`, `email`, `mobile_number`, `roll_no`, `gender`, `caste`, `address`, `guardian_contact`, `semester`, `year`, `hosteller`, `room_no`) 
      VALUES('$username','$uid','$name','$branch','$father_name','$mother_name','$dob','$email','$mobile_number','$roll_no','$gender','$caste','$address','$guardian_contact','$semester','$year','$hosteller','$room_no') ";
    
      $st=mysqli_query($conn,$stmt);
      if($st)
      {
       
             header("location:dashboardp.php");
      }
         else{
             echo "Something went wrong....cannot redirect!";
         } 
      }
   }

   else{
    $output="Your data has been filled";
   }
 }


 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  </head>
  <body>
    <style>
    
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 90vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background-image: url('profiles.jpg');
  background-size: cover;
  background-repeat: no-repeat;
}
.container {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fbf7f7;
  padding: 15px;
  overflow-y: auto;
  max-height: auto;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 90%;
  margin-top: 15px;
}
.input-box label {
  color: #020202;
  font-size: 16px;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 70px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}
.branch {
  margin-top: 10px;
}
.form button {
  height: 45px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(130, 106, 251);
}
.form button:hover {
  background: rgb(88, 56, 250);
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.hosteller{
  
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 10px;
  }
}
    </style>
    <section class="container">
      <header><b>Student Profile</b></header>
      <form action="" method="POST" class="form">
        <div class="input-box">
          <label>Full Name:</label>
          <?php echo   $name?>
        </div>
        <div class="input-box">
          <label>Fathers Name:</label>
          <input type="text" name="father_name" placeholder="Enter fathers name" required />
        </div>
        <div class="input-box">
          <label>Mothers Name:</label>
          <input type="text" name="mother_name" placeholder="Enter Mothers name" required />
        </div>
        <div class="input-box">
          <label>Roll Number:</label>
          <input type="number" name="roll_no" placeholder="Enter roll number" required />
        </div>
        <div class="input-box">
          <label>Email Address:</label>
          <?php echo $email ?>
        </div>
         <div class="input-box">
            <label>Phone Number:</label>
            <?php echo $mobile_number?>
          </div>
        <div class="column">
          <div class="input-box">
            <label>Parents Contact Number:</label>
            <input type="number" name="guardian_contact" placeholder="Enter parents contact number" required /><?php echo $err;  ?>
          </div>

          <div class="input-box">
            <label>Birth Date:</label>
            <?php echo $dob?>
          </div>
        </div>

       
      <div class="column">
        <label>Gender:</label>
        <div class="select-box">
          <select name="gender">
            <option hidden>Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Others</option>
          </select>
        </div>
        <label>Caste:</label>
        <div class="select-box">
          <select name="caste">
            <option hidden>Select</option>
            <option>General</option>
            <option>OBC</option>
            <option>SC/ST</option>
          </select>
        </div>
      </div>

      <div class="input-box address">
        <label>Address:</label>
        <div class="column">
          <div>
          <input type="text"  name="house_no"  placeholder="Enter your House number" required />
          </div>
          <div>
          <input type="text"  name="locality" placeholder="Enter your Locality" required />
          </div>
        </div>
        <div class="column">
          <div>
          <input type="text" name="district" placeholder="Enter your District" required />
          </div>
          <div>
           <input type="text" name="state" placeholder="Enter your State" required />
          </div>
       </div>
      </div>
          <label>Branch:</label>
          <div class="select-box">
           
            <select name="branch">
              <option hidden>Select</option>
              <option>Computer Science and Engineering</option>
              <option>Electrical Engineering</option>
              <option>Electronics Engineering</option>
              <option>Mining Engineering</option>
            </select>
          </div>
        
          <div class="column">
            <label>Semester:</label>
             <div class="select-box">
              <select name="semester">
                <option hidden>Select</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
              </select>
             </div>
          <label>Year:</label>
             <div class="select-box">
              <select name="year">
                <option hidden>Select</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
             </div>
           </div>
           <label for="hosteller">Are you a hosteller?</label>
           <div class="select-box">
           <select name="hosteller" id="hosteller" onchange="toggleRoomInput()">
            <option hidden>Select</option>
               <option value="Yes">Yes</option>
               <option value="No">No</option>
           </select>
            </div>
           <br>
   
           <div id="roomInput" style="display: none;">
            <div class="input-box">
               <label for="roomNo">Enter Room No:</label>
               <input type="text" name="room_no" id="roomNo" placeholder="Room No">
               </div>
           </div>
        </div>
    
        <button>Submit</button>
      </form>
    </section>
  </body>
  <script>
    function toggleRoomInput() {
        var hostellerSelect = document.getElementById("hosteller");
        var roomInput = document.getElementById("roomInput");

        if (hostellerSelect.value === "Yes") {
            roomInput.style.display = "block";
        } else {
            roomInput.style.display = "none";
        }
    }
</script>
</html>
<?php
include_once "connection.php";
session_start();
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
   
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
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
  background: rgba(236, 230, 230, 0.1);
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
  background: #4070f4;
  cursor: pointer;
  height: 70px;
}
.navbar #sidebar-close {
  cursor: pointer;
}
.main {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  z-index: 100;
  background: #e7f2fd;
}
.main h1 {
  color: #11101d;
  font-size: 40px;
  text-align: center;
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
.button:active {
  transform: scale(0.98);
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

    <nav class="navbar">
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
      <a href="http://localhost/learnphp/final/logout.php" class="button" id="form-open">Logout</a>
    </nav>
    
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
<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Fiverr Homepage Clone | CodingNepal</title> -->
  <!-- Importing Google font - Fira Sans -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700&display=swap">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Fira Sans', sans-serif;
    }

    body {
      background: #1B1B1D;
      /* background-image: url("Background Images/Five Mindful Engineering Career Tips.jpeg"); */
      background-image: url("Background Images/33.jpg");
      background-size: cover;
    }

    header {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      z-index: 1;
      padding: 20px;
    }

    header .navbar {
      max-width: 1280px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar .menu-links {
      display: flex;
      align-items: center;
      list-style: none;
      gap: 30px;
    }

    .menu-links li a {
    display: inline-block;
    padding: 15px 20px; /* Adjust padding as needed for height and width */
    background-color: gray;
    border: 3px solid black; /* Optional: Add border for better visibility */
    border-radius: 5px; /* Optional: Add border-radius for rounded corners */
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: background-color 0.3s;
}

    

    .navbar .menu-links .language-item a {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .navbar .menu-links .language-item span {
      font-size: 1.3rem;
    }

    .navbar .menu-links li a:hover {
      /* color: #1dbf73; */

      color: white;
      background-color: black;
}
    

    .navbar .menu-links .join-btn a {
      border: 1px solid #fff;
      padding: 8px 15px;
      border-radius: 4px;
    }

    .navbar .menu-links .join-btn a:hover {
      color: #fff;
      border-color: transparent;
      background: #1dbf73;
    }

    .hero-section {
      height: 100vh;
      background-image: url("Home Page/images/hero-img.jpg");
      background-position: center;
      background-size: cover;
      position: relative;
      display: flex;
      padding: 0 20px;
      align-items: center;
    }

    .hero-section .content {
      max-width: 1280px;
      margin: 0 auto 40px;
      width: 100%;
    }

    .hero-section .content h1 {
      color: #fff;
      font-size: 3rem;
      max-width: 730px;
      line-height: 65px;
    }

    .hero-section .search-form {
      height: 48px;
      display: flex;
      max-width: 630px;
      margin-top: 30px;
    }

    .hero-section .search-form input {
      height: 100%;
      width: 100%;
      border: none;
      outline: none;
      padding: 0 15px;
      font-size: 1rem;
      border-radius: 4px 0 0 4px;
    }

    .hero-section .search-form button {
      height: 100%;
      width: 60px;
      border: none;
      outline: none;
      cursor: pointer;
      background: #1dbf73;
      color: #fff;
      border-radius: 0 4px 4px 0;
      transition: background 0.2s ease;
    }

    .hero-section .search-form button:hover {
      background: #19a463;
    }

    .hero-section .popular-tags {
      display: flex;
      color: #fff;
      gap: 25px;
      font-size: 0.875rem;
      font-weight: 500;
      margin-top: 25px;
    }

    .hero-section .popular-tags .tags {
      display: flex;
      gap: 15px;
      align-items: center;
      list-style: none;
    }

    .hero-section .tags li a {
      text-decoration: none;
      color: #fff;
      border: 1px solid #fff;
      padding: 4px 12px;
      border-radius: 50px;
      transition: 0.2s ease;
    }

    .hero-section .tags li a:hover {
      color: #000;
      background: #fff;
    }

    .navbar #hamburger-btn {
      color: #fff;
      cursor: pointer;
      display: none;
      font-size: 1.7rem;
    }

    .navbar #close-menu-btn {
      position: absolute;
      display: none;
      color: #000;
      top: 20px;
      right: 20px;
      cursor: pointer;
      font-size: 1.7rem;
    }

    @media screen and (max-width: 900px) {
      header.show-mobile-menu::before {
        content: "";
        height: 100%;
        width: 100%;
        position: fixed;
        left: 0;
        top: 0;
        backdrop-filter: blur(5px);
      }

      .navbar .menu-links {
        /* height: 100vh;
        color:#000;
        max-width: 300px;
        width: 100%;
        background: #fff;
        position: fixed;
        left: -300px;
        top: 0;
        display: block;
        padding: 75px 40px 0;
        transition: left 0.2s ease; */


    display: inline-block;
    padding: 15px 20px; /* Adjust padding as needed for height and width */
    width: 150px; /* Set a fixed width */
    background-color: gray;
    border: 3px solid black; /* Optional: Add border for better visibility */
    border-radius: 5px; /* Optional: Add border-radius for rounded corners */
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: background-color 0.3s;
        

      }

      header.show-mobile-menu .navbar .menu-links {
        left: 0;
      }

      .navbar .menu-links li {
        margin-bottom: 30px;
      }

      .navbar .menu-links li a {
        color: #000;
        font-size: 1.1rem;
        color: black;
      }

      .navbar .menu-links .join-btn a {
        padding: 0;
  
      }

      .navbar .menu-links .join-btn a:hover {
        color: #1dbf73;
        background: none;
      }

      .navbar :is(#close-menu-btn, #hamburger-btn) {
        display: block;
        
      }

      .hero-section {
        background: none;
      }

      .hero-section .content {
        margin: 0 auto 80px;
      }

      .hero-section .content :is(h1, .search-form) {
        max-width: 100%;
      }

      .hero-section .content h1 {
        text-align: center;
        font-size: 2.5rem;
        line-height: 40px;
        max-width:830px;
      }

      .hero-section .search-form {
        display: block;
        margin-top: 20px;
      }

      .hero-section .search-form input {
        border-radius: 4px;
      }

      .hero-section .search-form button {
        margin-top: 10px;
        border-radius: 4px;
        width: 100%;
      }

      .hero-section .popular-tags {
        display: none;
      }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>


</head>


<body>


  <header>
    <!-- <nav class="navbar">
      <a href="#" class="logo">
      </a>
      <ul class="menu-links">
        <li><a href="user_manage.php">Manage Users</a></li>
        <li><a href="Contact-View.php">Contact Views</a></li>
        <li><a href="gas_measurement.php">Historical Data</a></li>
        <li><a href="one.php">Fire Prediction</a></li>
        <li><a href="map.php">Hazardous Mapping</a></li>
        <li><a href="Emergency_plan.php">Manage Emergency Response</a></li>
        <li><a href="Training_Awareness.php">Training and Awareness</a></li>
        <li><a href="notification.php">Notifications</a></li>
      
        <li class="join-btn"><a href="logout.php">Logout</a></li>
        <span id="close-menu-btn" class="material-symbols-outlined">close</span>
      </ul>
      <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
    </nav> -->

      <?php require ('navcheck.php');?> 
  </header>

  <section class="hero-section">
    <div class="content">
    <div class="text-center   p-2 card-header  bg-dark" style="color: red;">
            <h1><b>"<span class="auto-type"></span>"</b></h1>

        </div>
        <script>
            var typed = new Typed(".auto-type ", {
                strings: ["Choose safety, avoid regrets – prevent industrial fires."],
                typeSpeed: 100,//150
                backSpedd: 150,
                loop: true
            })
        </script>
      <form action="#" class="search-form">
        <!-- <input type="text" placeholder="Search for any service..." required>
        <button class="material-symbols-outlined" type="sumbit">search</button> -->
      </form>
      <div class="popular-tags">
        <!-- Popular: -->
        <ul class="tags">
          <!-- <li><a href="Training_Awareness.php">Training</a></li>
          <li><a href="Emergency_plan.php">Emergency</a></li>
          <li><a href="map.php">Mapping</a></li>
          <li><a href="notification.php">Notifications</a></li> -->
        </ul>
      </div>
    </div>
  </section>

  <script>
    const header = document.querySelector("header");
    const hamburgerBtn = document.querySelector("#hamburger-btn");
    const closeMenuBtn = document.querySelector("#close-menu-btn");

    // Toggle mobile menu on hamburger button click
    hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));

    // Close mobile menu on close button click
    closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());
  </script>
</body>

</html>

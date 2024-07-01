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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      
      background-image: url("Background Images/Top 10 Best Architects in India 2020.jpeg");
      background-position: auto;
      background-size: cover;
    }
    nav {
      /*background: linear-gradient(to right, #ff942a, #ffffff, #138806);
            padding: 6px 0;
            font-size: 0.95em;
            height: 68px;
            width: 100%;*/

            background-color: #333;
            color: #fff;
            padding: 10px;
        }
    

    nav a {
      color: #fff;
      text-decoration: none;
      padding: 10px;
      display: inline-block;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    nav li {
      display: inline-block;
      position: relative;
    }

    nav ul ul {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background-color: #444;
    }

    nav ul li:hover > ul {
      display: inherit;
    }

    nav ul ul li {
      width: 200px;
      float: none;
      display: list-item;
      position: relative;
    }

    nav ul ul ul li {
      position: relative;
      top: -60px;
      left: 200px;
    }

    h1 {
            text-align: center;
        }
  </style>
</head>
<body>

  <nav>
    <ul>
      <li><a href="#">Historical Data</a>
      <ul>
        <li><a href="#">Historical Data Visualization</a></li>
        <li><a href="#">Data Filters</a></li>
        <li><a href="#">Incident History</a></li>
      </ul>
      </li>
      
      <li>
        <a href="#">Collaborate</a>
        <ul>
        <li><a href="#">Communication Hub</a></li>
        <li><a href="#">File Sharing </a></li>
        <li><a href="#">Task Management</a></li>
        <li><a href="#">Group Collaboration</a></li>
      </ul>
      </li>

      <li>
        <a href="#">Update Emergency Plan</a>
      <ul>
        <li><a href="user_emergency_plan.php">Update Emergency Plan</a></li>
        <li><a href="#">Collabrative Planning </a></li>
        <li><a href="#">Training Resorces</a></li>
        <li><a href="#">Plan Approval Workflow</a></li>
        <li><a href="#">Vision</a></li>
      </ul>

      <li>
        <a href="user_training.php">Training Resorces</a>
      </li>


      <li>
        <a href="user_notification.php">Notification</a>
      </li>
        <?php


?>

      <button class="btn btn-danger" type="submit"><a href="logout.php" class="text-decoration-none text-white" style="height: 40px ; width: 70px;">Logout</a></button>
    
  </nav>

</body>
</html>
    
    <h1></h1>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>
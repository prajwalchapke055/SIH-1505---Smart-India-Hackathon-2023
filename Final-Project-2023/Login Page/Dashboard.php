<!-- <?php

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
        
  <script type="text/javascript">
      function togglemenu()
      {
          document.getElementById('sidebar').classList.toggle('active');
      }
  </script>

</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      background-image: url("Background Images/industraial.jpeg");
      background-position: auto;
      background-size: cover;
      margin: 0;
      padding: 0;
    }

    nav {
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
    <div id="sidebar"onclick="togglemenu()">
      <ul>
          <!--<li>Logout</li> -->
  
      </ul>
      <div class="toggle-btn">
          <span></span>
          <span></span>
          <span></span>
      </div>
    </div>
    <ul>
      <li><a href="#">Manage Users</a>
      <ul>
        <!-- <li><a href="#">Historical Data Visualization</a></li>
        <li><a href="#">Data Filters</a></li>
        <li><a href="#">Incident History</a></li> -->
      </ul>
      </li>
      
      <li>
        <a href="#">Configure System</a>
        <ul>
        <!-- <li><a href="#">Communication Hub</a></li>
        <li><a href="#">File Sharing </a></li>
        <li><a href="#">Task Management</a></li>
        <li><a href="#">Group Collaboration</a></li> -->
      </ul>
      </li>

      <li>
        <a href="#">Monitor Integration</a>
      <ul>
        <!-- <li><a href="#">Emergency Plan Editor</a></li>
        <li><a href="#">Collabrative Planning </a></li>
        <li><a href="#">Training Resorces</a></li>
        <li><a href="#">Plan Approval Workflow</a></li>
        <li><a href="#">Vision</a></li> -->
      </ul>


      <li>
        <a href="#">Monitor Security</a>
      </li>

      <li>
        <a href="Emergency_plan.php">Manage Emergency Response</a>
      </li>

      <li>
        <a href="Training_Awareness.php">Training and Awareness</a>
      </li>


      <li>
        <a href="#">Monitor Collaboration</a>
      </li>

      <li>
        <a href="#">View Analytics</a>
      </li>


      <li>
        <a href="notification.php">Notifications</a>
        <ul>
        <li><a href="notification.php" id="notification.php"></a></li>
    </ul>

      </li>

      <button class="btn btn-danger" type="submit"><a href="logout.php" class="text-decoration-none text-white"style="width: 90px;">Logout</a></button>
    
  </nav>

</body>
</html>
    
    <h1></h1>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        nav {
            background-color: #333;
            padding: 35px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            text-decoration: none;
            font-size: 1.7em;
            font-weight: bold;
        }

        .menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu li {
            margin-right: 10px;
        }

        .menu a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: red;
            font-size: larger;
        }

        /* Mobile Styles */
        @media screen and (max-width: 768px) {
            .menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: #333;
                z-index: 1;
            }

            .menu.active {
                display: flex;
            }

            .menu li {
                margin: 0;
                text-align: center;
                padding: 10px 0;
                border-bottom: 1px solid #555;
            }

            .menu li:last-child {
                border-bottom: none;
            }

            .menu-toggle {
                display: block;
                font-size: 2.8em;
                color: white;
                cursor: pointer;
            }
            
     body {
      background: #1B1B1D;
      background-image: url("Background Images/Five Mindful Engineering Career Tips.jpeg");
      background-size: cover;
    }
        }
    </style>
</head>
<body>

<nav>
    <div class="container">
        <!-- <a href="#" class="logo">Home</a> -->

        <!-- <div class="menu-toggle" onclick="toggleMenu()">☰</div> -->

        <ul class="menu">
            <li><a href="user_manage.php">Manage Users</a></li>
            <li><a href="Contact-View.php">Contact Views</a></li>
            <li><a href="gas_measurement.php">Historical Data</a></li>
            <li><a href="one.php">Fire Prediction</a></li>
            <li><a href="map.php">Hazardous Mapping</a></li>
            <li><a href="Emergency_plan.php">Manage Emergency Response</a></li>
            <li><a href="Training_Awareness_Copy.php">Training and Awareness</a></li>
            <li><a href="notification.php">Notification</a></li>
            <li class="join-btn"><a href="logout.php">Logout</a></li>

        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.querySelector('.menu');
        menu.classList.toggle('active');
    }
</script>

</body>
</html>

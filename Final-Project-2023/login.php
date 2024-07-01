<?php
$login = false;

require('dbconnect.php');

if (isset($_POST['login'])) {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

  
    $sql = "select * from users where user_name='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while($row=mysqli_fetch_assoc($result))
        {
            if (password_verify($password, $row['password']))
            {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_name'] = $username;
                header("location:User-Dashboard.php");
            }
            else
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong> Please Check Username And Password...:(
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
            }
        }
     
    } else {

        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed... || </strong> Please Check Username And Password...:(
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
    }

}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url("https://source.unsplash.com/1920x720/?factory");
            /* background-image: url('Background Images/user-background1.jpg');*/
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .login-container button {
            background-color: #555;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .login-container a {
            text-decoration: none;
            color: #333;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>User Login</h2>
    <form action="login.php" method="post">
        <input type="text" name="user_name" placeholder="Username" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <button type="submit" name="login">Login</button>
        <a href="registration.php">Register</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>

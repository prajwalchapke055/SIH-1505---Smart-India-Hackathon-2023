<?php
$login = false;

require('dbconnect.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "select * from admin where username='$username'";
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
                $_SESSION['username'] = $username;
                header("location:Admin-Dashboard.php");
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





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Boostrap CDN -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  


    <style>
        body,html {
            height: 100%;
            margin: 0;
            background-color: black;
            overflow: hidden;
            

        }

        .bg {
            background-image: url("https://source.unsplash.com/1920x720/?factory");
            height: 100%;       
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .btnhover:hover {
            background-color: green;
            transition: 0.5s;
            border: 2px solid black;

        }

        .heightt {
            margin-top: 20vh;
        }
        .ared:hover{
            font-size:x-large;
            color: red;
        }
    </style>

</head>

<body>
   
        <div class="container-fluied bg"  >
            <div class="row justify-content-center ">
                <div class="col-md-4 col-sm-6">

                    <form action="admin_login.php" method="post" class="shadow-lg shadow-intensity-xl rounded p-4 mb-5 text-white heightt bg-dark">

                        <div class="mb-2  text-center text-white">
                            <h2><u> Admin Login...</u></h2>
                          
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="email" class="form-label fw-bold">User Name</label>
                            <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                                name="username" required style="font-weight: bold;">
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" name="password" required style="font-weight: bold;">
                        </div>
                        
                        <div class="mb-3 mt-4">
                        <button type="submit" name="login" class="btn btn-primary mt-4 mx-auto btnhover"
                            style="width:120px;"><b>Login</b></button>
                        </div>
                        
                    
                    </form>
                </div>
            </div>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
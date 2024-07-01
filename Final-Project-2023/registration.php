<?php
require('dbconnect.php');

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $ucontact = $_POST['ucontact'];
    $uaadhar = $_POST['uaadhar'];
    $user_name = $_POST['user_name'];
    $password = $_POST['upassword'];



    $existSql = "select * from users where user_name='$user_name'  ";
    $result = mysqli_query($conn, $existSql);
    $numExistsRow = mysqli_num_rows($result);
    if ($numExistsRow > 0) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">  <strong>User Name Alerady Registerd... || </strong> Try to take another one...:(
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
    } else {

        
        if ($_POST["upassword"] == $_POST["cpassword"]) {
            // Generating password hash
            $hash = password_hash($password, PASSWORD_DEFAULT);

            
            // $sql = "INSERT INTO `users` (`uname`, `uemail`, `ucontact`, `uaadhar`, `user_name`, `password`) VALUES ('$uname','$uemail','$ucontact','$uaadhar','$user_name','$hash')";
            $sql = "INSERT INTO `users` (`uname`, `uemail`, `ucontact`, `uaadhar`, `user_name`, `password`) VALUES ('$uname','$uemail','+91$ucontact','$uaadhar','$user_name','$hash')";
            

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>User Register Successfully... :)
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      header("location:login.php");
            }
            
            else {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">  <strong>Failed... || </strong> Please Check Username And Password...:( <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            }
        } 
        
        
        else {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Error... || </strong> Password Does not Match:( <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url("Background Images/Abstract backdrop bright light blue blurred background_ (with copy space).jpeg");
            background-position: auto;
            background-size: cover;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .registration-container {
            background-color: grey;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .registration-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .registration-container button {
            background-color: #555;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .registration-container img {
            margin-top: 10px;
            width: 120px;
            height: auto;
        }

        .mandatory {
            color: red;
        }
    </style>
</head>

<body>

    <div class="registration-container">
        <h2>Registration Form</h2>
        <form action="registration.php" method="post">
            <label for="name">Name <span class="mandatory">*</span></label>
            <input type="text" id="uname" name="uname" placeholder="Insert characters only" pattern="[A-Za-z ]+"
                title="Please enter only characters" required>
            <br>
            <label for="email">Email ID <span class="mandatory">*</span></label>
            <input type="email" id="uemail" name="uemail" placeholder="Mandatory Email ID" required>
            <br>
            <label for="contact">Contact No <span class="mandatory">*</span></label>
            <input type="tel" id="ucontact" name="ucontact" placeholder="Insert numbers only" maxlength="15"
                pattern="[0-9]+" title="Please enter only numbers" required>
            <br>
            <label for="adhar">Adhar Card Number <span class="mandatory">*</span></label>
            <input type="text" id="uaadhar" name="uaadhar" placeholder="Insert numbers only (up to 12 digits)"
                maxlength="12" pattern="[0-9]{1,12}" title="Please enter up to 12 digits" required>
            <br>
            <label for="username">User Name <span class="mandatory">*</span></label>
            <input type="text" id="user_name" name="user_name"
                placeholder="Combination of character, special symbol, and number" pattern="^[A-Za-z0-9_-]{5,20}$"
                title="Minimum 5 characters, may include letters, numbers, underscores, or hyphens" required>
            <br>
            <label for="upassword">Password <span class="mandatory">*</span></label>
            <input type="password" id="upassword" name="upassword"
                placeholder="Not less than 6 characters, combination of character, special symbol, and number"
                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$"
                title="Minimum 6 characters, must include at least one letter, one number, and one special character"
                required>
            <br>
            <label for="cpassword">Confirm Password <span class="mandatory">*</span></label>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
            <br>
            
            <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Register" />
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
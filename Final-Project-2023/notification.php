<?php
require 'dbconnect.php';
// require 'nav.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    $recipient = 'all';

    $sql = "INSERT INTO messages (sender, recipient, message) VALUES ('admin', '$recipient', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Notification sent successfully. </strong>  
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}
?>

<!-- <html>
<body>

<form method="post" action="notification.php">
    <textarea name="message" rows="4" cols="50" placeholder="Type your emergency broadcast here"></textarea>
    <br>
    <input type="submit" value="Send Emergency Broadcast">
</form>

</body>
</html>-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Plan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url("Background Images/back4.jpeg");
            background-size: cover;
            background-repeat: repeat;
            background-position: center center;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .content {
            max-width: 60%;
            text-align: left;
            color: #fff; /* Set text color to white */
        }

        .image {
            max-width: 40%;
            border-radius: 8px;
        }

        .button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Added this style to make the image responsive */
        .image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        textarea {
            background-color: transparent;
            color: crimson;
            font-size: 24px;
            width: 100%; /* Full width */
            height: 400px; /* Increased height */
            padding: 20px; /* Adjusted padding for better visual appearance */
            box-sizing: border-box;
            border: 2px solid white;
        }

        input[type="submit"] {
            background: #5E5DF0;
            border-radius: 999px;
            box-shadow: #5E5DF0 0 10px 20px -10px;
            color: #FFFFFF;
            cursor: pointer;
            font-size: 18px;
            font-weight: 700;
            line-height: 28px;
            padding: 12px 28px;
            user-select: none;
            width: fit-content;
            word-break: break-word;
            border: 0;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="content">
            <h2 class="display-4 mb-4"> Notification</h2>
            <form method="post" action="notification.php">
                <textarea name="message" rows="20" cols="150" placeholder="Type your Traning Plan  here...!!!" class="form-control"></textarea>
                <br>
                <input type="submit" value="Send Notification" class="btn btn-primary">
            </form>
        </div>
        <div class="image">
            <!-- Replace 'your-image-url.jpg' with the actual image URL -->
            <!-- < <img src="Background Images/image_processing20200114-19369-1tb9u77.gif" alt="Image">  -->
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

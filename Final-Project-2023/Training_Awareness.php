<?php
require 'nav.php';
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $recipient = 'all';

    $sql = "INSERT INTO training_awareness (sender, recipient, message) VALUES ('admin', '$recipient', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo 'Emergency broadcast sent successfully.';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Awareness</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .container {
               display: flex;
               align-items: center;
               size:1000px;
              justify-content: center;
               background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
               border-radius: 15px; /* Rounded corners */
               padding: 20px; /* Add padding for a spacious look */
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box shadow for depth */
}


        .text {
            font-size: 20px;
            padding-left: 20px;
            padding-top: 20%;
            float: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text">
            <h1>Training and Awareness</h1>
            <form method="post" action="Training_Awareness.php" class="mt-4">
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="10" cols="10" placeholder="Type your emergency broadcast here"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

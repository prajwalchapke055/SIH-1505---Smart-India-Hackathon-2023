<?php
include 'dbconnect.php';

$sql_latest_message = "SELECT * FROM messages ORDER BY timestamp DESC LIMIT 1";
$result_latest_message = $conn->query($sql_latest_message);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Message</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            /*background-image: url("Background Images/Attention Please Clipart Hd PNG, Please Attention Sign Banner Information, Safety, Badge, Risk PNG Image For Free Download.jpeg");*/
            background-size: auto;
            background-position: 150px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .message-container {
                     background-color: #fff;
                     padding: 40px; /* Increase padding for more space */
                     border-radius: 12px; /* Increase border-radius for rounder corners */
                     box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Increase box-shadow for a more prominent shadow effect */
                     text-align: center;
                     width: 60%; /* Set a width, adjust as needed */
                     margin: 0 auto; /* Center the container horizontally */
                     font-size: 18px; /* Adjust font size as needed */
                     line-height: 1.6; /* Adjust line height for better readability */
        }

/* If you want to set a minimum height */
.message-container {
    min-height: 200px; /* Adjust as needed */
}


        h2 {
            color: red; /* Updated color to red */
            font-size: 24px; /* Updated font size to 24px */
        }

        p {
            margin: 10px 0;
            color: #666;
        }
    </style>
</head>
<body>

    <div class="message-container">
        <?php
        if ($result_latest_message->num_rows > 0) {
            $row_latest = $result_latest_message->fetch_assoc();
            echo '<h2>Latest Message</h2>';
            echo '<p><strong>' . $row_latest['sender'] . ':</strong> ' . $row_latest['message'] . ' (' . $row_latest['timestamp'] . ')</p>';
        } else {
            echo '<p>No messages.</p>';
        }
        ?>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Plan</title>
    <!-- Add Bootstrap CDN link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black; /* Light grey background */
            margin: 0;
        }

        .container {
            margin-top: 70px;
            color: #343a40; /* Dark text color */
            text-align: center;
        }

        h1 {
            color: #dc3545; /* Red color for the title */
        }

        hr {
            border-top: 2px solid #dc3545; /* Red color for the horizontal rule */
            width: 50%;
            margin: 20px auto;
        }

        .card {
            border: 1px solid #ced4da; /* Light grey border */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
        }

        .card-body {
            padding: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #6c757d; /* Dark grey text color */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Emergency Plan</h1>
    <hr>
    <?php
    require("dbconnect.php");
    // Your existing PHP code for fetching and displaying the latest message
    $sql_latest_message = "SELECT * FROM emergency_plan ORDER BY timestamp DESC LIMIT 1";
    
    $result_latest_message = $conn->query($sql_latest_message);

    if ($result_latest_message->num_rows > 0) {
        $row_latest = $result_latest_message->fetch_assoc();
        ?>
        <div class="card mt-4">
            <div class="card-body">
                <h2 class="text-danger">Latest Message</h2>
                <p><strong><?= $row_latest['sender'] ?>:</strong> <?= $row_latest['message'] ?> (<?= $row_latest['timestamp'] ?>)</p>
            </div>
        </div>
        <?php
    } else {
        echo '<p class="text-muted mt-4">No messages.</p>';
    }
    ?>
</div>

<!-- Add Bootstrap JS and Popper.js CDN links (optional, but required for some Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php
require("../nav.php");

#$val1  =20.55;
#$val2 = 30.55;

if(isset($_GET["submit"]))
{
    $val1=$_GET['val1'];
    $val2=$_GET['val2'];
    $val3=$_GET['val3'];
    $val4=$_GET['val4'];
    $val5=$_GET['val5'];
    $val6=$_GET['val6'];


    //echo shell_exec("python3 algo.py $val1 $val2 $val3 $val4 $val5 $val6 2>&1 ");
    $predictedY = shell_exec("python3 algo.py $val1 $val2 $val3 $val4 $val5 $val6 2>&1 ");

     echo "Predicted Y: $predictedY";
    //  echo $predictedY;

    if ($predictedY == 1) {
        // Connect to the database (replace dbname, username, password with your actual database credentials)
        $conn = new mysqli("localhost", "root", "", "hackathon");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve phone numbers from the users table
        $sql = "SELECT ucontact FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Initialize Twilio credentials
            $account_sid = 'AC26df0142b083e0bf2be31bf4bce57f4a';
            $auth_token = '24ef892e580999916fbfbc3ce4ea8532';
            $twilio_number = '+14125321164';

            // require_once 'test/vendor/autoload.php';
            require_once 'D:\Installed\Xampp2\htdocs\Project-final\vendor\autoload.php';
            

            // Create a Twilio client
            $twilio = new \Twilio\Rest\Client($account_sid, $auth_token);

            // Send SMS to each user
            while ($row = $result->fetch_assoc()) {
                $userContact = $row['ucontact'];

                // Replace with your Twilio phone number and SMS message
                $message = $twilio->messages->create(
                    $userContact,
                    array(
                        'from' => $twilio_number,
                        'body' => 'Alert !!!!!!!!!'
                    )
                );

                echo "SMS sent to $userContact.\n";
            }
        } else {
            echo "No users found in the database.";
        }

        // Close the database connection
        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form action="one.php" method="get">

            <div class="row mb-3">
                <div class="col">
                    <label for="val1">MQ-3 (Alcohol Sensor)(mg/L)</label>
                    <input type="text" class="form-control" id="val1" name="val1" required>
                </div>

                <div class="col">
                    <label for="val2">Second</label>
                    <input type="text" class="form-control" id="val2" name="val2" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="val3">Three</label>
                    <input type="text" class="form-control" id="val3" name="val3" required>
                </div>

                <div class="col">
                    <label for="val4">Four</label>
                    <input type="text" class="form-control" id="val4" name="val4" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="val5">Five</label>
                    <input type="text" class="form-control" id="val5" name="val5" required>
                </div>

                <div class="col">
                    <label for="val6">Six</label>
                    <input type="text" class="form-control" id="val6" name="val6" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
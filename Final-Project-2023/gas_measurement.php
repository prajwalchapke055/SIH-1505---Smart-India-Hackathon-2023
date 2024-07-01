<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Gas Measurements Table</title> -->
     <style>
        body {
            font-family: Arial, sans-serif;
            /* background-image: url("Background Images/Abstract backdrop bright light blue blurred background_ (with copy space).jpeg"); */
            background-color: grey;
            background-position:cover;
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            border: 2px solid black;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 2px solid black;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: orange;
        }

        tr:first-child {
            background-color: blueviolet; /* Change to your desired color */
            color: black; /* Change to your desired text color */
            border: 2px solid black; /* Change to your desired border color */
        }

        h1 {
            text-align: center;
            color: red;
        }
    </style> 
</head> 

<body>
    <?php
    // require("nav.php"); 
    ?>

    <h1><u>Gas Measurements Table</u></h1>
    <hr>
    <?php

if(isset($_GET["submit"]))
{


    $predictedY = shell_exec("python  mat1.py 2>&1 ");

    //  echo $predictedY;

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
    <form action="gas_measurement.php" method="get">
        <hr>
    <button type="submit" class="btn btn-danger" name="submit">Data Visualization</button>
    <hr >
</form>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
    <hr>

    <?php
    // Database connection parameters
    require('dbconnect.php');
    

    // Query to select data from the gas_measurements table
    $sql = "SELECT * FROM sensor_data";
    $result = $conn->query($sql);

    // Display data in a table
    if ($result->num_rows > 0) {
        echo "<table>\n";
        // Output table header
        echo "<tr>\n";
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $key => $value) {
                echo "<th>{$key}</th>\n";
            }
            break; // Only output the header once
        }
        echo "</tr>\n";

        // Output table rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n";
            foreach ($row as $value) {
                echo "<td>{$value}</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "<p>No results found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>

</html>

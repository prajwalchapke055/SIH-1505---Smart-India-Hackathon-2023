<?php
// require("../nav.php");

#$val1  =20.55;
#$val2 = 30.55;

if(isset($_GET["submit"]))
{


    //echo shell_exec("python3 algo.py $val1 $val2 $val3 $val4 $val5 $val6 2>&1 ");
    $predictedY = shell_exec("python3  mat.py 2>&1 ");

     echo "Predicted Y: $predictedY";
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
    <form action="fis.php" method="get">
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Values Form</title>
</head>
<body>
    <h2>Enter Sensor Values</h2>
    <form action="one.php" method="post">
        <label for="alcohol">MQ-3 (Alcohol Sensor)(mg/L): </label>
        <input type="text" name="alcohol" required><br>

        <label for="methane">MQ-4 (Methane Sensor)(ppm): </label>
        <input type="text" name="methane" required><br>

        <label for="co">MQ-7 (CO Sensor)(ppm): </label>
        <input type="text" name="co" required><br>

        <label for="hydrogen">MQ-8 (Hydrogen Sensor)(ppm): </label>
        <input type="text" name="hydrogen" required><br>

        <label for="co2">MQ-9 (CO Sensor)(ppm): </label>
        <input type="text" name="co2" required><br>

        <label for="air_quality">MQ-135 (Air Quality Sensor)(ppm): </label>
        <input type="text" name="air_quality" required><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>

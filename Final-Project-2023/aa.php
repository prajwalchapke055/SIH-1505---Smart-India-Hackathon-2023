<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Run Script</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="bb.php" method="post">
            <div class="form-group">
                <label for="mq3">MQ-3 (Alcohol Sensor)(mg/L):</label>
                <input type="text" class="form-control" id="mq3" name="mq3" required>
            </div>

            <div class="form-group">
                <label for="mq4">MQ-4 (Methane Sensor)(ppm):</label>
                <input type="text" class="form-control" id="mq4" name="mq4" required>
            </div>

            <div class="form-group">
                <label for="mq7">MQ-7 (CO Sensor)(ppm):</label>
                <input type="text" class="form-control" id="mq7" name="mq7" required>
            </div>

            <div class="form-group">
                <label for="mq8">MQ-8 (Hydrogen Sensor)(ppm):</label>
                <input type="text" class="form-control" id="mq8" name="mq8" required>
            </div>

            <div class="form-group">
                <label for="mq9">MQ-9 (CO Sensor)(ppm):</label>
                <input type="text" class="form-control" id="mq9" name="mq9" required>
            </div>

            <div class="form-group">
                <label for="mq135">MQ-135 (Air Quality Sensor)(ppm):</label>
                <input type="text" class="form-control" id="mq135" name="mq135" required>
            </div>

            <button type="submit" class="btn btn-primary">Run Script</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, but required for some features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

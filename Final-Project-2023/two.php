<?php

require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Twilio credentials
    $accountSid = 'AC26df0142b083e0bf2be31bf4bce57f4a';
    $authToken = '24ef892e580999916fbfbc3ce4ea8532';
    $twilioNumber = '+14125321164';

    // Recipient's phone number
    $recipientNumber = $_POST['recipient_number'];

    // Your message
    $message = $_POST['message'];

    // Create a Twilio client
    $client = new Client($accountSid, $authToken);

    try {
        // Send the SMS
        $message = $client->messages->create(
            $recipientNumber,
            [
                'from' => $twilioNumber,
                'body' => $message,
            ]
        );

        // Output success message
        echo 'Message sent! SID: ' . $message->sid;
    } catch (Exception $e) {
        // Handle Twilio REST API exceptions
        echo 'Twilio error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twilio SMS Form</title>
</head>
<body>

<h2>Twilio SMS Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="recipient_number">Recipient's Phone Number:</label>
    <input type="text" id="recipient_number" name="recipient_number" required>

    <br>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <br>

    <input type="submit" value="Send Message">
</form>

</body>
</html>

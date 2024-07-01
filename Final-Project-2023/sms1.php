<?php

require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

$accountSid = 'AC26df0142b083e0bf2be31bf4bce57f4a';
$authToken = '24ef892e580999916fbfbc3ce4ea8532';
$twilioPhoneNumber = '+917499003191'; // This should be a Twilio-verified phone number

$recipientPhoneNumber = ''; // Replace with the recipient's actual phone number
$messageContent = 'Your Message';

$client = new Client($accountSid, $authToken);

try {
    $message = $client->messages->create(
        $recipientPhoneNumber,
        [
            'from' => $twilioPhoneNumber,
            'body' => $messageContent,
        ]
    );

    echo 'Message SID: ' . $message->sid;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

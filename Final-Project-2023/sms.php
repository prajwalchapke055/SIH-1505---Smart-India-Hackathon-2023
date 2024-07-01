<?php

require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio Account SID and Auth Token
$accountSid = 'AC26df0142b083e0bf2be31bf4bce57f4a';
$authToken  = '24ef892e580999916fbfbc3ce4ea8532';

// Twilio phone number (Twilio will provide this)
$twilioPhoneNumber = '+917499003191';

// Recipient's phone number
$recipientPhoneNumber = '+919960294694'; // Replace with the recipient's actual phone number

// Your Twilio API credentials
$client = new Client($accountSid, $authToken);

// Message content
$message = $client->messages->create(
    $recipientPhoneNumber,
    [
        'from' => $twilioPhoneNumber,
        'body' => 'Hello, this is a test message from Twilio!',
    ]
);

// Output the SID of the message
echo 'Message SID: ' . $message->sid;

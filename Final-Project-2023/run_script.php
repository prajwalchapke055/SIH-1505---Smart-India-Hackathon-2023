<!-- receive_data.php -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Fetch the CSRF token from Django (replace http://localhost:8000 with your Django server address)
    $csrf_token_url = "http://localhost:8000/myapp/csrf_token/";
    $csrf_token = file_get_contents($csrf_token_url);

    // Make a GET request to the Django view
    $django_url = "http://localhost:8000/myapp/run_script88/";

    // Set up GET data with manually entered sensor values
    $getData = array(
        'mq_3' => $_GET['mq_3'],
        'mq_4' => $_GET['mq_4'],
        'mq_7' => $_GET['mq_7'],
        'mq_8' => $_GET['mq_8'],
        'mq_9' => $_GET['mq_9'],
        'mq_135' => $_GET['mq_135'],
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n" .
                        "Cookie: csrftoken=" . $csrf_token,
            'method' => 'GET',
            'content' => http_build_query($getData),
        ),
    );

    $context = stream_context_create($options);
    $result_json = file_get_contents($django_url, false, $context);

    // Decode the JSON result
    $result_array = json_decode($result_json, true);

    // Check if decoding was successful
    if ($result_array !== null) {
        // Extract and display the relevant information
        if (isset($result_array['result'])) {
            // Convert newline characters to HTML new lines
            $result_text = nl2br($result_array['result']);
            echo "Result from Django: " . $result_text;
        } elseif (isset($result_array['error'])) {
            echo "Error from Django: " . $result_array['error'];
        } else {
            echo "Unexpected response from Django";
        }
    } else {
        echo "Failed to decode JSON response from Django";
    }
}
?>

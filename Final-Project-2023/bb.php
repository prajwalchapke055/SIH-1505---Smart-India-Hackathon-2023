<!-- myapp/scripts/run_script1.php -->
<?php
error_reporting(E_ERROR | E_PARSE);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the CSRF token from Django (replace http://localhost:8000 with your Django server address)
    $csrf_token_url = "http://localhost:8000/myapp/csrf_token/";
    $csrf_token = file_get_contents($csrf_token_url);

    // Make a POST request to the Django view
    $django_url = "http://localhost:8000/myapp/run_script2/";

    // Set up POST data (if needed)
    $postData = array(); // You can add data if your Django view expects POST data

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n" .
                        "Cookie: csrftoken=" . $csrf_token,
            'method' => 'POST',
            'content' => http_build_query($postData),
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

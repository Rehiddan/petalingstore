<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Insecure way to retrieve feedback without validation
    $feedback = $_POST["feedback"];

    // Insecure way to display user input without proper sanitation
    echo "<h2>Feedback Received:</h2><p>$feedback</p>";
} else {
    // Insecure redirection without validation
    header("Location: insecure_feedback_form.html");
    exit();
}

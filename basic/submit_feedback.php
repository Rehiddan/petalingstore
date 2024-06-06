<?php

include ("../login/session.php");
include('../db.php');

session_start();
  
if (!isset($_SESSION['email'])) {
          
  // Check if the "remember_user" cookie is set
  if (isset($_COOKIE['remember_user'])) {
    // TODO: Authenticate the user using the cookie value
    // ...

    header('Location: ../login');
} 

}
		
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

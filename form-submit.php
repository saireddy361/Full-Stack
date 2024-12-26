<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $first_name = htmlspecialchars($_POST['first_name']);
    $middle_name = htmlspecialchars($_POST['middle_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $course = htmlspecialchars($_POST['course']);
    $gender = htmlspecialchars($_POST['gender']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);

    // Password matching check
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];

    if ($password !== $retype_password) {
        echo "Passwords do not match. Please go back and correct it.";
        exit();
    }

    // Email details
    $to = "saipro695@gmail.com";  // Teacher's email address
    $subject = "New Student Registration Details";

    // Compose the message
    $message = "Student Registration Details\n\n";
    $message .= "First Name: $first_name\n";
    $message .= "Middle Name: $middle_name\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Course: $course\n";
    $message .= "Gender: $gender\n";
    $message .= "Phone: $phone\n";
    $message .= "Address: $address\n";
    $message .= "Email: $email\n";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";  // Optional: Send from the student's email

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Registration successful! The details have been sent to the teacher's email.";
    } else {
        echo "Error: There was an issue sending the email. Please try again.";
    }
}
?>

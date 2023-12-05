<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set up email
    $to = "recipient@example.com"; // Replace with your email address
    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";

    // Compose the email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Address: $address\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message: $message\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
}
?>
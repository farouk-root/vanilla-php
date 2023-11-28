<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = strip_tags(htmlspecialchars($_POST['subject']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    if (empty($name) || empty($subject) || empty($message) || !$email) {
        http_response_code(400); // Bad Request
        exit("Invalid input data");
    }

    $to = "asma.ibrahim@esprit.tn"; // Replace with your recipient email
    $subject = "$subject: $name";
    $body = "You have received a new message from your website contact form.\n\n"
        . "Name: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage: $message";

    // Additional headers for SMTP
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200); // OK
        exit("Email sent successfully");
    } else {
        http_response_code(500); // Internal Server Error
        exit("Error sending email");
    }
} else {
    http_response_code(405); // Method Not Allowed
    exit("Invalid request method");
}

?>

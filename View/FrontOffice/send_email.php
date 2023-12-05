<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$messageContent = $_POST["message"];

// Load your email template
$templatePath = "template.html";
$template = file_get_contents($templatePath);

// Customize the template with user data
$template = str_replace("{{name}}", $name, $template);
$template = str_replace("{{email}}", $email, $template);
$template = str_replace("{{subject}}", $subject, $template);
$template = str_replace("{{message}}", nl2br($messageContent), $template);

require "../../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "farouk.chalghoumi@esprit.tn";
$mail->Password = "201JMT4923F";

$mail->setFrom($email, $name);
$mail->addAddress("farouk.chalghoumi@esprit.tn", "farouk");

$mail->Subject = $subject;
$mail->Body = $template;

$mail->isHTML(true); // Set email format to HTML

$mail->send();

header("Location: event.php");
?>

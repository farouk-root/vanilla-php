<?php
// approveParticipants.php

include_once '../../Controller/ParticipantController.php';
include_once '../../Controller/EventController.php';
use Controller\EventController;

use Controller\ParticipantController;
require "../../vendor/autoload.php";

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;

// Check if the form is submitted

    // Check if the event_id is set in the form data
    if (isset($_GET['id'])) {
        // Assuming you have the participant ID, replace 'participant_id' with the actual variable name
        $participantID = $_GET['id'];

        $participantData = ParticipantController::getOne($participantID);
        $name = $participantData['name'];
        $email = "farouk.chalghoumi@esprit.tn";
        $subject = "Event Approved";
        $messageContent = "Your registration has been approved.";
        $eventName = EventController::getOne($participantData['eventID'])['name'];
        $eventDate = EventController::getOne($participantData['eventID'])['startTime'];
        $eventLocation = EventController::getOne($participantData['eventID'])['location'];


// Load your email template
$templatePath = "template.html";
$template = file_get_contents($templatePath);

// Customize the template with user data
$template = str_replace("{{name}}", $name, $template);
$template = str_replace("{{email}}", $email, $template);
$template = str_replace("{{subject}}", $subject, $template);
$template = str_replace("{{message}}", nl2br($messageContent), $template);
$template = str_replace("{{eventName}}", $eventName, $template);
$template = str_replace("{{eventDate}}", $eventDate, $template);
$template = str_replace("{{eventLocation}}", $eventLocation, $template);

        

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
        $mail->addAddress($email, "farouk");

        $mail->Subject = $subject;
        $mail->Body = $template;

        $mail->isHTML(true); // Set email format to HTML

        $mail->send();

        // Call the updateParticipantStatus function
        ParticipantController::updateParticipantStatus($participantID);

        // Redirect to the event details page or any other page
        header("Location: events.php");
        exit();
    } else {
        // Handle the case where event_id is not set
        echo "Invalid form submission.";
    }

?>

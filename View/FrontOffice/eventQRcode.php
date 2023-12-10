<?php
require_once '../../vendor/autoload.php'; // Include Composer's autoloader
include_once '../../Controller/EventController.php';

use Controller\EventController;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\QRCode as QRCodeGenerator;


$eventId = isset($_GET['id']) ? $_GET['id'] : null;

if ($eventId) {
    $event = EventController::getOne($eventId);

    if ($event) {
        $eventData = "Event: " . $event['name'] . "\nDescription: " . $event['description'];

        // Generate QR Code
        $qrCode = new QRCode(new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_L,
            'scale' => 4,
        ]));

        $qrCode->render($eventData, 'qr_code.png'); // Save the QR code as an image

        echo 'QR Code generated successfully.';
    } else {
        echo 'Event not found.';
    }
} else {
    echo 'Invalid event ID.';
}

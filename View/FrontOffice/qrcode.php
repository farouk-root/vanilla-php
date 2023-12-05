<?php

// Include the Composer autoloader
require '../../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Writer\PngWriter;

// Data to be encoded in the QR code
$data = "2";

// Create a QR code instance
$qrCode = new QrCode($data);

// Set additional options (optional)
$qrCode
    ->setSize(300)  // Set the size of the QR code
    ->setMargin(10) // Set the margin around the QR code
    ->setForegroundColor(new Color(0, 0, 0)) // Set foreground color (black)
    ->setBackgroundColor(new Color(255, 255, 255)); // Set background color (white) // Set character encoding
// Save the QR code as an image file
// Create a PNG writer
$pngWriter = new PngWriter();

// Save the QR code as an image file
file_put_contents('qrcode.png', $pngWriter->write($qrCode));

echo "QR code generated successfully!";


?>
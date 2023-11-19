<?php
include_once '../Controller/eventController.php';
include_once '../Model/eventModel.php';
include_once '../config.php';
// Example usage:
$eventController = new EventController();

$eventModel = new EventModel(null, 'Example Event', '2023-12-01', '10:00:00', '16:00:00', 'Example Venue', 'Description of the event', 'John Doe', 'john.doe@example.com', '2023-11-30', 1);

// Add the event using the EventController
$newEventID = $eventController->ajouter($eventModel);

echo "New Event ID: " . $newEventID;
?>
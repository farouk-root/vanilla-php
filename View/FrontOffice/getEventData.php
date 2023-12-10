<?php

include_once '../../Controller/EventController.php';
use Controller\EventController;

// Ensure that the request is an AJAX request
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Get event data based on the provided event ID
    $eventId = isset($_GET['eventId']) ? $_GET['eventId'] : null;

    if ($eventId !== null) {
        $event = EventController::getOne($eventId);

        if ($event !== null) {
            $responseData = array('success' => true, 'data' => $event);
            echo json_encode($responseData);
        } else {
            $responseData = array('success' => false, 'message' => 'Event not found');
            echo json_encode($responseData);
        }
    } else {
        $responseData = array('success' => false, 'message' => 'Invalid event ID');
        echo json_encode($responseData);
    }
} else {
    // Handle non-AJAX requests if needed
    http_response_code(403); // Forbidden
    exit('Access denied');
}

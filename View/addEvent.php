<?php
include_once '../Controller/eventController.php';
include_once '../Model/eventModel.php';
include_once '../config.php';
// Example usage:
$eventController = new EventController();

if(isset($_POST['Submit'])){
    $eventName = $_POST['eventName'];
    $categoryID = $_POST['categoryID'];
    $date = $_POST['date'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $organizerName = $_POST['organizerName'];
    $organizerEmail = $_POST['organizerEmail'];
    $registrationDeadline = $_POST['registrationDeadline'];

    // Check if form inputs are empty
    if(empty($eventName) || empty($categoryID) || empty($date) || empty($startTime) || empty($endTime) || empty($location) || empty($description) || empty($organizerName) || empty($organizerEmail) || empty($registrationDeadline)){
        echo "Please fill in all fields.";
    }

    $eventModel = new EventModel($eventName, $categoryID, $date, $startTime, $endTime, $location, $description, $organizerName, $organizerEmail, $registrationDeadline);
    $newEventID = $eventController->ajouter($eventModel);

    if($newEventID){
        echo "New event added successfully!";
    }else{
        echo "Failed to add new event.";
    }
}
?>
<form action="" method="post">
    <label for="eventName">Event Name:</label>
    <input type="text" id="eventName" name="eventName" ><br>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" ><br>

    <label for="startTime">Start Time:</label>
    <input type="time" id="startTime" name="startTime" ><br>

    <label for="endTime">End Time:</label>
    <input type="time" id="endTime" name="endTime" ><br>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" ><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" ></textarea><br>

    <label for="organizerName">Organizer Name:</label>
    <input type="text" id="organizerName" name="organizerName" ><br>

    <label for="organizerEmail">Organizer Email:</label>
    <input type="email" id="organizerEmail" name="organizerEmail" ><br>

    <label for="registrationDeadline">Registration Deadline:</label>
    <input type="date" id="registrationDeadline" name="registrationDeadline" ><br>

    <label for="categoryID">Category ID:</label>
    <input type="number" id="categoryID" name="categoryID" ><br>

    <input type="submit" name="Submit" value="Submit">
</form>
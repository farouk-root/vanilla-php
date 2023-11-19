<?php
include_once '../config.php';
include_once '../model/eventModel.php';
include_once '../Model/categoryEventModel.php';
class EventController {
    function ajouter (EventModel $eventModel){
        $query = "INSERT INTO Events (EventName, Date, StartTime, EndTime, Location, Description, OrganizerName, OrganizerEmail, RegistrationDeadline, CategoryID) 
        VALUES (:eventName, :date, :startTime, :endTime, :location, :description, :organizerName, :organizerEmail, :registrationDeadline, :categoryID)";
        $db = new Database();
        $params = array(
            ':eventName' => $eventModel->getEventName(),
            ':date' => $eventModel->getDate(),
            ':startTime' => $eventModel->getStartTime(),
            ':endTime' => $eventModel->getEndTime(),
            ':location' => $eventModel->getLocation(),
            ':description' => $eventModel->getDescription(),
            ':organizerName' => $eventModel->getOrganizerName(),
            ':organizerEmail' => $eventModel->getOrganizerEmail(),
            ':registrationDeadline' => $eventModel->getRegistrationDeadline(),
            ':categoryID' => $eventModel->getCategoryID()
        );

        $db->execute($query, $params);

        $eventID = $db->getConnection()->lastInsertId();

        return $eventID;
    }

    function getAllEvents(){
        $query = "SELECT * FROM Events";
        $db = new Database();
        $events = $db->query($query);
    
        return $events;
    }
    function getCategorieByID($CategoryID) {
        $sql = "SELECT * FROM categories WHERE CategoryID = :CategoryID";
        $db = new Database();
        $params = array(
            ':CategoryID' => $CategoryID
        );
        $result =  $db->fetch($sql, $params);
        return  new CategoryEventModel($result['CategoryID'], $result['CategoryName']);
    }
}

?>
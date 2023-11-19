<?php
class EventModel {
    private $eventID;
    private $eventName;
    private $date;
    private $startTime;
    private $endTime;
    private $location;
    private $description;
    private $organizerName;
    private $organizerEmail;
    private $registrationDeadline;
    private $categoryID;

    // Constructor
    public function __construct($eventID, $eventName, $date, $startTime, $endTime, $location, $description, $organizerName, $organizerEmail, $registrationDeadline, $categoryID) {
        $this->eventID = $eventID;
        $this->eventName = $eventName;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->location = $location;
        $this->description = $description;
        $this->organizerName = $organizerName;
        $this->organizerEmail = $organizerEmail;
        $this->registrationDeadline = $registrationDeadline;
        $this->categoryID = $categoryID;
    }

    public function getEventName() {
        return $this->eventName;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getStartTime() {
        return $this->startTime;
    }

    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    public function getEndTime() {
        return $this->endTime;
    }

    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getOrganizerName() {
        return $this->organizerName;
    }

    public function setOrganizerName($organizerName) {
        $this->organizerName = $organizerName;
    }

    public function getOrganizerEmail() {
        return $this->organizerEmail;
    }

    public function setOrganizerEmail($organizerEmail) {
        $this->organizerEmail = $organizerEmail;
    }

    public function getRegistrationDeadline() {
        return $this->registrationDeadline;
    }

    public function setRegistrationDeadline($registrationDeadline) {
        $this->registrationDeadline = $registrationDeadline;
    }

    public function getCategoryID() {
        return $this->categoryID;
    }

    public function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    // Destructor (if needed)
    public function __destruct() {
        // Clean up, if needed
    }
}
?>
<?php

namespace Controller;

use Database;
use DateTime;
use Exception;
use Model\Event;


include_once  __DIR__ . '/../Database.php';
include_once __DIR__ . '/../model/Event.php';
include_once  __DIR__ . '/../Model/EventCategory.php';


class EventController
{
    static function getAll(): bool|array
    {
        $query = "SELECT * FROM events";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }

    static function getOne(int $id)
    {
        $query = "SELECT * FROM events WHERE id = $id";
        $db = Database::getConnection();
        return $db->query($query)->fetch();
    }

    static function create(Event $event): void
    {
        try {
            $db = Database::getConnection();

            $query = "INSERT INTO events (name, startTime, endTime, location, description, registrationDeadline, organisationID, categoryID) VALUES (:name, :startTime, :endTime, :location, :description, :registrationDeadline, :organisationID, :categoryID)";
            $req = $db->prepare($query);
            $req->execute([
                'name' => $event->getName(),
                'startTime' => $event->getStartTime(),
                'endTime' => $event->getEndTime(),
                'location' => $event->getLocation(),
                'description' => $event->getDescription(),
                'registrationDeadline' => $event->getRegistrationDeadline(),
                'organisationID' => $event->getOrganisationID(),
                'categoryID' => $event->getCategoryID()
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    static function update(Event $event)
    {
        $db = Database::getConnection();
        $query = "UPDATE events SET name = :name, startTime = :startTime, endTime = :endTime, location = :location, description = :description, registrationDeadline = :registrationDeadline, organisationID = :organisationID, categoryID = :categoryID WHERE id = :id";
        $req = $db->prepare($query);

        $req->execute([
            'id' => $event->getId(),
            'name' => $event->getName(),
            'startTime' => $event->getStartTime(),
            'endTime' => $event->getEndTime(),
            'location' => $event->getLocation(),
            'description' => $event->getDescription(),
            'registrationDeadline' => $event->getRegistrationDeadline(),
            'organisationID' => $event->getorganisationID(),
            'categoryID' => $event->getCategoryID()
        ]);
    }

    static function delete(int $id): void
    {
        $query = "DELETE FROM events WHERE id = $id";
        $db = Database::getConnection();
        $db->query($query);
    }

    static function getEventsByCategory(int $categoryID): bool|array
    {
        $query = "SELECT * FROM events WHERE categoryID = $categoryID";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }

    static function getEventsByOrganisation(int $organisationID): bool|array
    {
        $query = "SELECT * FROM events WHERE organisationID = $organisationID";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }
}
<?php

namespace Controller;

use Database;

class ParticipantController
{
    static function getAll(): array
    {
        $query = "SELECT * FROM participants";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }

    static function getOne(int $id): array
    {
        $query = "SELECT * FROM participants WHERE id = $id";
        $db = Database::getConnection();
        return $db->query($query)->fetch();
    }

    static function create(string $name, string $email, string $phone, int $eventID): void
    {
        $query = "INSERT INTO participants (name, email, phone, eventID) VALUES ('$name', '$email', '$phone', $eventID)";
        $db = Database::getConnection();
        $db->query($query);
    }

    static function update(int $id, string $name, string $email, string $phone, int $eventID): void
    {
        $query = "UPDATE participants SET name = '$name', email = '$email', phone = '$phone', eventID = $eventID WHERE id = $id";
        $db = Database::getConnection();
        $db->query($query);
    }

    static function delete(int $id): void
    {
        $query = "DELETE FROM participants WHERE id = $id";
        $db = Database::getConnection();
        $db->query($query);
    }

    static function getParticipantsByEvent(int $eventID): array
    {
        $query = "SELECT * FROM participants WHERE eventID = $eventID";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }
    static function getParticipantsByEventCount(int $eventID): int
    {
        $query = "SELECT COUNT(*) FROM participants WHERE eventID = $eventID";
        $db = Database::getConnection();
        return $db->query($query)->fetchColumn();
    }
}
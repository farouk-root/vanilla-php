<?php
namespace Controller;
use Database;


include_once __DIR__ . '/../Database.php'; // after
include_once __DIR__ . '/../Model/EventCategory.php';


class EventCategoryController {
    static function getAll(): bool|array
    {
        $query = "SELECT * FROM eventcategories";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }

    static function getOne(int $id)
    {
        $query = "SELECT * FROM eventcategories WHERE id = $id";
        $db = Database::getConnection();
        return $db->query($query)->fetch();
    }

    static function create(string $name): void
    {
        $db = Database::getConnection();

        $query = "INSERT INTO eventcategories (name) VALUES (':name')";
        $req = $db->prepare($query);
        $req->bindValue(':name', $name);
        $req->execute();
    }

    static function update(int $id, string $name)
    {
        $db = Database::getConnection();
        $query = "UPDATE eventcategories SET name = ':name' WHERE id = $id";
        $req = $db->prepare($query);
        $req->bindValue(':name', $name);
        $req->execute();

        $db->query($query);
    }

    static function delete(int $id): void
    {
        $query = "DELETE FROM eventcategories WHERE id = $id";
        $db = Database::getConnection();
        $db->query($query);
    }
}


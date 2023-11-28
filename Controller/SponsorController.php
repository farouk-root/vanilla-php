<?php

namespace Controller;

use Database;

class SponsorController
{
    function getAll()
    {
        $query = "SELECT * FROM sponsors";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }
    function getOne($id)
    {
        $query = "SELECT * FROM sponsors WHERE id = $id";
        $db = Database::getConnection();
        return $db->query($query)->fetch();
    }
    static function delete($id)
    {
        $query = "DELETE FROM sponsors WHERE id = $id";
        $db = Database::getConnection();
        return $db->query($query);
    }
    function update($id, $name, $logo, $website)
    {
        $query = "UPDATE sponsors SET name = '$name', logo = '$logo', website = '$website' WHERE id = $id";
        $db = Database::getConnection();
        return $db->exec($query);
    }
    static function add (string $name ,string  $email ,string  $phone ,string  $address ,int $eventID) 
    {
        $query = "INSERT INTO sponsors (name , email , phone , address ,id_event) VALUES ('$name' , '$email' , '$phone' , '$address', $eventID)";
        $db = Database::getConnection();
        return $db->query($query);
    }

    static function getSponsorsByEvent($id)
    {
        $query = "SELECT * FROM sponsors WHERE id_event = $id";
        $db = Database::getConnection();
        return $db->query($query)->fetchAll();
    }
    static function getSponsorsByEventCount($id)
    {
        $query = "SELECT COUNT(*) FROM sponsors WHERE id_event = $id";
        $db = Database::getConnection();
        return $db->query($query)->fetchColumn();
    }
}
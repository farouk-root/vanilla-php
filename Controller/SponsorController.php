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
}
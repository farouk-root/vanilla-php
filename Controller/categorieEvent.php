<?php 
include_once '../config.php';
include_once '../Model/categoryEventModel.php';

class categoryEventController {
    function getAllCategories(){
        $query = "SELECT * FROM categories";
        $db = new Database();
        $categories = $db->query($query);
    
        return $categories;
    }
}

?>
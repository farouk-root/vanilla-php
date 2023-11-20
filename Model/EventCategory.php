<?php
namespace Model;

class EventCategory
{
    private $categoryID;
    private $categoryName;

    // Constructor
    public function __construct($categoryID, $categoryName)
    {
        $this->categoryID = $categoryID;
        $this->categoryName = $categoryName;
    }

    // Getter and Setter methods for each attribute
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;
    }

    public function getCategoryName()
    {
        return $this->categoryName;
    }

    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    public function __toString()
    {
        return $this->categoryName;
    }
}

?>

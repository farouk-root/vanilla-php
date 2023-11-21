<?php
include_once __DIR__ .'/../../Controller/EventController.php';
include_once __DIR__ .'/../../Controller/EventCategoryController.php';
include_once __DIR__ .'/../../Controller/OrganisationController.php';
use Model\OrganisationController;
use Controller\EventController;
use Controller\EventCategoryController;
//EventController::delete($_GET['id']);
header('Location: getAllEvents.php');
exit();
?>
<?php
include_once __DIR__ .'/../../Controller/EventController.php';
include_once __DIR__ .'/../../Controller/EventCategoryController.php';
include_once __DIR__ .'/../../Controller/OrganisationController.php';
include_once __DIR__ . '/../../Controller/ParticipantController.php';    
use Model\OrganisationController;
use Controller\EventController;
use Controller\EventCategoryController;
use Controller\ParticipantController;
use Model\Participant;
ParticipantController::delete($_GET['id']);
header('Location: getAllEvents.php');
exit();
?>
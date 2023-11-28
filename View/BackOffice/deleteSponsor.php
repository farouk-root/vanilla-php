<?php
include_once __DIR__ .'/../../Controller/SponsorController.php';
include_once __DIR__ .'/../../Controller/EventController.php';
use Controller\EventController;
use Controller\SponsorController;
SponsorController::delete($_GET['id']);
header('Location: getAllEvents.php');
exit();
?>
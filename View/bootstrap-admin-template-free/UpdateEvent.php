<?php

use Controller\EventCategoryController;
use Controller\EventController;
use Controller\OrganisationController;
use Model\Event;

include_once '../../Model/Event.php';
include_once '../../Controller/EventController.php';
include_once '../../Controller/EventCategoryController.php';
include_once '../../Controller/OrganisationController.php';

$organisations = OrganisationController::getAll();
$categories = EventCategoryController::getAll();
if (isset($_GET['id']))
    $event = EventController::getOne($_GET['id']);
else
    header("Location: index.php");

if (!$event)
    header("Location: index.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $registrationDeadline = $_POST['registrationDeadline'];
    $organisation = $_POST['organisation'];
    $category = $_POST['category'];
    $event = new Event($_GET['id'], $name, $startTime, $endTime, $location, $description, $registrationDeadline, $organisation, $category);

    EventController::update($event);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <?php include_once 'components/sidebar.php' ?>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <?php include_once 'components/navbar.php' ?>
        <!-- Navbar End -->


        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Add Event</h6>
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="<?= $event['name'] ?>"
                                       placeholder="Event Name" name="name">
                                <label for="floatingInput">Event Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="floatingPassword"
                                       value="<?= $event['startTime'] ?>"
                                       placeholder="Start Date-Time" name="startTime">
                                <label for="floatingPassword">Start Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="floatingPassword"
                                       value="<?= $event['endTime'] ?>"
                                       placeholder="End Date-Time" name="endTime">
                                <label for="floatingPassword">End Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword"
                                       value="<?= $event['location'] ?>"
                                       placeholder="Location" name="location">
                                <label for="floatingPassword">Location</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Description" name="description"
                                          id="floatingTextarea"
                                          style="height: 100px;resize: none"><?= $event['description'] ?></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="floatingPassword"
                                       value="<?= $event['registrationDeadline'] ?>"
                                       placeholder="Registration Deadline" name="registrationDeadline">
                                <label for="floatingPassword">Registration Deadline</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="organisation">
                                    <option selected>Please Select an organisation</option>
                                    <?php
                                    foreach ($organisations as $organisation)
                                        if ($organisation['id'] == $event['organisationID'])
                                            echo "<option value='$organisation[id]' selected>$organisation[name]</option>";
                                        else
                                            echo "<option value='$organisation[id]'>$organisation[name]</option>";
                                    ?>
                                </select>
                                <label for="floatingSelect">Organisation</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="category">
                                    <option selected>Please Select a category</option>
                                    <?php
                                    foreach ($categories as $category)
                                        if ($event['categoryID'] == $category['id'])
                                            echo "<option value='$category[id]' selected>$category[name]</option>";
                                        else
                                            echo "<option value='$category[id]'>$category[name]</option>";
                                    ?>
                                </select>
                                <label for="floatingSelect">Category</label>
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->


        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
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

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $registrationDeadline = $_POST['registrationDeadline'];
    $organisation = $_POST['organisation'];
    $category = $_POST['category'];
    $event = new Event(0, $name, $startTime, $endTime, $location, $description, $registrationDeadline, $organisation, $category);

    EventController::create($event);
    header("Location: getAllEvents.php");
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
    <script src="./js/form-validator.js"></script>
    <style>
    .invalid-input {
        border: 1px solid red;
    }
    .error-message {
    color: #ff0000; /* Red color for error messages */
    font-size: 14px;
    margin-top: 5px;
}
</style>

<script>
function validateForm() {
    // Fetching form elements
    var eventNameInput = document.querySelector('input[name="name"]');
    var startTimeInput = document.querySelector('input[name="startTime"]');
    var endTimeInput = document.querySelector('input[name="endTime"]');
    var locationInput = document.querySelector('input[name="location"]');
    var descriptionInput = document.querySelector('textarea[name="description"]');
    var registrationDeadlineInput = document.querySelector('input[name="registrationDeadline"]');
    var organisationSelect = document.querySelector('select[name="organisation"]');
    var categorySelect = document.querySelector('select[name="category"]');

    // Reset the styles and error messages from previous submissions
    clearValidationStyles();

    // Perform basic validation
    var isValid = true;

    // Check if event name is empty
    if (eventNameInput.value.trim() === '') {
        highlightInput(eventNameInput);
        displayErrorMessage(eventNameInput, 'Event name cannot be empty');
        isValid = false;
    }

    // Check if start time is empty
    if (startTimeInput.value.trim() === '') {
        highlightInput(startTimeInput);
        displayErrorMessage(startTimeInput, 'Start time cannot be empty');
        isValid = false;
    }

    // Check if end time is empty
    if (endTimeInput.value.trim() === '') {
        highlightInput(endTimeInput);
        displayErrorMessage(endTimeInput, 'End time cannot be empty');
        isValid = false;
    }

    // Check if location is empty
    if (locationInput.value.trim() === '') {
        highlightInput(locationInput);
        displayErrorMessage(locationInput, 'Location cannot be empty');
        isValid = false;
    }

    // Check if description is empty
    if (descriptionInput.value.trim() === '') {
        highlightInput(descriptionInput);
        displayErrorMessage(descriptionInput, 'Description cannot be empty');
        isValid = false;
    }

    // Check if registration deadline is empty
    if (registrationDeadlineInput.value.trim() === '') {
        highlightInput(registrationDeadlineInput);
        displayErrorMessage(registrationDeadlineInput, 'Registration deadline cannot be empty');
        isValid = false;
    }

    // Check if organisation is not selected
    if (organisationSelect.value === 'Please Select an organisation') {
        highlightInput(organisationSelect);
        displayErrorMessage(organisationSelect, 'Please select an organisation');
        isValid = false;
    }

    // Check if category is not selected
    if (categorySelect.value === 'Please Select a category') {
        highlightInput(categorySelect);
        displayErrorMessage(categorySelect, 'Please select a category');
        isValid = false;
    }

    // Prevent form submission if validation fails
    return isValid;
}

function highlightInput(inputElement) {
    inputElement.classList.add('invalid-input');
}

function displayErrorMessage(inputElement, errorMessage) {
    // Check if there's already an error message displayed
    var existingErrorMessage = inputElement.nextElementSibling;
    if (existingErrorMessage && existingErrorMessage.classList.contains('error-message')) {
        existingErrorMessage.innerText = errorMessage;
    } else {
        var errorElement = document.createElement('div');
        errorElement.innerText = errorMessage;
        errorElement.classList.add('error-message');
        inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
    }
}

function clearValidationStyles() {
    var invalidInputs = document.querySelectorAll('.invalid-input');
    invalidInputs.forEach(function (input) {
        input.classList.remove('invalid-input');

        // Remove error messages
        var errorElement = input.nextElementSibling;
        if (errorElement && errorElement.classList.contains('error-message')) {
            input.parentNode.removeChild(errorElement);
        }
    });
}

</script>


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
    <?php include_once 'components/sidebarEvent.php' ?>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                     style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                     style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                     style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                             style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">John Doe</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Add Event</h6>
                        <form method="post" name="eventForm" onsubmit="return validateForm()">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                       placeholder="Event Name" name="name">
                                <label for="floatingInput">Event Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="floatingPassword"
                                       placeholder="Start Date-Time" name="startTime">
                                <label for="floatingPassword">Start Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="floatingPassword"
                                       placeholder="End Date-Time" name="endTime">
                                <label for="floatingPassword">End Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword"
                                       placeholder="Location" name="location">
                                <label for="floatingPassword">Location</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Description" name="description"
                                          id="floatingTextarea" style="height: 100px;resize: none"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="floatingPassword"
                                       placeholder="Registration Deadline" name="registrationDeadline">
                                <label for="floatingPassword">Registration Deadline</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="organisation">
                                    <option selected>Please Select an organisation</option>
                                    <?php
                                        foreach ($organisations as $organisation)
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
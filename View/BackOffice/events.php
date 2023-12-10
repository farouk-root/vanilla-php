<?php
include_once __DIR__ .'/../../Controller/EventController.php';
include_once __DIR__ .'/../../Controller/EventCategoryController.php';
include_once __DIR__ .'/../../Controller/OrganisationController.php';
use Model\OrganisationController;
use Controller\EventController;
use Controller\EventCategoryController;
$events = EventController::getAll();
$eventCategories = EventCategoryController::getAll();
//$organisations = OrganisationController::getAll();

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
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


<div class="container-fluid position-relative bg-white d-flex p-0">
<!-- Sidebar Start -->
<?php include_once 'components/sidebarEvent.php' ?>
    <!-- Sidebar End -->
</div>


<div class="content">
<?php include_once 'components/navbar.php' ?>
    <div class="col-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Events</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Event Name</th>
                                                <th scope="col">Categry</th>
                                                <th scope="col">Start Time</th>
                                                <th scope="col">End Time</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Registration Deadline</th>
                                                
                                                <th scope="col">Participants</th>
                                                <th scope="col">Sponsors</th>
                                                <th scope="col">Update</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($events as $event)
                                            {
                                                $eventCategory = EventCategoryController::getOne($event['categoryID']);
                                                //$organisation = OrganisationController::getOne($event['organisationID']);
                                                echo "<tr>";
                                                echo "<td>".$event['id']."</td>";
                                                echo "<td>".$event['name']."</td>";
                                                echo "<td>".$eventCategory['name']."</td>";
                                                echo "<td>".$event['startTime']."</td>";
                                                echo "<td>".$event['endTime']."</td>";
                                                echo "<td>".$event['location']."</td>";
                                                echo "<td>".$event['registrationDeadline']."</td>";
                                                //echo "<td>".$organisation['name']."</td>";
                        
                                                echo "<td>
                                                            <a href='eventDetails.php?id=".$event['id']."'><i class='fa fa-eye'></i></a> 
                                                        </td>";
                                                echo "<td>
                                                        <a href='getEventSponsors.php?id=".$event['id']."'><i class='fa fa-eye'></i></a>
                                                    </td>";
                                                echo "
                                                <td>
                                                
                                                        <a href='UpdateEvent.php?id=".$event['id']."'><i class='fa fa-edit'></i></a>
                                                    
                                                        </td>";
                                                echo "<td>
                                                    <a href='deleteEvent.php?id=".$event['id']."'><i class='fa fa-trash'></i></a>
                                                </td>";
                                                
                            
                                                echo "</tr>";
                                            }
                                            ?>
                        
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


    </div>
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
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

$participants =  ParticipantController::getParticipantsByEvent(EventController::getOne($_GET['id'])['id']);

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





<!-- Sidebar Start -->
<?php include_once 'components/sidebarEvent.php' ?>
    <!-- Sidebar End -->


<div class="content">
    <div class="col-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Participants </h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name </th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Event</th>
                                                
                                                
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($participants as $participant ){
                                                echo '<tr>';
                                                echo '<th scope="row">'.$participant['id'].'</th>';
                                                echo '<td>'.$participant['name'].'</td>';
                                                echo '<td>'.$participant['email'].'</td>';
                                                echo '<td>'.$participant['phone'].'</td>';
                                                echo '<td>'.$participant['eventID'].'</td>';
                                                
                                                
                                                echo '<td><a href="deleteParticipant.php?id='.$participant['id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>';
                                                echo '</tr>';
                                            }
                                            ?>
                        
                                        
                                        </tbody>
                                    </table>
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
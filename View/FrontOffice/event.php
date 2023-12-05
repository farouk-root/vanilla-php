<?php
include_once '../../Controller/EventController.php';

use Controller\EventController;

$events = EventController::getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HELPZ - Free Charity Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Top Bar Start -->
<div class="top-bar d-none d-md-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="top-bar-left">
                    <div class="text">
                        <i class="fa fa-phone-alt"></i>
                        <p>+123 456 7890</p>
                    </div>
                    <div class="text">
                        <i class="fa fa-envelope"></i>
                        <p>info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top-bar-right">
                    <div class="social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar End -->

<!-- Nav Bar Start -->
<div class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a href="index.html" class="navbar-brand">Helpz</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="causes.html" class="nav-item nav-link">Causes</a>
                <a href="event.php" class="nav-item nav-link active">Events</a>
                <a href="blog.html" class="nav-item nav-link">Blog</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu">
                        <a href="single.html" class="dropdown-item">Detail Page</a>
                        <a href="service.html" class="dropdown-item">What We do</a>
                        <a href="team.html" class="dropdown-item">Meet The Team</a>
                        <a href="donate.html" class="dropdown-item">Donate Now</a>
                        <a href="volunteer.html" class="dropdown-item">Become A Volunteer</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </div>
</div>
<!-- Nav Bar End -->


<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Upcoming Events</h2>
            </div>
            <div class="col-12">
                <a href="">Home</a>
                <a href="">Events</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Event Start -->
<div class="event">
    <div class="container">
        <div class="section-header text-center">
            <p>Upcoming Events</p>
            <h2>Be ready for our upcoming charity events</h2>
        </div>
        <div class="row">
            <?php
            if (empty($events)) {
                echo "<h1>No events found</h1>";
            } else
                foreach ($events as $event) {
                    try {
                        $date = new DateTime(explode(" ", $event['startTime'])[0]);
                        $date = $date->format('d M Y');
                        $enddate = new DateTime(explode(" ", $event['endTime'])[0]);
                        $enddate = $enddate->format('d M Y');
                        $startTime = explode(" ", $event['startTime'])[1];
                        $endTime = explode(" ", $event['endTime'])[1];
                        

                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    $startDateTime = explode(" ", $event['startTime'])[1];
                    $endDateTime = explode(" ", $event['endTime'])[1];
                    ?>
                    <div class="col-lg-6">
                        <div class="event-item">
                            <img src="img/event-1.jpg" alt="Image">
                            <div class="event-content">
                                <div class="event-meta">
                                    <?php
                                    if ($date == $enddate) {
                                        ?>
                                        <div style="border-bottom:1px solid #000;">
                                            <div style="display: inline;">
                                                <i class="fa fa-calendar-alt" style="display: inline;color:#7CFC00"></i>
                                                <h2 style="display: inline;font-size:medium;color:#7CFC00">Start</h2>
                                            </div>
                                            <div><?= $date ?></div>
                                            <div style="display: inline;">
                                                <i class="fa fa-clock" style="display: inline;color:#7CFC00"></i>
                                                <h2 style="display: inline;font-size:medium;color:#7CFC00"><?= $startTime ?> - <?= $endTime ?></h2>
                                            </div>
                                        </div>



                                        <p><i class="fa fa-map-marker-alt"></i><?= $event['location'] ?> </p>
                                        <?php
                                    } else {
                                        ?>
                                        <div style="border-bottom:1px solid #000;">
                                            <div style="display: inline;">
                                                <i class="fa fa-calendar-alt" style="display: inline;color:#7CFC00"></i>
                                                <h2 style="display: inline;font-size:medium;color:#7CFC00">Start</h2>
                                            </div>
                                            <div><?= $date ?></div>
                                            <div style="display: inline;">
                                                <i class="fa fa-clock" style="display: inline;color:#7CFC00"></i>
                                                <h2 style="display: inline;font-size:medium;color:#7CFC00"><?= $startTime ?></h2>
                                            </div>
                                        </div>
                                        <div style="border-bottom:1px solid #000;">
                                            <div style="display: inline;">
                                                <i class="fa fa-calendar-alt" style="display: inline;color:red"></i>
                                                <h2 style="display: inline;font-size:medium;color:red">End</h2>
                                            </div>
                                            <div><?= $enddate ?></div>
                                            <div style="display: inline;">
                                                <i class="fa fa-clock" style="display: inline;color:red"></i>
                                                <h2 style="display: inline;font-size:medium;color:red  "><?= $endTime ?></h2>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <p><i class="fa fa-map-marker-alt"></i><?= $event['location'] ?> </p>
                                    
                                </div>
                                <div class="event-text">
                                    <h3><?= $event['name'] ?></h3>
                                    <div >
                                        <?php
                                        $description = $event['description'];
                                        $maxLength = 20; // Adjust the maximum length as needed

                                        if (strlen($description) > $maxLength) {
                                            echo substr($description, 0, $maxLength) . '...';
                                        } else {
                                            echo $description;
                                        }
                                        ?>
                                    </div>
                                    <a class="btn btn-custom" href="aboutEvent.php?id=<?= $event['id'] ?>">Read More</a>
                                </div>
                                
                            </div>
                            <?php
                            $baseURL = 'https://localhost/vanilla-php/View/FrontOffice/aboutEvent.php';
                            $postID = $event['id']; // Replace with the actual post ID
                            
                            // Construct the Facebook share URL with URL encoding
                            $facebookShareURL = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode("{$baseURL}?id={$postID}");
                            
                            echo '<a href="' . $facebookShareURL . '" class="share facebook">
                                <button class="btn btn-custom">
                                    <svg style="width: 30px; height: 30px; margin-top: 5px; margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    <b>Share</b>
                                </button>
                            </a>';
                            ?>
                           
                        </div>
                    </div>

                    <?php
                }
            ?>

        </div>
    </div>
</div>
<!-- Event End -->


<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact">
                    <h2>Our Head Office</h2>
                    <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope"></i>info@example.com</p>
                    <div class="footer-social">
                        <a class="btn btn-custom" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-custom" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-custom" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-custom" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-custom" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-link">
                    <h2>Popular Links</h2>
                    <a href="">About Us</a>
                    <a href="">Contact Us</a>
                    <a href="">Popular Causes</a>
                    <a href="">Upcoming Events</a>
                    <a href="">Latest Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-link">
                    <h2>Useful Links</h2>
                    <a href="">Terms of use</a>
                    <a href="">Privacy policy</a>
                    <a href="">Cookies</a>
                    <a href="">Help</a>
                    <a href="">FQAs</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-newsletter">
                    <h2>Newsletter</h2>
                    <form>
                        <input class="form-control" placeholder="Email goes here">
                        <button class="btn btn-custom">Submit</button>
                        <label>Don't worry, we don't spam!</label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container copyright">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; <a href="#">Your Site Name</a>, All Right Reserved.</p>
            </div>
            <div class="col-md-6">
                <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to top button -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Pre Loader -->
<div id="loader" class="show">
    <div class="loader"></div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/parallax/parallax.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>

<?php
// Replace 'YOUR_BASE_URL' with the base URL of your website
$baseURL = 'https://localhost/vanilla-php/View/FrontOffice/aboutEvent.php';
$postID = $_GET['id']; // Replace with the actual post ID

// Construct the Facebook share URL with URL encoding
$facebookShareURL = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode("{$baseURL}?id={$postID}");

// Output the HTML with the share button
echo '<a href="' . $facebookShareURL . '" class="share facebook">
        <button class="w3-button w3-padding-small w3-light-blue w3-border w3-medium">
            <svg style="width: 30px; height: 30px; margin-top: 5px; margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
            <b>Share</b>
        </button>
    </a>';
?>

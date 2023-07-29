<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
?>



<!DOCTYPE html>
<html>
<head>
<title>Adventurer's Guild Log</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="bwebstyle.css" rel="stylesheet" type="text/css">


</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="logo">
<img src="ALlogo.png" alt>
    </a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#home" class="w3-bar-item w3-button"><ion-icon name="home"></ion-icon>HOME</a>
      <a href="#about" class="w3-bar-item w3-button"><ion-icon name="help-circle"></ion-icon>ABOUT</a>
      <a href="#team" class="w3-bar-item w3-button"><ion-icon name="call"></ion-icon>CONTACT DETAILS</a>
      
      <a href="cphonebook.php" class="w3-bar-item w3-button"><ion-icon name="book"></ion-icon>PHONE BOOK</a>
      <a href="logout.php"class="w3-bar-item w3-button"><ion-icon name="log-out"></ion-icon>LOGOUT</a>
     
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#home" class="w3-bar-item w3-button"><ion-icon name="home"></ion-icon>HOME</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"><ion-icon name="help-circle"></ion-icon>ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button"><ion-icon name="call"></ion-icon>CONTACT DETAILS</a>


    <a href="cphonebook.php" class="w3-bar-item w3-button"><ion-icon name="book"></ion-icon>PHONE BOOK</a>
      <a href="logout.php"class="w3-bar-item w3-button"><ion-icon name="log-out"></ion-icon>LOG OUT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small"><p>Welcome back,<br> <?=$_SESSION['name']?>!</p></span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium"><p>Welcome back,<br><?=$_SESSION['name']?>!</p></span><br>
    <span class="w3-large">Register to our guild to join quests</span>
    <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">About Guild Log Book</a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <a href="https://www.facebook.com/charles.dominique826" target="_blank"> <i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="https://www.instagram.com/cduminek/" target="_blank"> <i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="https://twitter.com/charles_bacanto" target="_blank"> <i class="fa fa-twitter w3-hover-opacity"></i></a>
  </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT THE ADVENTURER'S GUILD LOG BOOK</h3>
  <p class="w3-center w3-large">It is a website that enables the user to register, sign-up and log-out accounts and also store personal information in a phonebook manner</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
    <ion-icon name="desktop" class="w3-margin-bottom w3-jumbo w3-center"></ion-icon>
      <p class="w3-large">Purposes and Functions</p>
      <p>The Adventurer's Guild Log Book can log-in and log-out accounts and store credentials of personal information like an actual phonebook. Moreover, it exhibits and offers the CRUD function, CREATE, READ, UPDATE and DELETE.</p>
    </div>
    <div class="w3-quarter">
    <ion-icon name="brush" class="w3-margin-bottom w3-jumbo w3-center"></ion-icon>
      <p class="w3-large">Visuals</p>
      <p>The website used <a href="https://www.canva.com/design/DAFoqtiqZJE/KD19Mbiw_9KyktlDkBta1w/edit?utm_content=DAFoqtiqZJE&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton">Canva</a> to create the visuals.</p>
    </div>
    <div class="w3-quarter">
    <ion-icon name="settings" class="w3-margin-bottom w3-jumbo w3-center"></ion-icon>
      <p class="w3-large">Structure</p>
      <p>The AG: Logbook utilized and composed mostly PHP, CSS, JAVASCRIPT for front and back-end, and PHPMYADMIN for the SQL.</p>
    </div>
    <div class="w3-quarter">
    <ion-icon name="people"class="w3-margin-bottom w3-jumbo w3-center"></ion-icon>
      <p class="w3-large">Target Users</p>
      <p>All adventurers are welcome and allowed to use our directory. Sign-up now and join our Guild and see you in the battlefield!</p>
    </div>
  </div>
</div>


<!-- Team Section -->
<div class="w3-container" style="padding: 128px 16px; background-color: #FFFFFF;" id="team">
  <h3 class="w3-center">Contact information</h3>
  <p class="w3-center w3-large">Here are my social media accounts so feel free to hit me up adventurers, Geng geng</p>
  <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <a href="https://www.instagram.com/cduminek/"> <img src="ig.png" alt="John" style="width:100%"></a>
        <div class="w3-container">
          <h3>Instagram</h3>
          <p class="w3-opacity">cduminek</p>
          <p>Feel free to direct message me in <a href="https://www.instagram.com/cduminek/">Instagram</a> @cduminek.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
      <a href="https://www.facebook.com/charles.dominique826"><img src="fb.png" alt="Jane" style="width:100%"></a>
        <div class="w3-container">
          <h3>Facebook</h3>
          <p class="w3-opacity">Charles Dominique</p>
          <p>Feel free to private message me in <a href="https://www.facebook.com/charles.dominique826">Facebook</a> @charlesdominique.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
      <a href="https://twitter.com/charles_bacanto"><img src="tw.png" alt="Mike" style="width:100%"></a>
        <div class="w3-container">
          <h3>Twitter</h3>
          <p class="w3-opacity">Dom</p>
          <p>Feel free to direct message me in <a href="https://twitter.com/charles_bacanto">Twitter</a> @charles_bacanto.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="me.png" alt="Dan" style="width:100%">
        <div class="w3-container">
          <h3>Personal Information</h3>
          <p class="w3-opacity">Charles Dominique A. Bacanto</p>
          <p> I am Charles Dominique A. Bacanto, a Computer Engineer Student in University of Batangas. You can email me in my university mail at 1820252@ub.edu.ph</p>
         
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-grey w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.facebook.com/charles.dominique826" target="_blank"> <i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="https://www.instagram.com/cduminek/" target="_blank"> <i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="https://twitter.com/charles_bacanto" target="_blank"> <i class="fa fa-twitter w3-hover-opacity"></i></a>

  </div>
  <p>Salamat sa website template labyu <3 <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
<script src="bwebscript.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>


</html>

<!doctype html>
<?php
  include ('includes/cookie_checker.inc.php');
?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bantay Bagyo | <?php echo $title?></title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/bantaybagyo.css" />
  </head>
  <body>
    
    <header>
      <div id="header-wrapper">
        <div id = "logo-wrapper">
	       <p><a href="">Bantay Bagyo</a></p>
        </div>
        <div id = "form-wrapper">
	       <div id="links">
            <?php
              if($session_master->isLoggedin()){
                echo '<div id = "options">';
                include ('includes/header_options_button.inc.php');
                include ('includes/header_dropdown_options.inc.php');
                echo '</div>';
              } else{
                include ('includes/header_buttons.inc.php');
              }
            ?>
          </div>
        </div>
      </div>
    </header>
    <div id = "mainContentWrapper">
    <?php 
      if($session_master->isLoggedin()){
        include 'includes/settings.inc.php';
      } else{
        include 'includes/register.inc.php';
        include 'includes/login.inc.php';
      }
      include 'includes/overlay.inc.php';
    ?>
    <script src="js/functions.js"></script>
    <?php
      if(isset($_GET['error'])&&$_GET['error']=='login'){?>
      <script src="js/onload/loginerror.js"></script>
    <?php
      }
      if(isset($_GET['username'])||isset($_GET['province'])||isset($_GET['email'])){?>
      <script src="js/onload/registererror.js"></script>
    <?php
      }
    ?>
    
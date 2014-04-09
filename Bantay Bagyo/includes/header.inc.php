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
	<div id = "searchbox">
	<input id="pac_input" class="controls" type="text" placeholder="Search Box">
	</div>
        <div id = "form-wrapper">
	       <div id="links">
            <?php
              if($session_master->isLoggedin()){
                include ('includes/header_options_button.inc.php');
                include ('includes/header_dropdown_options.inc.php');
              } else{
                include ('includes/header_buttons.inc.php');
              }
            ?>
          </div>
        </div>
      </div>
    </header>
    
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
      include('includes/mainpage_typhoon_details.inc.php');
      include('includes/mainpage_legend.inc.php');
      include('includes/mainpage_map.inc.php');
    ?>
</div>
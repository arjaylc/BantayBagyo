<div id = "mainContentWrapper">
    <?php
      require_once('includes/session_master.inc.php');
      $session_master = new SessionMaster();
      if($session_master->isLoggedin()){
        require_once 'includes/change_password_form.inc.php';
        require_once 'includes/settings.inc.php';
        require_once 'includes/add_province_form.inc.php';
        require_once 'includes/change_province_form.inc.php';
      } else{
        require_once 'includes/register.inc.php';
        require_once 'includes/login.inc.php';
        require_once 'includes/overlay.inc.php';
      }
    ?>
    <script src="js/functions.js"></script>
    <?php
      if(isset($_GET['main_province'])){?>
        <script>
        $(window).load(function(){
          toggleMainProvince();
        });
      </script>
    <?php
      }
      else if(isset($_GET['province'])||isset($_GET['user_province'])){?>
      <script>
        $(window).load(function(){
          toggleProvince();
        });
      </script>
    <?php
      } else if(isset($_GET['password'])&&($_GET['password']=='nomatch'||$_GET['password']=='wrong')){?>
       <script>
        $(window).load(function(){
          toggleSettings(2);
        });
      </script>
    <?php
      } else if(isset($_GET['email'])){?>
      <script>
        $(window).load(function(){
          toggleSettings(1);
        });
      </script>
    <?php
      }
      if((isset($_GET['error'])&&$_GET['error']=='login')||(isset($_GET['password'])&&$_GET['password']=='updated')){?>
      <script src="js/onload/loginerror.js"></script>
    <?php
      }
      else if(isset($_GET['username'])||isset($_GET['province'])||isset($_GET['email'])||isset($_GET['error'])||isset($_GET['password'])){?>
      <script src="js/onload/registererror.js"></script>
    <?php
      }
      require_once('includes/mainpage_typhoon_details.inc.php');
      require_once('includes/mainpage_legend.inc.php');
      require_once('includes/mainpage_map.inc.php');
    ?>
</div>
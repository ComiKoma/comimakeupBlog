<?php
  session_start();
  ob_start();
  require_once "config/konekcija.php";
  if(!isset($_POST['prijavljen'])) {
    include "views/fixed/header.php";
  }


  if(isset($_GET['page'])){
    if(file_exists("views/pages/".$_GET['page'].".php")) {
      include "views/pages/".$_GET['page'].".php";
      $open = fopen(LOG_FAJL, "a");
      if($open){
        $date = date('d-m-Y H:i:s');
        $page = $_GET['page'];
        fwrite($open, "{$page} {$date}\t\n");
        fclose($open);
      }
    } else if (file_exists("views/partials/".$_GET['page'].".php")){
      include "views/partials/".$_GET['page'].".php";
      $open = fopen(LOG_FAJL, "a");
      if($open){
        $date = date('d-m-Y H:i:s');
        $page = $_GET['page'];
        fwrite($open, "{$page} {$date}\t\n");
        fclose($open);}
    }
    else {
      var_dump($_GET['page']);
    }
  } else {
    include "views/pages/pocetna.php";
    $open = fopen(LOG_FAJL, "a");
      if($open){
        $date = date('d-m-Y H:i:s');
        fwrite($open, "pocetna {$date}\t\n");
        fclose($open);
      }
  }
  include "views/fixed/footer.php";
?>
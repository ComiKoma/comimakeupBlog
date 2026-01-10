
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ComiMakeup Blog</title>
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="icon" type="image/png" href="img/icon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo:200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="?page=pocetna">comimakeupblog</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb"
      aria-expanded="true">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navb" class="navbar-collapse collapse hide">
      <ul class="navbar-nav">
        <?php
        include_once "models/navigacija/navFunkcije.php";
        $nav = dohvatiNavigaciju();
        if(isset($_SESSION['admin'])):
        if($_SESSION['admin']):
        foreach($nav as $n):
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=<?=$n->hrefLinka?>"><?=$n->nazivLinka?></a>
        </li>
        <?php
        endforeach;
        else:
        foreach($nav as $n):
          if(!$n->admin):
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=<?=$n->hrefLinka?>"><?=$n->nazivLinka?></a>
        </li>
        <?php
        endif;
        endforeach;
        endif;
        else:
        foreach($nav as $n):
          if(!$n->admin):
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=<?=$n->hrefLinka?>"><?=$n->nazivLinka?></a>
        </li>
        <?php
        endif;
        endforeach;
        endif;
          ?>
        </ul>

      <ul class="nav navbar-nav ml-auto">
          <?php
            include_once "models/autentifikacija/prijavljivanje.php";
            if(isset($_SESSION['id'])):
              $korisnik = dohvatiKorisnikaPoId($_SESSION['id']);
              //echo $korisnik->username;
          ?>
            
            <li class="liProfilna"><a href="#" class="liProfilna"><img class="img-fluid rounded-circle mx-2 userLogin" alt="profilna slika" src="<?= $korisnik->hrefKorSlike ?>"/></a></li>
            <li><a href="?page=izmena" class="nav-link"><?= $korisnik->korisnickoIme ?> </a></li>
            <li><a href="models/autentifikacija/odjavljivanje.php" class="nav-link"> Odjava</a></li>
            <?php
            endif;
          ?>

          <?php if(!isset($_SESSION['id'])): ?>

          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#modalLRForm"><span class="fas fa-sign-in-alt"></span> Prijava</a>
          </li>

          <?php
            endif;
          ?>
        <!-- <li class="nav-item">
                      <a class="nav-link" href="#"><span class="fas fa-user"></span> Sign Up</a>
                    </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#modalLRForm"><span class="fas fa-sign-in-alt"></span> Prijava</a>
        </li> -->
        
      </ul>
    </div>
  </nav>
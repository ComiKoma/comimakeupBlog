33 <div class="container">
<div class="row">
<div class="col-md-12 my-2">

<?php
    include_once "models/autentifikacija/prijavljivanje.php";
    include_once "models/korisnik/izmenaKorisnika.php";
    if(isset($_SESSION['id'])){
        $korisnik = dohvatiKorisnikaPoId($_SESSION['id']);

        if(isset($_POST['promenaProfilne'])){
          
          $target_dir = "assets/img/user/";
            $target_file = $target_dir . basename($_FILES["novaProfilna"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            $check = getimagesize($_FILES["novaProfilna"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($_FILES["novaProfilna"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";

            } else {
                if (move_uploaded_file($_FILES["novaProfilna"]["tmp_name"], $target_file)) {
                    promenaProfilne($target_file, $_SESSION['id']);
                    echo "The file ". basename( $_FILES["novaProfilna"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        if(isset($_POST['promenaKorIme'])){
            $novoKorIme = $_POST['novoKorIme'];
            $staroKorIme = $korisnik->korisnickoIme;
            $greska = false;

            if($novoKorIme == $staroKorIme){
                $greska = true;
                echo "Isti su";
            }else if(!validate_username($novoKorIme)){
                $greska = true;
                echo "Los format";
            }

            if(!$greska){
                promenaKorImena($novoKorIme, $_SESSION['id']);
                echo "Korisnicko ime promenjeno!";
            }
        }

        if(isset($_POST['promenaMaila'])){
            $noviMail = $_POST['noviMail'];
            $stariMail = $korisnik->email;
            $greska = false;

            if($noviMail == $stariMail){
                $greska = true;
                echo "Isti su";
            }else if(!validate_email($noviMail)){
                $greska = true;
                echo "Los format";
            }

            if(!$greska){
                update_user_email_by_id($noviMail, $_SESSION['id']);
                echo "Mail promenjen!";
            }
        }
        if(isset($_POST['promenaLozinke'])){
            $novaLozinka = $_POST['novaLozinka'];
            $staraLozinka = $korisnik->pass;
            $greska = false;

            if($novaLozinka == $staraLozinka){
                $greska = true;
                echo "Isti su";
            }else if(!validate_pass($novaLozinka)){
                $greska = true;
                echo "Los format";
            }

            if(!$greska){
                update_user_pass_by_id(md5($novaLozinka), $_SESSION['id']);
                echo "Lozinka promenjena!";
            }
        }
    }else{
        header("Location: http://comimakeupblog.ml/index.php?page=pocetna");
    }
    
 ?>

<div class="card text-center">
<form action="#" method="POST" enctype="multipart/form-data">
<img class=" img-thumbnail profil my-3" src="<?= $korisnik->hrefKorSlike ?>" alt="Card image cap">
  <div class="form-group row">
  
    <label for="korisnickaSlika" class="col-sm-2 col-form-label">Profilna slika</label>
    <div class="col-md-8 col-sm-8">
      <input name="novaProfilna" type="file" class="form-control-file" id="korisnickaSlika">
    </div>
    <input name="promenaProfilne" type="hidden"/>
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
</form>
<form action="#" method="POST">
  <div class="form-group row">
    <label for="korisnickoIme" class="col-sm-2 col-form-label">Korisničko ime</label>
    <div class="col-md-8 col-sm-8">
      <input name="novoKorIme" type="text" class="form-control" id="korisnickoIme" placeholder="<?= $korisnik->korisnickoIme ?>">
    </div>
    <input name="promenaKorIme" type="hidden"/>
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
</form>
<form action="#" method="POST">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-md-8 col-sm-8">
      <input name="noviMail" type="text" class="form-control" id="staticEmail" placeholder="<?= $korisnik->email ?>">
    </div>
    <input name="promenaMaila" type="hidden"/>
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
</form>
<form action="#" method="POST">
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-md-8 col-sm-8">
      <input name="novaLozinka" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
      <input name="promenaLozinke" type="hidden"/>
      <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
</form>

</div>
</div>
</div>
</div>
<!-- <h5 class="card-header">Izmenite svoj profil <?= $korisnik->korisnickoIme ?></h5> -->
  


  <!-- <form>
  <div class="card-body">
    
    <img class="card-img-bottom img-thumbnail profil my-3" src="<?= $korisnik->hrefKorSlike ?>" alt="Card image cap">
    <h5 class="card-title">Nova profilna slika:</h5>
    <p class="card-text">
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
    </p>
    
  </div>
</form> -->

  <!-- <form>
  <div class="card-body">
    <h5 class="card-title">Novi mejl:</h5>
    <p class="card-text">
    <input type="email" class="form-control" id="email">
    </p>
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
  </form>
  <form>
  <div class="card-body">
    <h5 class="card-title">Novi mejl:</h5>
    <p class="card-text">
    <input type="email" class="form-control" id="email">
    </p>
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
  </form>
  <div class="card-body">
    <h5 class="card-title">Nova lozinka:</h5>
    <form action="/action_page.php">
    <p class="card-text">
    <input type="text" class="form-control" id="pwd">
    </p>
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
    </form>
  </div>
</div> -->
<!-- <form>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-md-8 col-sm-8">
      <input type="text" class="form-control" id="staticEmail" placeholder="">
    </div>
    <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Lozinka</label>
    <div class="col-md-8 col-sm-8">
      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
      <div class="col-md-2 col-sm-8"><button type="submit" class="btn btn-outline-secondary">Sačuvaj</button></div>
  </div>
</form> -->
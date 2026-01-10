<?php
include_once "models/autentifikacija/prijavljivanje.php";
include_once "models/korisnik/trenutnoUlogovani.php";

if(isset($_POST['prijavljen'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $korisnik = dohvatiKorisnikaPoMailu($mail);
    if($korisnik) {
        if(md5($pass) == $korisnik->pass){
            $_SESSION['id'] = $korisnik->id;
            $_SESSION['email'] = $korisnik->email;
            $_SESSION['pic'] = $korisnik->profile_image;
            $_SESSION['username'] = $korisnik->username;
            $_SESSION['admin'] = $korisnik->admin;
            setujTrenutnoUlogovanog($_SESSION['id']);
            header("Location: http://comimakeupblog.ml/index.php?page=pocetna"); /* Redirect browser */
            exit();
        }else{
          echo "<script>alert('Netačna lozinka!')</script>";
        }
    } else {
      echo "<script>alert('Netačni email i lozinka!')</script>";
    }
}
 if(isset($_POST['registrovanje'])){
  echo "USO";
  $regUsername = $_POST['regUsername'];
  $regMail = $_POST['regMail'];
  $regPass = $_POST['regPass'];
  $regPass1 = $_POST['regPass1'];

  $ok = true;
  if(isset($regUsername) && isset($regMail) && isset($regPass) && isset($regPass1)){
      if(!validate_username($regUsername)){
          $ok = false;
          
          echo "LOSusername";
      }
      if(!validate_email($regMail)){
          $ok = false;
          
          echo "LOSemail";
      }
      if(!validate_pass($regPass)){
          $ok = false;
          
          echo "LOSpass";
      }
      if($regPass1 != $regPass){
          $ok = false;
          
          echo "LOSpassNIJEisti";
      }

      if(dohvatiKorisnikaPoId($regUsername) || dohvatiKorisnikaPoMailu($regMail)) {
          $ok = false;
          echo "Vec postoji korisnik sa tim mejlom/usernameom";
      }

  } else {
      echo "NISTE UNELi SVE PODATKE";
  }

  if($ok) {

      dodajKorisnika($regUsername, $regMail, $regPass);
      $korisnik = dohvatiKorisnikaPoMailu($regMail);
      echo "OK+JE_TRUE";
      $_SESSION['id'] = $korisnik->id;
      header("Location: http://comimakeupblog.ml/index.php?page=pocetna"); /* Redirect browser */
  }
}
?>

<footer class="container-fluid mt-3 page-footer" id="futer">
        <div class="row text-center">
                <div class="col-md-3">
                        <hr class="light">
                        <h5><a class="nav-link" href="?page=pocetna">Početna</a></h5>
                        <hr class="light">
                    </div>
                    <div class="col-md-3">
                        <hr class="light">
                        <h5><a class="nav-link" href="?page=autor">Autor</a></h5>
                        <hr class="light"> 
                    </div>
                     <div class="col-md-3">
                        <hr class="light">
                        <h5><a class="nav-link" href="sitemap.xml">SiteMap</a></h5>
                        <hr class="light">
                    </div>
                    <div class="col-md-3">
                        <hr class="light">
                        <h5><a class="nav-link" href="dokumentacija.pdf">Dokumentacija</a></h5>
                        <hr class="light">
                    </div>
                    <div class="col-12">
                        <hr class="light">
                        <h5>&copy www.comimakeupblog.com</h5>
                    </div>
        </div>
</footer>
<!-- Footer -->
        

        <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog cascading-modal" role="document">
                  <!--Content-->
                  <div class="modal-content">
              
                    <!--Modal cascading tabs-->
                    <div class="modal-c-tabs">
              
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs md-tabs tabs-2" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                            Prijava</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                            Registracija</a>
                        </li>
                      </ul>
              
                      <!-- Tab panels -->
                      <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
              
                          <!--Body-->
                          <form action="#" method="POST">
                          <div class="modal-body mb-1">
                            <div class="md-form form-sm mb-4">
                              <i class="fas fa-envelope prefix"></i>
                              <input name="mail" type="email" id="modalLRInput10" class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput10">Tvoj email</label>
                            </div>
              
                            <div class="md-form form-sm mb-4">
                              <i class="fas fa-lock prefix"></i>
                              <input name="pass" type="password" id="modalLRInput11" class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput11">Tvoja lozinka</label>
                            </div>
                            <div class="text-center mt-2">
                              <input type="hidden" name="prijavljen">
                              <button class="btn btn-outline-secondary">Prijavi se <i class="fas fa-sign-in ml-1"></i></button>
                            </div>
                          </div>
                        </form>
                          <!--Footer-->
                          <div class="modal-footer">
                            <!-- <div class="options text-center text-md-right mt-1">
                              <p>Zaboravio/la si <a href="#" class="crveni-text">lozinku?</a></p>
                            </div> -->
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zatvori</button>
                          </div>
              
                        </div>
                        <!--/.Panel 7-->
              
                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">
              
                          <!--Body-->
                          <form action="#" method="POST">
                          <div class="modal-body">
                            <div class="md-form form-sm mb-4">
                              <i class="fas fa-envelope prefix"></i>
                              <input name="regMail" type="email" id="modalLRInput12" class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput12">Tvoj email</label>
                            </div>
              
                            <div class="md-form form-sm mb-4">
                              <i class="fas fa-lock prefix"></i>
                              <input name="regPass" type="password" id="modalLRInput13" class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput13">Tvoja lozinka</label>
                            </div>
              
                            <div class="md-form form-sm mb-4">
                              <i class="fas fa-lock prefix"></i>
                              <input name="regPass1" type="password" id="modalLRInput14" class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput14">Ponovi lozinku</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input name="regUsername" type="text" id="modalLRInput15" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput14">Tvoje korisničko ime</label>
                            </div>
              
                            <div class="text-center form-sm mt-2">
                              <input type="hidden" name="registrovanje">
                              <button class="btn btn-outline-secondary">Registruj se <i class="fas fa-sign-in ml-1"></i></button>
                            </div>
              
                          </div>
                        </form>
                          <!--Footer-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zatvori</button>
                          </div>
                        </div>
                        <!--/.Panel 8-->
                      </div>
              
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
      </footer>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
      </script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
      <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
    
    </html>
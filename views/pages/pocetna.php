<div class="container-fluid">
    <div class="row">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="assets/img/1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/4.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <div class="content container my-5">
    <div id="row">
      <div class="col-12">
        <div class="page-header">
          <h1>Makeup</h1>
          <p>
          Blog o kozmetici i ostalim sitnicama: šminka, nokti, nega kože, nega kose, parfemi, modni dodaci. Recenzije, testovi i opisi proizvoda, saveti i preporuke u vezi lepote, odgovori na pitanja čitalaca, beauty trendovi i novi proizvodi na našem tržištu, novosti iz sveta šminke i nege, informacije o novim kolekcijama najpoznatijih, ali i onih manje poznatih domaćih i stranih proizvođača kozmetike.
          </p>
          <a href="?page=blog"><button type="button" class="btn btn-outline-secondary">Pogledajte sve
              postove</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="card-deck">
      <?php
        include "models/postovi/postoviFunkcije.php";
        $poslednjaTri = dohvatiPoslednjaTriPosta();

        foreach($poslednjaTri as $p):
            $fit = "";
            $deloviTeksta = explode(" ", $p->tekstPosta);
            if(count($deloviTeksta)<25){
                for($j=0; $j<20; $j++){
                    $fit = $fit.$deloviTeksta[$j]." ";
                }
                $fit = $fit."...<a href='?page=getone&id=".$p->idPosta."'>pročitaj više</a>";
            }else{
                for($j=0; $j<25; $j++){
                    $fit = $fit.$deloviTeksta[$j]." ";
                }
                $fit = $fit."...<a href='?page=getone&id=".$p->idPosta."'>pročitaj više</a>";}
        ?>
        <div class="card my-3">
                <img class="card-img-top" src="<?=$p->hrefSlike?>" alt="<?=$p->altSlike?>">
                <div class="card-body">
                    <a href="?page=getone&id=<?= $p->idPosta?>"><h5 class="card-title"><?=$p->naslovPosta?></h5></a>
                    <p class="card-text"><?=$fit?></p>
                    <p class="card-text"><small class="text-muted"><?=$p->datPosta?></small></p>
                </div>
        </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  </div>
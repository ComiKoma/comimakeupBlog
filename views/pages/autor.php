<div class="content container">
    <div class="row">
            <div class="card my-3">
                    <div class="row no-gutters">
                    <?php
                        include "models/functions.php";
                        $autor = dohvatiSveOAutoru();

                        foreach($autor as $a):
                    ?>
                      <div class="col-md-4">
                        <img src="<?=$a->hrefSlike?>" class="card-img" alt="<?=$a->altSlike?>">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body my-3">
                                <h5 class="card-title"><?=$a->naslov?></h5>
                                <p>
                                 <?=$a->tekst?>
                                </p>
                                <div class="row text-center padding">
                                <div class="col-md-4 social padding"><a href="https://www.instagram.com/makeup.comikoma/"><i class="fab fa-instagram"></i></a></div>
                                <div class="col-md-4 social padding"><a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a></div>
                                <div class="col-md-4 social padding"><a href="https://www.tumblr.com"><i class="fab fa-tumblr"></i></a></div>
                                </div>
                                <div class="row text-center">
                                <a class="btn btn-outline-secondary" href="models/export/word.php" style="width:100%"><i class="fa fa-download"></i>Preuzmi portfolio</a>
                                </div>
                          </div>
                      </div>
                    <?php
                        endforeach;
                    ?>
                    </div>
            </div>
    </div>
</div>
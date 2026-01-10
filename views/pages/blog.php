<div class="content container-fluid">
      <div class="row">
          <div class="col-md-8 col-sm-12">
            <div class="card-columns" id="postovi">
          <?php
                include "models/postovi/paginacijaFunkcije.php";

                // $limit =  isset($_GET['limit'])? $_GET['limit'] : 0;
                $postovi = sviPostoviISLikeZaBlog(0);

                foreach($postovi as $p):
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
                          <p class="card-text"><?= $fit ?></p>
                          <p class="card-text"><small class="text-muted"><?=$p->datPosta?></small></p>
                        </div>
                </div>
                <?php
                endforeach;
                ?>
          </div>
          <nav aria-label="...">
                  <ul class="pagination pagination-sm" id="pagination">
                  <?php
                        $brojPostova = dohvatiZaPaginaciju();
                        for($i = 1; $i <= $brojPostova; $i++):
                      ?>
                    <li class="page-item">
                      <a class="page-link post-pagination" href="#" data-page="<?= $i ?>"><?= $i ?></a>
                    </li>

                    <?php endfor; ?>
                  </ul>
                </nav>
            </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
					<aside>
						<div class="sidebar-widget my-3">
							<h3 class="sidebar-title">Pretraga postova</h3>
							<div class="widget-container">
								<form>
									<input id="pretraga" type="text" placeholder="Pretraga" class="form-control"/> 
								</form>
							</div>
						</div>
						<div class="sidebar-widget my-3">
							<h3 class="sidebar-title">Prikaz postova po datumu</h3>
							<div class="widget-container">
								<form>
									<input id="datum" type="date" placeholder="Odaberite datum" class="form-control"/> 
								</form>
							</div>
						</div>
						<div class="sidebar-widget my-3">
							<h3 class="sidebar-title">Sortiranje postova</h3>
							<div class="list-group">
              <select id="sortiranje" class="btn btn-outline-secondary">
              <option value="0">Izaberite</option>
                            <?php

                              $options = [
                                [
                                  "value" => 1,
                                  "text"=> "Nazivu - Rastuce"
                                ],
                                [
                                  "value" => 2,
                                  "text" => "Nazivu - Opadajuce"
                                ],
                                [
                                  "value" => 3,
                                  "text" => "Datumu kreiranja - Rastuce"
                                ],
                                [
                                  "value" => 4,
                                  "text" => "Datumu kreiranja - Opadajuce"
                                ]
                              ];

                              foreach($options as $option):
                            ?>
                            
                            <option value="<?= $option['value'] ?>">
                                <?= $option['text'] ?>
                            </option>

                            <?php endforeach; ?>
                              </select>
                                
              </div>
            </div>
            <a class="btn btn-outline-secondary" href="models/export/excel.php" style="width:100%"><i class="fa fa-download"></i>Preuzmi listu postova u excelu</a>
					</aside>
				</div>
      </div>
  </div>
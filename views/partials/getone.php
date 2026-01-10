<div class="content container">
    <div class="row">
    <?php
        include "models/postovi/postoviFunkcije.php";

        $post = dohvatiJedanPost($_GET['id']);
        if($post == null)
        {
            header("Location: index.php");
        }
    ?>
        <div class="col-12">
            <div class="card my-3">
                <div class="row no-gutters">
                    <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><?=$post->naslovPosta?></h5>
                        <p class="card-text"><?=$post->tekstPosta?></p>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <img src="<?=$post->hrefSlike?>" class="card-img" alt="<?=$post->altSlike?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
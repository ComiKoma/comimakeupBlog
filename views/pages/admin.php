<?php
if(isset($_SESSION['admin']) && $_SESSION['admin']):
    
    include_once "models/admin/functions.php";
    include_once "models/navigacija/navFunkcije.php";
    include_once "models/postovi/functions.php";
    include_once "models/postovi/postoviFunkcije.php";
    include_once "models/korisnik/trenutnoUlogovani.php";
    $menuitems = dohvatiNavigaciju();
    $menuCount = pristupPoslednjemDanu();
		$procenti = procenatPosete();
		if(isset($_POST['newpost'])) {
			$timestamp = time();
			$target_dir = "assets/img/";
			$target_file = $target_dir . $timestamp . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
							$uploadOk = 1;
					} else {
							$uploadOk = 0;
					}

			// Check if file already exists
			if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					} else {
							echo "Sorry, there was an error uploading your file.";
					}
			}

			if($uploadOk) {
				$newpost = newPost($_POST['title'], $_POST['text']);
				if($newpost) {
					echo "Post je uspesno postavljen!";
				} else {
					echo "Post nije uspesno postavljen!";
					echo $newpost;
				}
			} else {
				echo "Post nije uspesno postavljen";
			}
		}
		if(isset($_POST['newimage'])) {
			$timestamp = time();
			$target_dir = "assets/img/";
			$target_file = $target_dir . $timestamp . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
							$uploadOk = 1;
					} else {
							$uploadOk = 0;
					}

			// Check if file already exists
			if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $newimage = promenaSlikePosta($target_file, $_POST['idPosta']);
                    } else {
							echo "Sorry, there was an error uploading your file.";
					}
			}

			if($uploadOk) {
				
				if($newimage) {
                    echo "Slika je dodata!";
                    $newimage = promenaSlikePosta($target_file, $_POST['idPosta']);
				} else {
					echo "Slika nije dodata!";
				}
			} else {
				echo "Slika nije dodata!";
			}
		}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        Broj trenutno ulogovanih korisnika: <?php $broj = brojTrenutnoUlogovanih();
        foreach($broj as $b):
        ?><?= $b ?><?php endforeach; ?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Naziv Stranice</th>
                <th scope="col">Pristup stranicama u %</th>
                <th scope="col">Pristup u poslednjih 24h</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">0</th>
                    <td>404</td>
                    <td><?= $procenti->notfound; ?></td>
                    <td><?= $menuCount->notfound; ?></td>
                </tr>
                <?php
                    foreach($menuitems as $item):
                ?>
                <tr>
                <th scope="row"><?= $item->idLinka; ?></th>
                    <td><?= $item->nazivLinka; ?></td>
                    <td><?= $procenti->{$item->hrefLinka} ?></td>
                    <td><?= $menuCount->{$item->hrefLinka}; ?></td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
</div>
</div>
<div class="row">
    <div class="col-md-12">
			<h2>Novi post</h2>
		<form action="index.php?page=admin" method="POST" enctype="multipart/form-data">
		<div class="form-group"> 
                    <label for="Title">Naziv</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group"> 
                    <label for="text">Tekst</label>
                    <input type="textbox" name="text" class="form-control" id="text">
                </div>
                <div class="form-group">
                    <label for="thumbnail">Slika</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <input type="hidden" name="newpost"/>
                <button type="submit" class="btn btn-outline-secondary">Unesi novi post</button>
            </form>
		</div>
</div>
<div class="row">
	<div class="col-md-12">
			<table class="table">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Naslov</th>
					<th scope="col">Tekst</th>
					<th scope="col">Dodaj u slike</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$postovi = dohvatiSvePostoveZaAdmin();
					foreach($postovi as $post):
				?>
				<tr>
					<th scope="row"><?= $post->idPosta ?></th>
					<td><?= $post->naslovPosta ?></td>
					<td><?= $post->tekstPosta ?></td>
					<td>
					<form action="index.php?page=admin&id=<?= $post->idPosta ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input type="file" name="fileToUpload" id="fileToUpload">
							<input type="hidden" name="newimage"/>
						</div>
						<div class="form-group">
						<button type="submit" class="btn btn-outline-secondary">Dodaj u galeriju</button>
						</div>
					</form>
					</td>
				</tr>
				<?php
					endforeach;
				?>
			</tbody>
		</table>							
	</div>
</div>
</div>
<?php
else:
?>
<div class="alert alert-danger" role="alert">Nemate pristup ovoj stranici!</div>
<?php
endif;
?>
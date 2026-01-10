<?php

if(isset($_POST['datum'])){
    include "../../config/konekcija.php";
    include "postoviFunkcije.php";

    $datum = "%".strtolower($_POST['datum'])."%";
    $upit = "SELECT * FROM postovi p INNER JOIN slike s ON p.slikaPostaID=s.idSlike WHERE p.datPosta LIKE :datum";
    $rezultat = $conn->prepare($upit);
    $rezultat->bindParam(":datum", $datum);
    $rezultat->execute();

   

    $proizvodi = $rezultat->fetchAll();
    echo json_encode($proizvodi);

} else {
    http_response_code(400);
}
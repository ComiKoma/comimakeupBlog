<?php

if(isset($_POST['naziv'])){
    include "../../config/konekcija.php";
    include "postoviFunkcije.php";

    $naziv = "%".strtolower($_POST['naziv'])."%";
    $upit = "SELECT * FROM postovi p INNER JOIN slike s ON p.slikaPostaID=s.idSlike WHERE LOWER(p.naslovPosta) LIKE :naziv";
    $rezultat = $conn->prepare($upit);
    $rezultat->bindParam(":naziv", $naziv);
    $rezultat->execute();

   

    $proizvodi = $rezultat->fetchAll();
    echo json_encode($proizvodi);

} else {
    http_response_code(400);
}
<?php
header("Content-Type: application/json");

if(isset($_POST['sort'])){
    $sort = $_POST['sort'];

    include "../../config/konekcija.php";
    include "postoviFunkcije.php";
    
    $upit = "SELECT * FROM postovi p INNER JOIN slike s ON p.slikaPostaID=s.idSlike";

    switch($sort){
        case 0:
            break;
        case 1:
            $upit .= " ORDER BY p.naslovPosta ASC";
            break;
        case 2:
            $upit .= " ORDER BY p.naslovPosta DESC";
            break;
        case 3:
            $upit .= " ORDER BY p.datPosta ASC";
            break;
        case 4:
            $upit .= " ORDER BY p.datPosta DESC";
            break;
    }

    $rezultat = executeQuery($upit);
    echo json_encode($rezultat);
} else {
    http_response_code(400); // Bad request
    echo json_encode(["greska"=> "Niste poslali sort"]);
}
<?php

header("Content-Type: application/json");

if(isset($_POST['strana'])){
    $strana = $_POST['strana'];
    include "../../config/konekcija.php";
    include "paginacijaFunkcije.php";

    $postovi = sviPostoviISLikeZaBlog($strana);
    $brojPostova = dohvatiZaPaginaciju();

    echo json_encode([
        "postovi" => $postovi,
        "brojPostova" => $brojPostova
    ]);
}
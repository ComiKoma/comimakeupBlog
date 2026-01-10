<?php

function dohvatiSlikeZaSlajder(){
    $slike = executeQuery("SELECT * FROM slike LIMIT 3");

    return $slike;
}
    
function dohvatiSveOAutoru(){
    $autor = executeQuery("SELECT * FROM autor a INNER JOIN slike s ON a.slikaAutorID=s.idSlike");
    return $autor;
}

function oAutoru(){
    return executeQuery("SELECT * FROM autor");
}
?>
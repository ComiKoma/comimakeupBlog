<?php
function setujTrenutnoUlogovanog($idKor){
    global $conn;

    try {
        $q = $conn->prepare("UPDATE korisnici SET LastTimeSeen = NOW() WHERE id = ?");
        $q->execute([$idKor]);

        return true;

    } catch(PDOException $ex){
        echo $ex;
        return false;
    }
}

function brojTrenutnoUlogovanih(){
    $q = executeQueryOneRow("SELECT COUNT(*) FROM korisnici WHERE LastTimeSeen > DATE_SUB(NOW(), INTERVAL 1 MINUTE)");
    return $q;
}
?>
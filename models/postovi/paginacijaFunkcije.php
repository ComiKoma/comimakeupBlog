<?php
define("postOffset", 6);

function dohvatiZaPaginaciju(){
    $result = executeQueryOneRow("SELECT COUNT(*) AS brojPostova FROM postovi");
    $brojPostova = $result->brojPostova;

    return ceil($brojPostova / postOffset);
}

function sviPostoviISLikeZaBlog($limit){
    global $conn;

    $select = $conn->prepare("SELECT *, p.idPosta AS postId FROM postovi p INNER JOIN slike s ON p.slikaPostaID=s.idSlike ORDER BY datPosta DESC LIMIT :limit, :postOffset");
    $limit = $limit * postOffset;
    $select->bindParam(":limit", $limit,PDO::PARAM_INT);

    $offset = postOffset;
    $select->bindParam(":postOffset", $offset, PDO::PARAM_INT);

    $select->execute();
    return $select->fetchAll();
}
?>
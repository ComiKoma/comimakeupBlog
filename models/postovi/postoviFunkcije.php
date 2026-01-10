<?php
function dohvatiPoslednjaTriPosta(){
    $postovi = executeQuery("SELECT * FROM postovi p INNER JOIN slike s ON p.slikaPostaID=s.idSlike ORDER BY datPosta DESC LIMIT 3");
    return $postovi;
}

function dohvatiJedanPost($postId){
    global $conn;
    try {
        $select = $conn->prepare("SELECT * FROM postovi p INNER JOIN slike s ON p.slikaPostaID=s.idSlike WHERE p.idPosta = ?");
        $select->execute([$postId]);

        $post = $select->fetch();
        return $post;
    } catch(PDOException $ex){
        return null;
    }
}

function dohvatiSvePostove(){
    $postovi = executeQuery("SELECT * FROM postovi");
    return $postovi;
}

function dohvatiSvePostoveZaAdmin(){
    $postovi = executeQuery("SELECT * FROM postovi p left OUTER JOIN slike s ON p.slikaPostaID=s.idSlike");
    return $postovi;
}

function promenaSlikePosta($src, $id){
    global $conn;

    try {
        $update_user = $conn->prepare("UPDATE slike s INNER JOIN postovi p ON p.idPosta=s.idPosta SET s.hrefSlike = ? WHERE p.slikaPostaID = ?");
               
        $update_user->execute([$src, $id]);

        return true;

    } catch(PDOException $ex){
        echo $ex;
        return false;
    }
}
?>
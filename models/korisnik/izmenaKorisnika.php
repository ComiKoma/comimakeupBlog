<?php
function promenaKorImena($korIme, $id){
    global $conn;

    try {
        $update_user = $conn->prepare("UPDATE korisnici SET korisnickoIme = ? WHERE id = ?");
               
        $update_user->execute([$korIme, $id]);

        return true;

    } catch(PDOException $ex){
        echo $ex;
        return false;
    }
}

function promenaProfilne($src, $id){
    global $conn;

    try {
        $update_user = $conn->prepare("UPDATE korisnici k INNER JOIN korisnickeslike ks ON k.korisnikMalaSlikaId=ks.idKorSlike SET ks.hrefKorSlike = ? WHERE k.id = ?");
               
        $update_user->execute([$src, $id]);

        return true;

    } catch(PDOException $ex){
        echo $ex;
        return false;
    }
}

function update_user_email_by_id($email, $id){
    global $conn;

    try {
        $update_user = $conn->prepare("UPDATE korisnici SET email = ? WHERE id = ?");
               
        $update_user->execute([$email, $id]);

        return true;

    } catch(PDOException $ex){
        echo $ex;
        return false;
    }
}

function update_user_pass_by_id($pass, $id){
    global $conn;

    try {
        $update_user = $conn->prepare("UPDATE korisnici SET pass = ? WHERE id = ?");
               
        $update_user->execute([$pass, $id]);

        return true;

    } catch(PDOException $ex){
        echo $ex;
        return false;
    }
}
?>
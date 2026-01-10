<?php

function dohvatiKorisnikaPoMailu($mail){
    global $conn;

        try {
            $dohvatiKorisnika = $conn->prepare("SELECT * FROM korisnici k INNER JOIN korisnickeslike ks ON k.korisnikMalaSlikaId=ks.idKorSlike WHERE email = ?");
            $dohvatiKorisnika->execute([$mail]);
            
            $korisnik= $dohvatiKorisnika->fetch();
    
            return $korisnik;
    
        } catch(PDOException $ex){
            return null;
        }
}

function dohvatiKorisnikaPoId($id){
    global $conn;

        try {
            $dohvatiKorisnika = $conn->prepare("SELECT * FROM korisnici k INNER JOIN korisnickeslike ks ON k.korisnikMalaSlikaId=ks.idKorSlike WHERE id = ?");
            $dohvatiKorisnika->execute([$id]);
            
            $korisnik= $dohvatiKorisnika->fetch();
    
            return $korisnik;
    
        } catch(PDOException $ex){
            return null;
        }
}

function dohvatiKorisnikaPoKorisnickomImenu($korIme){
    global $conn;

    try {
        $dohvatiKorisnika = $conn->prepare("SELECT * FROM korisnici WHERE korisnickoIme = ?");
        $dohvatiKorisnika->execute([$korIme]);
        
        $user= $dohvatiKorisnika->fetch();

        return $user;

    } catch(PDOException $ex){
        return null;
    }
}

/******************************* REGISTROVANJE *************************************/

function dodajKorisnika($username, $email, $pass){
    global $conn;

    try {
        $dodajKorisnika = $conn->prepare("INSERT INTO korisnici (korisnickoIme, email, pass, korisnikMalaSlikaId) VALUES(?, ?, ?, 1)");
               
        $dodajKorisnika->execute([$username, $email, md5($pass)]);

        return "UPISAN JE U BAZU !";

    } catch(PDOException $ex){
        echo $ex;
        return null;
    }
}





// Regularni izrazi

function validate_username($regUsername){
    if( !preg_match("/^[A-z\d_]{2,20}$/", $regUsername))
    {
        return false;
    }	
    return true;

}

function validate_email($regMail){
    if( !preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $regMail))
    {
        return false;
    }	
    return true;
}

function validate_pass($regPass){
    if( !preg_match("/^(?=.*\d).{4,32}$/", $regPass))
    {
         return false;
    }	
    return true;
}
?>
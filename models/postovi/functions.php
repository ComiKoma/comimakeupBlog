<?php 
function newPost($title, $text) {
    global $conn;
    try {
        $select_post = $conn->prepare("INSERT INTO postovi (naslovPosta, tekstPosta, datPosta) VALUES (?,?, CURRENT_DATE())");
        $select_post->execute([$title, $text]);
        return true;
    } catch (PDOException $ex) {
        return $ex;
        
    }
}

function addToGallery($id, $image) {
    try {
        $priprema = $conn->prepare("INSERT INTO slike (hrefSlike, idPosta)
        VALUES (?,?)");
        $priprema->execute([$image, $id]);
        return true;
    } catch (PDOException $ex) {
           return false;
    }

}

?>
<?php

include 'connection.php';

// dohvatanje svih komentara jedne slike po photoId
function getPhotoComments($db, $photoId){

    $query="select id, COALESCE(username, 'unregistered') as username, time, text
            from centralcemeteries.photo_comment
            where photoId=:photoId
            order by time desc";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":photoId", $photoId, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

// unosenje novog komentara
function insertPhotoComment($db, $photoId, $username, $email, $text){

    $db->beginTransaction();

    $query = "insert into centralcemeteries.photo_comment (photoId, username, email, text)
              values(:photoId, :username, :email, :text)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":photoId", $photoId, PDO::PARAM_INT);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":text", $text, PDO::PARAM_STR);

    if($stmt->execute()){
        $db->commit();
        return true;
    }
    else{
        $db->rollback();
       return false;
    }
}

// Brisanje komentara
function deletePhotoComment($db, $id){

    $db->beginTransaction();

    $query="delete from centralcemeteries.photo_comment
            where id=:id";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if($stmt->execute()){
        $db->commit();
        return true;
    }
    else{
        $db->rollback();
        return false;
    }
}


try{
$pdo=Connection::getConnectionInstance();

    //getAllPhotoComments test
 //   $photoId=1;
 //   $photoComments=getPhotoComments($pdo,$photoId);
 //   var_dump($photoComments);

    // insertPhotoComment test
  //  $photoId = 1;
  //  $username = "test_korisnik";
  //  $email = "test@test.com";
  //  $text = "Mnogo lepa slika";
  //  $inserted = insertPhotoComment($pdo, $photoId, $username, $email, $text);
  //  echo $inserted;

    // deletePhotoComment test
    $id = 1;
    $deleted = deletePhotoComment($pdo, $id);
    echo $deleted;


}catch(PDOException $e){
echo $e->getMessage();
unset($pdo);
}


?>

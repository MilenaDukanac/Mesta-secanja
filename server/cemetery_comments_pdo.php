<?php

include 'connection.php';

// Dohvatanje svih komentara za odredjeno groblje - ko je napisao, kada i sta
function getCemeteryComments($db, $cemeteryId){

    $query="select id, username, time, text 
            from centralcemeteries.cemetery_comments
            where cemeteryId = :cemeteryId
            order by time desc";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":cemeteryId", $cemeteryId, PDO::PARAM_INT);

    if($stmt->execute())
        {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

// unosenje novog komentara
function insertCemeteryComment($db, $cemeteryId, $username, $email, $text){

    $db->beginTransaction();

    $query = "insert into centralcemeteries.cemetery_comments (cemeteryId, username, email, text)
              values(:cemeteryId, :username, :email, :text)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":cemeteryId", $cemeteryId, PDO::PARAM_INT);
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
function deleteCemeteryComment($db, $id){

    $db->beginTransaction();

    $query="delete from centralcemeteries.cemetery_comments
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

   // getCemeteryComments test
  //  $cemeteryId = 2;
//    $comments = getCemeteryComments($pdo,$cemeteryId);
//    var_dump($comments);

      // insertPhotoComment test
   //   $cemeteryId = 2;
   //   $username = "korisnik";
   //   $email = "testkorisnik@test.com";
   //   $text = "Bio sam ovde.";
   //   $comm = insertCemeteryComment($pdo, $cemeteryId, $username, $email, $text);
   //   echo $comm;

      // deleteCemeteryComment test
  //  $id = 6;
  // $deleted = deleteCemeteryComment($pdo, $id);
 //   echo $deleted;


}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}


?>

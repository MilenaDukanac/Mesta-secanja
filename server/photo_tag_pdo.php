<?php

include 'connection.php';

// Dohvatanje informacija o fotografiji kada se na nju klikne
/*function getPhotoInfo($db, $id){

    $query="select name, author, year, note, longitude, latitude
            from centralcemeteries.photo
            where id=:id";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if($stmt->execute())
    {
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}*/

// dohvatanje svih slika jednog groblja po cemeteryId
/*function getAllCemeteryPhotos($db, $cemeteryId){

    $query="select name
            from centralcemeteries.photo
            where cemeteryId=:cemeteryId";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":cemeteryId", $cemeteryId, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}*/

// unosenje novog taga za odredjenu sliku
function insertPhotoTag($db, $photoId, $tagId, $value){

    $db->beginTransaction();

    $query = "insert into centralcemeteries.photo_tags (photoId, tagId, value)
              values(:photoId, :tagId, :value)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":photoId", $photoId, PDO::PARAM_INT);
    $stmt->bindParam(":tagId", $tagId, PDO::PARAM_INT);
    $stmt->bindParam(":value", $value, PDO::PARAM_STR);


    if($stmt->execute()){
        $db->commit();
        return true;
    }
    else{
        $db->rollback();
        return false;
    }
}

// Brisanje naloga
/*function deletePhoto($db, $id){

    $db->beginTransaction();

    $query="delete from centralcemeteries.photo
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

*/
try{
     $pdo=Connection::getConnectionInstance();

    /*  //getPhotoInfo test
       $id=2;
       $photoInfo=getphotoInfo($pdo,$id);
       var_dump($userInfo);


       // getAllCemeteryPhotos test
       $cemeteryId = 4;
       $allPhotos = getAllCemeteryPhotos($pdo, $cemeteryId);
       var_dump($allPhotos);
 */
    // insertPhoto test
   /*    $photoId = 35;// stavi nesto lokalno
       $tagId = 1;
       $value = "1905";
       $inserted = insertPhotoTag($pdo, $photoId, $tagId, $value);
       var_dump($inserted);*/

    // deletePhoto test
    /*   $id = 2;
       $deleted = deletePhoto($pdo, $id);
       var_dump($deleted);*/


}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}


?>

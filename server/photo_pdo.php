<?php

include 'connection.php';

// Dohvatanje informacija o fotografiji kada se na nju klikne
function getPhotoInfo($db, $id){

    $query="select name, author, year, note, longitude, latitude 
            from CentralCemeteries.photo
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
}

// dohvatanje svih slika jednog groblja po cemeteryId
function getAllCemeteryPhotos($db, $cemeteryId){

    $query="select name
            from CentralCemeteries.photo 
            where cemeteryId=:cemeteryId";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":cemeteryId", $cemeteryId, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

// unosenje nove slike
function insertPhoto($db, $name, $cemeteryId, $author, $year, $note, $longitude, $latitude){

    $db->beginTransaction();

    $query = "insert into CentralCemeteries.photo (name, cemeteryId, author, year, note, longitude, latitude)
              values(:name, :cemeteryId, :author, :year, :note, :longitude, :latitude)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":cemeteryId", $cemeteryId, PDO::PARAM_INT);
    $stmt->bindParam(":author", $author, PDO::PARAM_STR);
    $stmt->bindParam(":year", $year, PDO::PARAM_INT);
    $stmt->bindParam(":note", $note, PDO::PARAM_STR);
    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR); // da li treba da bude string ili ne
    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR); // posto je double u bazi :D

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
function deletePhoto($db, $id){

    $db->beginTransaction();

    $query="delete from CentralCemeteries.photo
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
    $pdo=PDO_DB::getConnectionInstance();

     //getPhotoInfo test
      $id=2;
      $photoInfo=getphotoInfo($pdo,$id);
      var_dump($userInfo);

  
      // getAllCemeteryPhotos test
      $cemeteryId = 4;
      $allPhotos = getAllCemeteryPhotos($pdo, $cemeteryId);
      var_dump($allPhotos);

      // insertPhoto test
      $name = "server/lepa.pdf";// stavi nesto lokalno
      $cemeteryId = 4;
      $author = "Filip";
      $year = 2023;
      $note = "Mnogo lepa slika";
      $longitude = null;//stavi i ovde nesto, ne znamo sta treba
      $latitude = null;// -||-
      $inserted = insertPhoto($pdo, $name, $cemeteryId, $author, $year, $note, $longitude, $latitude);
      var_dump($inserted);
  
      // deletePhoto test
      $id = 2;
      $deleted = deletePhoto($pdo, $id);
      var_dump($deleted);


}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}


?>

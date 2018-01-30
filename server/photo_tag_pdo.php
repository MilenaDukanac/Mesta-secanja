<?php

include 'connection.php';

// Dohvatanje vrednosti tagova o fotografiji kada se na nju klikne
function getPhotoTags($db, $id){

    $query="select t.name, pt.value, c.color
            from centralcemeteries.photo_tag pt join centralcemeteries.tag t on pt.tagId = t.id 
              join  centralcemeteries.category c on t.categoryId = c.id 
            where pt.photoId=:id
            order by t.name, pt.value";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if($stmt->execute())
    {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

function getSpecialPhotos($db, $query){

    $stmt=$db->prepare($query);
    if($stmt->execute())
    {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

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

    if(checkTagValue($db, $tagId, $value) == false){
        return false;
    }

    $query = "insert into centralcemeteries.photo_tag (photoId, tagId, value)
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

function checkTagValue($db, $tagId, $value){
    $query = "select *
			  from centralcemeteries.tag_possible_value
			  where tagId = :tagId and value = :value";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":tagId", $tagId, PDO::PARAM_INT);
    $stmt->bindParam(":value", $value, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->fetch(PDO::FETCH_OBJ) == null)
        return false;
    else
        return true;
}

function getTagName($db, $tagId){
    $query = "select name
			  from centralcemeteries.tag
			  where id = :tagId";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":tagId", $tagId, PDO::PARAM_INT);


    if($stmt->execute())
        return $stmt->fetch(PDO::FETCH_OBJ);
    else
        return null;
}

function getTagPossibleValues($db, $tagId){
    $query = "select value
			  from centralcemeteries.tag_possible_value
			  where tagId = :tagId";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":tagId", $tagId, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $str = "";

    foreach ($result as $value){
        if($str == ""){
            $str .= $value->value;
        }else {
            $str .=  ", " . $value->value;
        }
    }
    return $str;
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

   // var_dump(getSpecialPhotos($pdo, 'select p.name, p.id from centralcemeteries.photo_tag pt join centralcemeteries.photo p on pt.photoId = p.id where pt.tagId=18 and pt.value="1926" and p.id in (select photoId from centralcemeteries.photo_tag where tagId=20 and pt.value="1994" and p.id in (select id from centralcemeteries.photo)) group by p.id '));
//   // var_dump(getTagName($pdo, 10));

//    var_dump(getTagPossibleValues($pdo, 20));

}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}


?>

<?php
include 'connection.php';

// Podrazumevane vrednosti za username i email, jer moze da se uloguje sa bilo kojim od ta dva
$username='a';
$email='a@a.com';

    //Metoda za kreiranje dodatnih oznaka

    function insertTag($db,$name,$categoryId){

        $query = "insert into centralcemeteries.tag values(NULL,:name,:categoryId);";

				$stmt = $db->prepare($query);

				$stmt->bindParam(":name", $name, PDO::PARAM_STR);
				$stmt->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);

        if($stmt->execute())
			return true;
		else
			return false;
    }

    function insertTagCategoryName($db, $name, $categoryName){

        $query = "select id from centralcemeteries.categories where name = :name";

        $stmt = $db->prepare($query);

        $stmt->bindParam(":name", $categoryName, PDO::PARAM_STR);

        if($stmt->execute())
            $categoryId = $stmt->fetch(PDO::FETCH_OBJ);
        else
            return false;

        return insertTag($db, $name, intval($categoryId->id));
    }

	//Metoda koja vraca sve oznake

	function getAllTags($db) {

		$query = "select *
				  from centralcemeteries.tag";

		$stmt = $db->prepare($query);

		if($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        else
            return null;
	}

	//Metoda koja vraca tag sa datim identifikatorom
	function getTag($db,$id) {

		$query = "select *
				  from centralcemeteries.tag
				  where id=:id";

		$stmt = $db->prepare($query);
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);

		if($stmt->execute())
            return $stmt->fetch(PDO::FETCH_OBJ);
        else
            return FALSE;
	}

	function getAllTagsInCemetery($db, $cemeteryId){

        $query = "select t.id, t.name, t.categoryId, pt.value
                  from centralcemeteries.photo p
                  join centralcemeteries.photo_tag pt on p.id = pt.photoId
                  join centralcemeteries.tag t on pt.tagId = t.id
                  where p.cemeteryId = :cemeteryId";

        $stmt = $db->prepare($query);
        $stmt->bindParam(":cemeteryId", $cemeteryId, PDO::PARAM_INT);

        if($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        else
            return FALSE;

    }

	//Metoda koja vrsi filtriranje po nekoj oznaci

    function getPhotos($db,$tag_id){

        $query = "select p.id
				from centralcemeteries.photo p
				join centralcemeteries.photo_tag pt on pt.photoId = p.id
				join centralcemeteries.tag t on pt.tagId = t.id
				where t.id=:tag_id";

        $stmt = $db->prepare($query);

        $stmt->bindParam(":tag_id", $tag_id, PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }else{
            return FALSE;
        }
    }


try{
     $pdo=Connection::getConnectionInstance();

//    //getTag test
//    $tag_id = 4;
//    $tag_info = $pdo->getTag($tag_id);
//    var_dump($tag_info);

   // $insert_tag = insertTagCategoryName($pdo, "year of birth", "years");
    //var_dump($insert_tag);

 //$all_tag = $pdo->getAllTags();
 //var_dump($all_tag);
// $tag=getTag($pdo,1);
// var_dump($tag);

}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}

?>

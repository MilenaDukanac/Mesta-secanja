<?php
include 'connection.php';

    //Metoda za kreiranje dodatnih oznaka

    function insertTag($db,$name,$categoryId){
        $query1 = "select *
                   from centralcemeteries.tag
                   where categoryId = :categoryId and name = :name";

        $stmt1 = $db->prepare($query1);

        $stmt1->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);
        $stmt1->bindParam(":name", $name, PDO::PARAM_STR);

        if($stmt1->execute()){
          return false;
        }

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

        $query = "select id from centralcemeteries.category where name = :name";

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
            return -1;
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

 //$all_tags = $pdo->getAllTags();
 //var_dump($all_tags);
// $tag=getTag($pdo,1);
// var_dump($tag);

}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}

?>

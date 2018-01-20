<?php
include 'connection.php';

// Podrazumevane vrednosti za username i email, jer moze da se uloguje sa bilo kojim od ta dva
$username='a';
$email='a@a.com';
	
    //Metoda za kreiranje dodatnih oznaka
	
    function insertTag($db,$id,$name,$categoryId){

        $query = "insert into centralcemeteries.tags values(:id,:name,:categoryId);";

		$stmt = $db->prepare($query);
		
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->bindParam(":name", $name, PDO::PARAM_STR);
		$stmt->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);
        
        if($stmt->execute())
			return $db->lastInsertId();
		else 
			return -1;
    }

	//Metoda koja vraca sve oznake
	
	function getAllTags($db) {
		
		$query = "select * 
				  from centralcemeteries.tags";
				  
		$stmt = $db->prepare($query);
		
		if($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        else 
            return -1;
	}

	//Metoda koja vraca tag sa datim identifikatorom
	function getTag($db,$id) {
		
		$query = "select * 
				  from centralcemeteries.tags 
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
				join centralcemeteries.photo_tags pt on pt.photoId = p.id 
				join centralcemeteries.tags t on pt.tagId = t.id
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

    //$insert_tag = $pdo->insertTag(3,"day",10);
    //var_dump($insert_tag);

 //$all_tags = $pdo->getAllTags();
 //var_dump($all_tags);
 $tag=getTag($pdo,1);
 var_dump($tag);

}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}

?>
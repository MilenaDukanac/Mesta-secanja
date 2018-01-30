<?php
include 'connection.php';

    //Metoda za kreiranje dodatnih oznaka

function insertTag($db,$name,$categoryId, $possibleValues){

    $db->beginTransaction();

    $query = "insert into centralcemeteries.tag (name, categoryId)
              values(:name, :categoryId);";

            $stmt = $db->prepare($query);

            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);

    if($stmt->execute()){}
    else {
        $db->rollback();
        return false;
    }


    $query1 = "select id from centralcemeteries.tag where name = :name";
    $stmt1 = $db->prepare($query1);
    return true;
    $stmt1->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt1->execute();
    $tagId = $stmt1->fetch(PDO::FETCH_OBJ);
    $tagIdInt = intval($tagId->id);
    $query2 = "insert into centralcemeteries.tag_possible_value (tagId, value)
               values (:tagId, :value)";

    $stmt2 = $db->prepare($query2);

    foreach($possibleValues as $possiblevalue){

        $stmt2->bindParam(":tagId", $tagIdInt, PDO::PARAM_INT);
        $stmt2->bindParam(":value", $possiblevalue, PDO::PARAM_STR);

        if($stmt2->execute()){
        }
        else{
            $db->rollback();
            return false;
        }

    }
    $db->commit();
    return true;


}

function insertTagCategoryName($db, $name, $categoryName, $possibleValues){

    $query = "select id from centralcemeteries.category where name = :name";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":name", $categoryName, PDO::PARAM_STR);

    if($stmt->execute())
        $categoryId = $stmt->fetch(PDO::FETCH_OBJ);
    else
        return false;

    return insertTag($db, $name, intval($categoryId->id), $possibleValues);
}

function insertCategory($db, $name){
    // Prvo provera da kategorija sa tim imenom vec postoji u tabeli
    $query2 = "select *
              from centralcemeteries.category
              where name = :name";

    $stmt2 = $db->prepare($query2);
    $stmt2->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt2->execute();
    if($stmt2->fetch(PDO::FETCH_OBJ) != null){
        // Ta kategorija je vec u bazi
        return false;
    }

    // Onda, random odabir boje za kategoriju, ali tako da ta boja vec nije dodeljena nekoj drugoj kategoriji
    function random_color_part(){
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    function generate_color(){
        return "#".random_color_part().random_color_part().random_color_part();
    }

    $query1 = "select *
              from centralcemeteries.category
              where color = :color";

    $stmt1 = $db->prepare($query1);

    $color = "";

    // Generise se nova boja sve dok se poklapa sa onima koje su vec u bazi
    do{
        $color = generate_color();
        $stmt1->bindParam(":color", $color, PDO::PARAM_STR);
        $stmt1->execute();
    }
    while($stmt1->fetch(PDO::FETCH_OBJ) != null);

    // Konacno, ubacujemo novu kategoriju u novu bazu
    $db->beginTransaction();

    $query = "insert into centralcemeteries.category(name, color)
              values(:name, :color)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":color", $color, PDO::PARAM_STR);

    if($stmt->execute()){
        $db->commit();
        return true;
    }
    else{
        $db->rollback();
        return false;
    }
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

function getTagsForCemetery($db,$id) {

    $query = "select t.name,ptag.value, ca.color 
					from centralcemeteries.cemetery c 
					join centralcemeteries.photo p on c.id=p.cemeteryId 
					join centralcemeteries.photo_tag ptag on p.id=ptag.photoId 
					join centralcemeteries.tag t on t.id=ptag.tagId
					join centralcemeteries.category ca on ca.id = t.categoryId  
					where c.id=:id
					group by t.name, ptag.value
					order by ca.color, t.name";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);

    if($stmt->execute())
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    else
        return FALSE;
}

function getTagPossibleValues($db, $tagId){
    $query = "select value
			  from centralcemeteries.tag_possible_value
			  where tagId = :tagId";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":tagId", $tagId, PDO::PARAM_INT);

    if($stmt->execute())
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    else
        return false;
}


try{
     $pdo=Connection::getConnectionInstance();
//
////    //getTag test
////    $tag_id = 4;
////    $tag_info = $pdo->getTag($tag_id);
////    var_dump($tag_info);
//
//    $array = ["1924","1925","1926"];
    $insert_tag = insertTagCategoryName($pdo, "veroispovest", "nesto", ["nesto","drugo"]);
    var_dump($insert_tag);

 //$all_tags = $pdo->getAllTags();
 //var_dump($all_tags);
// $tag=getTag($pdo,1);
// var_dump($tag);

}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}

?>
<?php

include 'connection.php';

function getAllCategories($db){
    $query = "select id, name, color
              from centralcemeteries.category";

    $stmt = $db->prepare($query);
    if($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else {
        return null;
    }
}

function getCategoryById($db, $id){
    $query = "select *
              from centralcemeteries.category
              where id=:id";

    $stmt=$db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if($stmt->execute()){
      return $stmt->fetch(PDO::FETCH_OBJ);
    }
    else{
      return null;
    }
}

function getCategoryByName($db, $name){
    $query = "select *
              from centralcemeteries.category
              where name=:name";

    $stmt=$db->prepare($query);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);

    if($stmt->execute()){
      return $stmt->fetch(PDO::FETCH_OBJ);
    }
    else{
      return null;
    }
}

function insertCategory($db, $name){
    // Prvo provera da kategorija sa tim imenom vec postoji u tabeli
    $query2 = "select *
              from centralcemeteries.category
              where name = :name";

    $stmt2 = $db->prepare($query2);
    $stmt2->bindParam(":name", $name, PDO::PARAM_STR);

    if($stmt2->execute()){
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
    }
    while($stmt1->execute());

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
      $d->rollback();
      return false;
    }
}

function deleteCategoryById($db, $id){

    $db->beginTransaction();
    $query = "delete from centralcemeteries.category
              where id = :id";

    $stmt = $db->prepare($query);

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

function deleteCategoryByName($db, $name){

    $db->beginTransaction();
    $query = "delete from centralcemeteries.category
              where name = :name";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);

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
//   $pdo=Connection::getConnectionInstance();
//    $all_cemeteries=getAllCemeteries($pdo);
//    var_dump($all_cemeteries);

//    $cemteries_in_region = getCemeteriesInRegion($pdo, 1);
//    var_dump($cemteries_in_region);
//
//
//    $cemteries_in_region = getCemeteriesInCountry($pdo, 1);
//    var_dump($cemteries_in_region);
//


//    $cemetery_id=1;
//    $cemetery_info=$pdo->getCemetery($cemetery_id);
//    var_dump($cemetery_info);

//    $insert_cemetery=insertCemetery($pdo,1, "Test description", null, 45.3815612, 20.36857370000007);
//    var_dump($insert_cemetery);
//
//    $insert_cemetery=insertCemeteryWithRegionName($pdo,"Najnovije groblje", "Sumadija", "neko bas lepo groblje", "many historical persons", 20.36857370000007, 24.45689769464);
//    var_dump($insert_cemetery);


//    $insert_cemetery=insertCemetery($pdo,"Najnovije groblje", "5", "neko bas lepo groblje", "many historical persons", 20.36857370000007, 24.45689769464);
//    var_dump($insert_cemetery);

}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}

?>

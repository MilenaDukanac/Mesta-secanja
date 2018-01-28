<?php

include "connection.php";
/*
function getRegionsAndPlaces($db){
  $query = "select c.id as countryId, c.name as countryName, r.id as regionId, r.name as regionName
            from centralcemeteries.country c join centralcemeteries.region r on r.countryId = c.id";

  $stmt = $db->prepare($query);

  if($stmt->execute()){
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  else{
    return null;
  }
}*/

function getAllPlaces($db){

    $query = "select p.id, p.name, r.id as regionId, c.id as countryId
              from centralcemeteries.place p
              join centralcemeteries.region r on p.regionId = r.id
              join centralcemeteries.country c on r.countryId = c.id";

    $stmt = $db->prepare($query);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
//        $niz = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }

//    foreach ($niz as $clan){
//        $clan->name = utf8_encode($clan->name);
//    }
//    return $niz;
}

function getPlacesInRegion($db, $regionId){

    $query = "select *
              from centralcemeteries.place
              where regionId = :regionId";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":regionId", $regionId, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

function getPlace($db, $id){
    $query = "select *
              from centralcemeteries.place
              where id = :id";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

function insertPlace($db, $regionId, $name){
    $query = "insert into centralcemeteries.place
              values(NULL, :regionId, :name, NULL)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":regionId", $regionId, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }
}

function insertPlaceWithRegionName($db, $regionName, $name){
    $query1 = "select id
               from centralcemeteries.region
               where name = :name";

    $stmt1 = $db->prepare($query1);

    $stmt1->bindParam(":name", $regionName, PDO::PARAM_STR);

    if($stmt1->execute()){
        $regionId = $stmt1->fetch(PDO::FETCH_OBJ);
    }
    else{
        return false;
    }

    return insertPlace($db, intval($regionId->id), $name);
}

function deletePlace($db, $id){

    $db->beginTransaction();
    $query = "delete from centralcemeteries.place
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

try{
//
    $pdo=Connection::getConnectionInstance();
//
//    $all_regions=getAllPlaces($pdo);
//    var_dump($all_regions);
//
//    $insert_region=insertRegion($pdo,1, "Srem");
//    var_dump($insert_region);
//
//    $all_regions=getAllRegions($pdo);
//    var_dump($all_regions);
//
//    $regioos_in_country = getRegionsInCountry($pdo, 1);
//    var_dump($regioos_in_country);
//
//    $region = getRegion($pdo, 3);
//    var_dump($region);

//    $insert_region=insertPlaceWithRegionName($pdo, "VVVV","vvvv");
//    var_dump($insert_region);


}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}

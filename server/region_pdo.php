<?php

include "connection.php";

function getAllRegions($db){

    $query = "select *
              from centralcemeteries.region";

    $stmt = $db->prepare($query);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

function getRegionsInCountry($db, $countryId){

    $query = "select *
              from centralcemeteries.region
              where countryId = :countryId";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":countryId", $countryId, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

function getRegion($db, $id){
    $query = "select *
              from centralcemeteries.region
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

function insertRegion($db, $countryId, $name){
    $query = "insert into centralcemeteries.region
              values(NULL, :countryId, :nname)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":countryId", $countryId, PDO::PARAM_INT);
    $stmt->bindParam(":nname", $name, PDO::PARAM_INT);

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }
}

function deleteRegion($db, $id){

    $db->beginTransaction();
    $query = "delete from centralcemeteries.region
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

    $pdo=PDO_DB::getConnectionInstance();
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




}catch(PDOException $e){

    echo $e->getMessage();
    unset($pdo);
}
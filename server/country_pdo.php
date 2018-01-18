<?php

include "connection.php";

function getAllCountries($db){

    $query = "select *
              from CentralCemeteries.country";

    $stmt = $db->prepare($query);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

function getCountry($db, $id){
    $query = "select *
              from CentralCemeteries.country
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

function insertCountry($db, $name){
    $query = "insert into CentralCemeteries.country
              values(NULL, :nname)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":nname", $name, PDO::PARAM_INT);

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }
}

function deleteCountry($db, $id){

    $db->beginTransaction();
    $query = "delete from CentralCemeteries.country
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
//    $insert_country=insertCountry($pdo,"Hungary");
//    var_dump($insert_country);
//
//    $insert_country=insertCountry($pdo,"Slovenia");
//    var_dump($insert_country);
//
//    $insert_country=insertCountry($pdo,"Croatia");
//    var_dump($insert_country);
//
//    $insert_country=insertCountry($pdo,"Austria");
//    var_dump($insert_country);
//
//    $all_regions=getAllCountries($pdo);
//    var_dump($all_regions);
//
//    $country = getCountry($pdo, 3);
//    var_dump($country);
//
//    $country = getCountry($pdo, 4);
//    var_dump($country);


    $delete = deleteCountry($pdo, 1);
    var_dump($delete);
    
}catch(PDOException $e){

    echo $e->getMessage();
    unset($pdo);
}
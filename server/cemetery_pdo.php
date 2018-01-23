<?php

include 'connection.php';

function getAllCemeteries($db){
    $query = "select cc.id, cc.name, cc.description, cc.additionalData, cc.longitude, cc.latitude, r.name as regionName, c.name as countryName
              from centralcemeteries.cemetery cc
              join centralcemeteries.region r on cc.regionId = r.id
              join centralcemeteries.country c on c.id = r.countryId";

    $stmt = $db->prepare($query);
    if($stmt->execute()) {

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else {
        return null;
    }
}


function getCemetery($db, $id){
    $query="select * from centralcemeteries.cemetery where id=:Id";
    $stmt=$db->prepare($query);
    $stmt->bindParam(":Id", $id, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
}

function insertCemetery($db, $name,$place_id, $description, $additional_data, $longitude, $latitude){

    $query = "insert into centralcemeteries.cemetery
              values(NULL, :nname, :place_id, :description, :additional_data, :longitude, :latitude)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":nname", $name, PDO::PARAM_INT);
    $stmt->bindParam(":place_id", $place_id, PDO::PARAM_INT);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":additional_data", $additional_data, PDO::PARAM_STR);
    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);

    if($stmt->execute())
        return true;
    else
        return false;

}

function getCemeteriesInRegion($db, $regionId){
    $query = "select * from centralcemeteries.cemetery where regionId = :regionId";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":regionId", $regionId, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else {
        return null;
    }
}

function getCemeteriesInCountryInRegion($db,$countryName, $regionName){
    $query = "select * from centralcemeteries.cemetery cc
				join centralcemeteries.region r on r.id=cc.regionId 
				join centralcemeteries.country c on c.id=r.countryId 
				where c.name=:countryName and r.name=:regionName";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":countryName", $countryName, PDO::PARAM_STR);
    $stmt->bindParam(":regionName", $regionName, PDO::PARAM_STR);
    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else {
        return null;
    }
}

function getCemeteriesInCountry($db, $countryId){
    $query = "select * 
              from centralcemeteries.cemetery
              where regionId in (select id
                                 from centralcemeteries.region
                                 where countryId = :countryId)";
    $stmt = $db->prepare($query);

    $stmt->bindParam(":countryId", $countryId, PDO::PARAM_INT);

    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else {
        return null;
    }
}

function deleteCemetery($db, $id){

    $db->beginTransaction();
    $query = "delete from centralcemeteries.cemetery
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
//    $pdo=Connection::getConnectionInstance();
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

}catch(PDOException $e){

    echo $e->getMessage();
    unset($pdo);
}

?>

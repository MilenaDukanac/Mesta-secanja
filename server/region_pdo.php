<?php

include "connection.php";

function getCountriesAndRegions($db){
  $query = "select c.id as countryId, c.name as countryName, r.id as regionId, r.name as regionName
            from centralcemeteries.country c join centralcemeteries.region r on r.countryId = c.id";

  $stmt = $db->prepare($query);

  if($stmt->execute()){
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  else{
    return null;
  }
}

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

function getRegionByCemetery($db, $cemeteryId) {

	 $query = "select r.id, r.name
              from centralcemeteries.region r
					join centralcemeteries.place p on p.regionId = r.id
					join centralcemeteries.cemetery c on c.placeId = p.id
              where c.id = :cemId";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":cemId", $cemeteryId, PDO::PARAM_INT);
	$stmt->execute();

	$region = new stdClass();
	$region = $stmt->fetch(PDO::FETCH_OBJ);

    if($region != null){
        return $region;
    }
    else{
        return null;
    }
}



function insertRegion($db, $countryId, $name){
    $db->beginTransaction();

    $query1 = "select *
               from centralcemeteries.region
               where countryId = :countryId and name = :name";

    $stmt1 = $db->prepare($query1);

    $stmt1->bindParam(":countryId", $countryId, PDO::PARAM_INT);
    $stmt1->bindParam(":name", $name, PDO::PARAM_STR);

    $stmt1->execute();
    if($stmt1->fetch(PDO::FETCH_OBJ)){
      return false;
    }


    $query = "insert into centralcemeteries.region
              values(NULL, :countryId, :name)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":countryId", $countryId, PDO::PARAM_INT);
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

function insertRegionWithCountryName($db, $countryName, $name){
    $query1 = "select id
               from centralcemeteries.country
               where name = :name";

    $stmt1 = $db->prepare($query1);

    $stmt1->bindParam(":name", $countryName, PDO::PARAM_STR);

    if($stmt1->execute()){
        $countryId = $stmt1->fetch(PDO::FETCH_OBJ);
    }
    else{
        return false;
    }

    return insertRegion($db, intval($countryId->id), $name);
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

   // $pdo=Connection::getConnectionInstance();

//    $all_regions=getCountriesAndRegions($pdo);
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
  //  $region = getRegionByCemetery($pdo, 2);
  //  var_dump($region);

//    $insert_region=insertRegionWithCountryName($pdo, "Serbia","Sumadija");
//    var_dump($insert_region);


}catch(PDOException $e){
    echo "greska";
    echo $e->getMessage();
    unset($pdo);
}

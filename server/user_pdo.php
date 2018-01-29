<?php

include 'connection.php';

// Dohvatanje informacija o korisniku kada se loguje
function getUser($db, $pass, $username){

    $query="select name, surname, username, type, userId, institution
            from centralcemeteries.user
            where username=:username and pass=:pass";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);

    if($stmt->execute())
        {
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

function exists($db, $username){
    $query="select username
            from centralcemeteries.user
            where username=:username";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);

    if($stmt->execute())
    {
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}


// dohvatanje informacija o korisniku na osnovu imena i prezimena, kada admin zeli da izmeni tip
function getUserInfo($db, $name, $surname){

    $query="select *
            from centralcemeteries.user
            where name=:name and surname=:surname";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":surname", $surname, PDO::PARAM_STR);

    if($stmt->execute()){

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    else{
        return null;
    }
}

// unosenje novog korisnika
function insertUser($db, $name, $surname, $username, $pass, $email, $institution, $note){

    $db->beginTransaction();

    $query = "insert into centralcemeteries.user (userId ,name, surname, type, username, pass, email, institution, note)
              values(NULL, :name, :surname, DEFAULT, :username, :pass, :email, :institution, :note)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
//    $stmt->bindParam(":type", $type, PDO::PARAM_STR);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":institution", $institution, PDO::PARAM_STR);
    $stmt->bindParam(":note", $note, PDO::PARAM_STR);

    if($stmt->execute()){

        $db->commit();
        return true;
    }

    else{
        $db->rollback();
       return false;
    }
}

// Menjanje tipa korisnika, na osnovu id-a, od strane admina
function updateType($db, $userId, $type){

    $db->beginTransaction();

    $query="update centralcemeteries.user
            set type=:type
            where userId=:userId";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":type", $type, PDO::PARAM_STR);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);

    if($stmt->execute()){
        $db->commit();
        return true;
    }
    else{
        $db->rollback();
        return false;
    }
}

function updateTypeByUsername($db, $username){

    $db->beginTransaction();

    $query="update centralcemeteries.user
            set type='inner'
            where username=:username";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":username", $username, PDO::PARAM_INT);

    if($stmt->execute()){
        $db->commit();
        return true;
    }
    else{
        $db->rollback();
        return false;
    }
}

// Brisanje naloga
function deleteId($db, $userId){

    $db->beginTransaction();

    $query="delete from centralcemeteries.user
            where userId=:userId";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);

    if($stmt->execute()){
        $db->commit();
        return true;
    }
    else{
        $db->rollback();
        return false;
    }
}
 // Brisanje korisnika na osnovu korisnickog imena, ono bi trebalo biti jedinstveno
function deleteUser($db, $username){

    $db->beginTransaction();

    $query="delete from centralcemeteries.user
            where username=:username";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);

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
//$pdo=Connection::getConnectionInstance();
////

//   //getUser test
//    $username="vesna";
//    $pass="sifraa";
//    $user_info=getUser($pdo,$pass,$username);
//    var_dump($user_info);


//
//    $username="jeka";
//    $pass="jeka";
//    $user_info=deleteId($pdo,intval("4"));
//    var_dump($user_info);


    //$test = exists($pdo, "milos494");
//var_dump($test);
    // insertUser
//    $name = "Test2";
//    $surname = "Testic";
//    $username = "testtestic";
//    $pass = "mojaSifra1";
//    $email = "test.testic@gmail.com";
//    $institution = "MATF";
//    $note = "";
//    $insert_info = insertUser($pdo,$name,$surname,$username,$pass,$email,$institution,$note);
//    echo $insert_info;
//
//
//    echo updateType($pdo, 1, "inner");


}catch(PDOException $e){
echo $e->getMessage();
unset($pdo);
}


?>

<?php

include 'connection.php';

// Podrazumevane vrednosti za username i email, jer moze da se uloguje sa bilo kojim od ta dva
$username='a';
$email='a@a.com';

// Dohvatanje informacija o korisniku kada se loguje
function getUser($db, $pass, $username, $email){

    $query="select name, type 
            from centralcemeteries.user 
            where (username=:username or email=:email) and pass=:pass";

    $stmt=$db->prepare($query);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);

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


try{
//$pdo=Connection::getConnectionInstance();

   //getUser test
//    $username="test";
//  //  $email="test@jtest.com";
//    $pass="test";
//    $user_info=getUser($pdo,$pass,$username,$email);
//    var_dump($user_info->type);

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

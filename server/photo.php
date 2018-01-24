<?php


include "photo_pdo.php";

$status_messages=array(
    200 => "OK",
    201 => "Created",
    400 => "Bad request",
    404 => "Not found",
    405 => "Method not allowed",
    500 => "Internal server error");

/* Odgovor koji treba vratiti */
$response=new stdClass();
$response->data="";
$response->status=0;
$response->error=false;
$response->error_message="";

/* Podrzane metode API-ja */
$supported_methods=array("GET", "POST", "PUT", "DELETE");
$method=strtoupper($_SERVER['REQUEST_METHOD']);

/* Provera zahteva koji treba da se opsluzi */
if(!in_array($method,$supported_methods)) {
    $response->status=405;
}

$pdo = Connection::getConnectionInstance();

try{
    switch ($method){

        case "GET":

            if($_GET['type'] == 'cemetery') {
                $id = $_GET["cemeteryId"];


                $data = getAllCemeteryPhotos($pdo, $id);
                if ($data == null) {
                    $response->status = 404;
                    $response->data = null;
                }
                else {
                    $response->status = 200;
                    $response->data = $data;
                }

            }
            else{
                $response->status = 400;
                $response->data = null;
            }
            break;

        case "POST":
            //TODO
            break;

        case "PUT":
            //TODO

            break;

        case "DELETE":
            //TODO

            break;
    }




}catch(Exception $e){
    $response->status=500;
    $response->error=true;
    $response->data=null;
}


header("HTTP/1.1 " . $response->status . " " . $status_messages[$response->status]);
header("Content-Type:application/json");

if($response->data != null){
    echo json_encode($response->data);
}


?>

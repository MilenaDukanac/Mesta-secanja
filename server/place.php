<?php

include_once "place_pdo.php";

/* Niz sa mapiranjem statusnih kodova u statusne poruke */
$status_messages = array(
    200 => "OK",
    201 => "Created",
    400 => "Bad request",
    404 => "Not found",
    405 => "Method not allowed",
    500 => "Internal server error");

/* Odgovor koji treba vratiti */
$response = new stdClass();
$response->data = "";
$response->status = 0;
$response->error = FALSE;
$response->error_message = "";

/* Podrzane metode API-ja */
$supported_methods = array("GET", "POST");
$method = strtoupper($_SERVER['REQUEST_METHOD']);

/* Provera zahteva koji treba da se opsluzi */
if(!in_array($method,$supported_methods)) {
    $response->status = 405;
}
else {

    /* Obrada podrzanih zahteva */
    $number_of_url_elements = 0;
    $url_elements = array();

    if(isset($_SERVER['PATH_INFO'])){
        $url_elements = explode("/", $_SERVER['PATH_INFO']);
        $number_of_url_elements = count($url_elements)-1;
    }

    $pdo = Connection::getConnectionInstance();

    try{

        switch($method){

            case "GET":

                switch($number_of_url_elements){
                    case 1:

                        if($url_elements[1] == "places"){
                            // GET /goals
                            $result = getAllPlaces($pdo);
                            if($result === FALSE){
                                $response->data = null;
                                $response->status = 404;
                            }
                            else{
                                $response->data = $result;
                                $response->status = 200;
                            }
                        }
                        else{
                            $response->status = 400;
                            $response->data = null;
                        }

                        break;

                    default:
                        $response->status = 400;
                        $response->data = null;
                }
                break;

            case 'POST':
                $newPlace = json_decode(file_get_contents("php://input"));

                if(insertPlaceWithRegionName($pdo, $newPlace->region, $newPlace->place)){
                    $response->data = "true";
                    $response->status = 201;
                }
                else{
                  $response->status = 400;
                  $response->data = null;
                }
                break;
        }



    }catch(Exception $e){
        $response->status = 500;
        $response->error = true;
        $response->data = null;
    }

    header("HTTP/1.1 ". $response->status. " ". $status_messages[$response->status]);
    header("Content-Type:application/json");

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");

    if($response->data != null){
        echo json_encode($response->data);
    }
}

?>

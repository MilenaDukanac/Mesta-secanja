<?php

include_once "user_pdo.php";

/* Niz sa mapiranjem statusnih kodova u statusne poruke */
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
else {

    $number_of_url_elements=0;

    if(isset($_SERVER['PATH_INFO'])){
        $url_elements=explode("/", $_SERVER['PATH_INFO']);
        $number_of_url_elements=count($url_elements)-1;
    }

    $pdo = PDO_DB::getConnectionInstance();

    try{

        switch ($method){

            case "GET":

                switch ($number_of_url_elements) {

                    case 1:
                        // TODO: GET
                        // get/login pa da se ocekuje da postoji token          composer
                        break;

                    case 2:
                        // TODO: GET/user/{name}/{surname}

                        break;

                }
                break;

            case "POST":

                // POST/user

                $new_user = json_decode(file_get_contents("php://input"));

                // TODO: Autentikacija, autorizacija, validacija, verifikacija
                // name - dozvoljena slova
                // surname - dozvoljena slova
                // username - treba da bude jedinstveno; dozvoljena su slova, cifre i _; izmedju 5-16
                // email - treba da bude u odgovarajucem formatu
                // password - dozvoljeno je sve; treba da bude izmedju 8 i 32

                if($pdo->insertUser($pdo, $new_user->name, $new_user->surname, $new_user->type, $new_user->username, $new_user->pass, $new_user->email)){

                    $response->data = stdClass();
                    $response->status = 201;
                }
                else{
                    $response->status = 400;
                    $response->data = null;
                }

                break;

            case "PUT":

                break;

            case "DELETE":


                break;
        }




    }catch(Exception $e){
        $response->status=500;
        $response->error=true;
        $response->data=null;
    }


    /*
        Generisati HTTP odgovor
        u okviru odgovora obavezno postaviti i zaglavlja
        neophodna za CORS pregovaranje

        Format odgovora treba da bude JSON
    */



    // Menjamo promenljivama
    header("HTTP/1.1 ".$response->status." ".$status_messages[$response->status]);
    // Dodajemo da je u json formatu
    header("Content-Type:application/json");

    // dodajemo cros podrsku
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods:GET, POST");

    // I telo je odgovor u json formatu
    if($response->data != null){
        echo json_encode($response->data);
    }

}

?>
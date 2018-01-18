<?php

require __DIR__ .'\..\vendor\autoload.php';
include_once "user_pdo.php";
use Firebase\JWT\JWT;

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
//$method=strtoupper($_SERVER['REQUEST_METHOD']);
$method = "POST";

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

    $pdo = Connection::getConnectionInstance();

    try{

        switch ($method){

            case "GET":

                switch ($number_of_url_elements) {

                    case 1:
                        // TODO: GET
                        // get/login pa da se ocekuje da postoji token

                        // Proverava se JWT potpis. Uzimamo informacije iz jwt

                        break;

                    case 2:
                        // TODO: GET/user/{name}/{surname}

                        break;

                }
                break;

            case "POST":

                // POST/user

                $new_user = json_decode(file_get_contents("php://input"));

                // TODO: validacija
                // name - dozvoljena slova
                // surname - dozvoljena slova
                // username - treba da bude jedinstveno; dozvoljena su slova, cifre i _; izmedju 5-16
                // email - treba da bude u odgovarajucem formatu
                // password - dozvoljeno je sve; treba da bude izmedju 8 i 32

                $header = ['alg' => 'HS256', 'typ' => 'JWT'];
                $payload = ['data' => ['username' => $new_user->username, 'email' => $new_user->email, 'password' => $new_user->pass]];
                $key = base64_encode(openssl_random_pseudo_bytes(64));

                $jwt = JWT::encode($payload, $key, $header['alg']);

              //  var_dump($jwt);

                if(insertUser($pdo, $new_user->name, $new_user->surname, $new_user->type, $new_user->username, $new_user->pass, $new_user->email)){

                    $response->data = new stdClass();
                    $response->status = 201;
                }
                else{
                    $response->status = 400;
                    $response->data = null;
                }

                break;

            case "PUT":

                // TODO: nije prioritet
                break;

            case "DELETE":

                // TODO
                break;
        }




    }catch(Exception $e){
        $response->status=500;
        $response->error=true;
        $response->data=null;
    }

    // zaglavlje

 /*   if(headers_sent()){
        echo "Ne moze!";
    }*/
 //   else {

        // Menjamo promenljivama
        header("HTTP/1.1 " . $response->status . " " . $status_messages[$response->status]);
        // Dodajemo da je u json formatu
        header("Content-Type:application/json");
    //}


    // telo
    if($response->data != null){
        echo json_encode($response->data);
    }

}

?>
<?php

include "user_pdo.php";

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

    //echo "usao sam u try blok";

    switch ($method){

        case "GET":

            if($_GET['type'] == 'login') {
                $user = $_GET["username"];
                $pass = $_GET['password'];

                $data = getUser($pdo, $pass, $user, "");
                $response->data = $data;
                if ($data == null) {
                    $response->status = 404;
                    $response->data = null;
                }
                else {
                    $response->status = 200;
                    $response->data = $data;
                    session_start();
                    $_SESSION['type']=$data->type;
                }

            }
            else{
                $response->status = 400;
                $response->data = null;
            }
            break;

        case "POST":

            //echo "usao sam u post deo";
            // POST/user

            $new_user = json_decode(file_get_contents("php://input"));

            //echo "prosao dekodirnanj";
            //  echo json_encode($new_user);
            // TODO: validacija
            // name - dozvoljena slova
            // surname - dozvoljena slova
            // username - treba da bude jedinstveno; dozvoljena su slova, cifre i _; izmedju 5-16
            // email - treba da bude u odgovarajucem formatu
            // password - dozvoljeno je sve; treba da bude izmedju 8 i 32

//            $header = ['alg' => 'HS256', 'typ' => 'JWT'];
//            $payload = ['data' => ['username' => $new_user->username, 'email' => $new_user->email, 'password' => $new_user->pass]];
//            $key = base64_encode(openssl_random_pseudo_bytes(64));
//
//            $jwt = JWT::encode($payload, $key, $header['alg']);

          //  var_dump($jwt);
           // ($pdo,$name,$surname,$username,$pass,$email,$institution,$note)
            if(insertUser($pdo, $new_user->name, $new_user->surname, $new_user->username, $new_user->password, $new_user->email, $new_user->institution, $new_user->note)){

                //$response->data = new StdClass();
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


?>
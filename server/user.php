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
    switch ($method){

        case "GET":

            if($_GET['type'] == 'login') {
                $user = $_GET["username"];
                $pass = $_GET['password'];

                // JWT

                /* header */
                $header = new stdClass();
                $header->alg = "HS256";
                $header->typ = "JWT";
                $header_json = json_encode($header);
                $header_json_base64 = base64_encode($header_json);

                /* payload */
                $payload = new stdClass();
                $payload->password = $pass;
                $payload_json = json_encode($payload);
                $payload_json_base64 = base64_encode($payload_json);

                /* signature */
                $secret = "ovoJeTajna";
                $signature = base64_encode(hash_hmac("sha256",$header_json_base64.".".$payload_json_base64, $secret, true));

                $token = $header_json_base64.".".$payload_json_base64.".".$signature;


                $data = getUser($pdo, $token, $user);
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
                    $_SESSION['name']=$data->name;
                    $_SESSION['surname']=$data->surname;
                    $_SESSION['username']=$data->username;
                    $_SESSION['userId']=$data->userId;
                    $_SESSION['institution']=$data->institution;
                    $_SESSION['lastTime']=time();
                }

            }
            else if($_GET['type'] == 'unique'){
                $username = $_GET["username"];

                $data = exists($pdo, $username);

                if ($data == null) {
                    $response->status = 404;
                    $response->data = "false";
                }
                else {
                    $response->status = 200;
                    $response->data = "true";
                }
            }
            else{
                $response->status = 400;
                $response->data = null;
            }
            break;

        case "POST":

              $new_data = json_decode(file_get_contents("php://input"));

              if($new_data->type === "changepassword"){
                // JWT

                /* header */
                $header = new stdClass();
                $header->alg = "HS256";
                $header->typ = "JWT";
                $header_json = json_encode($header);
                $header_json_base64 = base64_encode($header_json);

                /* payload za staru sifru*/
                $payload = new stdClass();
                $payload->password = $new_data->oldPassword;
                $payload_json = json_encode($payload);
                $payload_json_base64 = base64_encode($payload_json);

                /* signature za staru sifru*/
                $secret = "ovoJeTajna";
                $signature = base64_encode(hash_hmac("sha256",$header_json_base64.".".$payload_json_base64, $secret, true));

                /* token za staru sifru*/
                $token = $header_json_base64.".".$payload_json_base64.".".$signature;

                /* payload za novu sifru*/
                $payload1 = new stdClass();
                $payload1->password = $new_data->newPassword;
                $payload_json1 = json_encode($payload1);
                $payload_json_base64_1 = base64_encode($payload_json1);

                /* signature za novu sifru*/
                $secret1 = "ovoJeTajna";
                $signature1 = base64_encode(hash_hmac("sha256",$header_json_base64.".".$payload_json_base64_1, $secret1, true));

                /* token za novu sifru*/
                $token1 = $header_json_base64.".".$payload_json_base64_1.".".$signature1;

                session_start();
                $username = $_SESSION['username'];

                if(updatePasswordByUsername($pdo, $username, $token, $token1)){
                    //$response->data = new StdClass();

                    $response->status = 200;
                }
                else{
                    $response->status = 400;
                    $response->data = null;
                }
            }else{
              // POST/user
              // $new_user = json_decode(file_get_contents("php://input"));
              // JWT
              /* header */
              $header = new stdClass();
              $header->alg = "HS256";
              $header->typ = "JWT";
              $header_json = json_encode($header);
              $header_json_base64 = base64_encode($header_json);

              /* payload */
              $payload = new stdClass();
              $payload->password = $new_data->password;
              $payload_json = json_encode($payload);
              $payload_json_base64 = base64_encode($payload_json);

              /* signature */
              $secret = "ovoJeTajna";
              $signature = base64_encode(hash_hmac("sha256",$header_json_base64.".".$payload_json_base64, $secret, true));

              $token = $header_json_base64.".".$payload_json_base64.".".$signature;

              if(insertUser($pdo, $new_data->name, $new_data->surname, $new_data->username, $token, $new_data->email, $new_data->institution, $new_data->note)){
                  //$response->data = new StdClass();
                  $response->status = 201;
              }
              else{
                  $response->status = 400;
                  $response->data = null;
              }
            }
            break;

        case "PUT":

            $new_inner = json_decode(file_get_contents("php://input"));

            if(updateTypeByUsername($pdo, $new_inner->username)){
                $response->status = 201;
            }
            else{
                $response->status = 400;
                $response->data = null;
            }
            break;

        case "DELETE":
          session_start();

          if(deleteId($pdo, intval($_SESSION['userId']))){
            $filename = "profilePhotos/".$_SESSION['username']."Avatar.png";

            if(file_exists($filename)) {
              unlink($filename);
            }

            $response->data = "true";
            $response->status = 200;
          }
          else{
            $response->data = null;
            $response->status = 400;
          }

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

<?php

include "cemetery_pdo.php";

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

    /* Obrada podrzanih zahteva */

    $number_of_url_elements = 0;
    $url_elements = array();

    if(isset($_SERVER['PATH_INFO'])){
        $url_elements = explode("/", $_SERVER['PATH_INFO']);
        $number_of_url_elements = count($url_elements)-1;
    }
}

$pdo = Connection::getConnectionInstance();

try{

    //echo "usao sam u try blok";

    switch ($method){

        case "GET":

            switch($number_of_url_elements){
                case 1:
                    if($url_elements[1] == "cemeteries"){
                        $response->data = getAllCemeteries($pdo);
                        //echo "uzeo sam podatke";
                        $response->status = 200;
                    }
                    else{
                        $response->status = 400;
                        $response->data = null;
                    }

                    break;
                case 3:
                    if($url_elements[1] == "cemeteries"){
                        $response->data = getCemeteriesInCountryInRegion($pdo,$url_elements[2],$url_elements[3]);
                        //echo "uzeo sam podatke";
                        $response->status = 200;

                    }
                    else{
                        $response->status = 400;
                        $response->data = null;
                    }
                    break;

            }
            break;
        case 'POST':
            $newCemetery = json_decode(file_get_contents("php://input"));

            if(insertCemeteryWithRegionName($pdo, $newCemetery->cemetery, $newCemetery->region, $newCemetery->description, $newCemetery->additionalData, $newCemetery->longitude, $newCemetery->latitude)){
                $response->status = 201;
            }
            else{
                $response->status = 400;
                $response->data = null;
            }
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
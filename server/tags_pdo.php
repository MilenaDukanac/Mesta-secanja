<?php
/*
    Parametri za povezivanje sa bazom podataka
    korisnicko ime: root;
    sifra: root
    host: localhost
    dbname: centralcemeteries
*/
interface ConnectionData{
    const username = 'root';
    const password = '';
    const host = 'localhost';
    const dbname = 'centralcemeteries';
}

class PDO_DB implements ConnectionData{
    static private $db = NULL;

    private $connection;

    private function __construct(){
    }

    private function __clone(){
    }

    private function __wakeup(){
    }

    public static function getInstance(){
        if(self::$db == NULL){
            self::$db = new PDO_DB();
            self::$db->connection = new PDO('mysql:'.ConnectionData::host.';dbname='.ConnectionData::dbname,
	            				        ConnectionData::username,
                                        ConnectionData::password,
	            				        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        }

	    return self::$db;
    }
	
    //Metoda za kreiranje dodatnih oznaka
	
    public function insertTag($id,$name,$categoryId){

        $query = "insert into centralcemeteries.tags values(:id,:name,:categoryId);";

		$stmt = self::$db->connection->prepare($query);
		
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->bindParam(":name", $name, PDO::PARAM_STR);
		$stmt->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);
        
        if($stmt->execute())
			return self::$db->connection->lastInsertId();
		else 
			return -1;
    }

	//Metoda koja vraca sve oznake
	
	public function getAllTags() {
		
		$query = "select * 
				  from centralcemeteries.tags";
				  
		$stmt = self::$db->connection->prepare($query);
		
		if($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        else 
            return -1;
	}

	//Metoda koja vraca tag sa datim identifikatorom
	public function getTag($id) {
		
		$query = "select * 
				  from centralcemeteries.tags 
				  where id=:id";
				  
		$stmt = self::$db->connection->prepare($query);
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		
		if($stmt->execute())
            return $stmt->fetch(PDO::FETCH_OBJ);
        else 
            return FALSE;
	}
	
	//Metoda koja vrsi filtriranje po nekoj oznaci
   
    public function getPhotos($tag_id){

        $query = "select p.id 
				from centralcemeteries.photo p 
				join centralcemeteries.photo_tags pt on pt.photoId = p.id 
				join centralcemeteries.tags t on pt.tagId = t.id
				where t.id=:tag_id"; 

        $stmt = self::$db->connection->prepare($query);

        $stmt->bindParam(":tag_id", $tag_id, PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }else{
            return FALSE;
        }
    }
}

try{
     $pdo = PDO_DB::getInstance();

//    //getTag test
//    $tag_id = 4;
//    $tag_info = $pdo->getTag($tag_id);
//    var_dump($tag_info);

    //$insert_tag = $pdo->insertTag(3,"day",10);
    //var_dump($insert_tag);

 //$all_tags = $pdo->getAllTags();
 //var_dump($all_tags);
 $tag=$pdo->getTag(1);
 var_dump($tag);

}catch(PDOException $e){
    echo $e->getMessage();
    unset($pdo);
}

?>
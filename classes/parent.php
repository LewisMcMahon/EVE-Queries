<?
    /*Parent classes all classes should be derived from
     */
    
    class InheritedFunctions {
        
        function getDB(){
            
            $db = array(
                "driver" => "mysql:host=localhost;dbname=eve-queries",
                "username" => "root",
                "password" => ""
            );
            
            return $db;
        }
        
    }
     
    class Atribute extends InheritedFunctions{
        //the class name of any atributes that must also be included if this atribute is used ie date range
        //must be an aray even if just 1 atribute       
        public $requredAtributes = false;
        //the datasets that use the atribute
        public $dataSetsContaining = false;
        
    }
    
    class Operator {
        
        public $type = false;
        public $name = false;
        
    }
    
    class DataSet {
        
        public $format = false;
        public $name = false;
        public $order = false;
        
    }
    
    class Query {
        
        public $query = false;
        public $name = false;
        
    }
    
    class SolarSystem extends Atribute{
        public $name = false;        
        public $dataSetsContaining = array("EVEDBDump","EVEAPI","ZKill");
        
        public function getID($name)
        {
            $dbsettings = $this->getDB();
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="SELECT solarSystemID FROM mapsolarsystems WHERE solarSystemName = :system";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':system' => $name));
            
            if ($count = $stmt->rowCount() < 1){
                
                return false;
                
            }
            else{
            
                $row=$stmt->fetchObject();
                
                $systemID = trim($row->solarSystemID);
                
                return $systemID;
                
            }
        }
    
        public function autoComplete($term,$limit){
        
            if(preg_match('/[^A-Za-z]/', $term)){
                return false;
                exit;
            }
            
            if(preg_match('/[^0-9]/', $limit)){
                return false;
                exit;
            }
            
            $term = $term."%";
        
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="select solarSystemName from mapsolarsystems where solarSystemName like :term LIMIT :limit";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':term' => $term,
                ':limit' => $limit));
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                array_push($return,array('label'=>$row['solarSystemName'],'value'=>$row['solarSystemName']));
            
            }
            
            return json_encode($return);
        }
    }
    
    class Region extends Atribute{
        public $name = false;        
        public $dataSetsContaining = array("EVEDBDump","EVEAPI","ZKill");
        
        public function getID($name)
        {
            $dbsettings = $this->getDB();
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="SELECT regionID FROM mapregions WHERE regionName = :region";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':region' => $name));
            
            if ($count = $stmt->rowCount() < 1){
                
                return false;
                
            }
            else{
            
                $row=$stmt->fetchObject();
                
                $regionID = trim($row->regionID);
                
                return $regionID;
                
            }
        }
    
        public function autoComplete($term,$limit){
        
            if(preg_match('/[^A-Za-z]/', $term)){
                return false;
                exit;
            }
            
            if(preg_match('/[^0-9]/', $limit)){
                return false;
                exit;
            }
            
            $term = $term."%";
            
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="select regionName from mapregions where regionName like :term LIMIT :limit";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':term' => $term,
                ':limit' => $limit));
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                array_push($return,array('label'=>$row['regionName'],'value'=>$row['regionName']));
            
            }
            
            return json_encode($return);
        }
    }
      
    class Corporation extends Atribute{
        public $name = false;
        public $dataSetsContaining = array("EVEAPI","ZKill","EVEWho");
    }
    
    class Alliance extends Atribute{
        public $name = false;
        public $dataSetsContaining = array("EVEAPI","ZKill","EVEWho");
    }
    
    class Character extends Atribute{
        public $name = false;
        public $dataSetsContaining = array("EVEAPI","ZKill","EVEWho");
    }
    
    class Ship extends Atribute{
        public $name = false;
        public $dataSetsContaining = array("EVEDBDump","EVEAPI","ZKill");
        
        public function getID($name)
        {
            $dbsettings = $this->getDB();
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="SELECT typeID FROM invtypes WHERE typeName like :ship";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':ship' => $name));
            
            if ($count = $stmt->rowCount() < 1){
                
                return false;
                
            }
            else{
            
                $row=$stmt->fetchObject();
                
                $regionID = trim($row->typeID);
                
                return $regionID;
                
            }
        }
        
        public function autoComplete($term,$limit){
        
            if(preg_match('/[^A-Za-z]/', $term)){
                return false;
                exit;
            }
            
            if(preg_match('/[^0-9]/', $limit)){
                return false;
                exit;
            }
            
            $term = $term."%";
            
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="select typeName from invtypes where typeName like :term LIMIT :limit";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':term' => $term,
                ':limit' => $limit));
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                array_push($return,array('label'=>$row['typeName'],'value'=>$row['typeName']));
            
            }
            
            return json_encode($return);
        }
    }
    
    class ShipGroup extends Atribute{
        public $name = false;
        public $dataSetsContaining = array("EVEDBDump","EVEAPI","ZKill");
        
        public function getID($name)
        {
            $dbsettings = $this->getDB();
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="SELECT groupID FROM invgroups WHERE groupName like :ShipGroup";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':ShipGroup' => $name));
            
            if ($count = $stmt->rowCount() < 1){
                
                return false;
                
            }
            else{
            
                $row=$stmt->fetchObject();
                
                $regionID = trim($row->groupID);
                
                return $regionID;
                
            }
        }
        
        public function autoComplete($term,$limit){
        
            if(preg_match('/[^A-Za-z]/', $term)){
                return false;
                exit;
            }
            
            if(preg_match('/[^0-9]/', $limit)){
                return false;
                exit;
            }
            
            $term = $term."%";
            
            $dbh = new PDO($dbsettings["driver"],$dbsettings["username"],$dbsettings["password"]);
            
            $query="select groupName from invgroups where groupName like :term LIMIT :limit";
                    
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                ':term' => $term,
                ':limit' => $limit));
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                array_push($return,array('label'=>$row['groupName'],'value'=>$row['groupName']));
            
            }
            
            return json_encode($return);
        }
    }
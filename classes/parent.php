<?
    /*Parent classes all classes should be derived from
     */
     
    interface IAtribute {
        //the class name of any atributes that must also be included if this atribute is used ie date range
        //must be an aray even if just 1 atribute       
        public $requredAtributes;
        
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
    
    class SolarSystem implements IAtribute{
        public $requredAtributes = false;
    }
      
    class Corporation implements IAtribute{
        public $requredAtributes = false;
    }
    
    class Alliance implements IAtribute{
        public $requredAtributes = false;
    }
    
    class Character implements IAtribute{
        public $requredAtributes = false;
    }
    
    class Ship implements IAtribute{
        public $requredAtributes = false;
    }
    
    class ShipType implements IAtribute{
        public $requredAtributes = false;
    }
    
    

<?php

    class EVEAPI extends DataSet{
        
        public $format = "xml";
        public $order = "2";
        
    }

    //atributes    
    class EVEAPI_SolarSystem extends SolarSystem{
        public $requredAtributes = false;
    }
     
    class EVEAPI_Corporation extends Corporation{
        public $requredAtributes = false;
    }
    
    class EVEAPI_Alliance extends Alliance{
        public $requredAtributes = false;
    }
    
    class EVEAPI_Character extends Character{
        public $requredAtributes = false;
    }
    
    class EVEAPI_Ship extends Ship{
        public $requredAtributes = false;
    }
    
    class EVEAPI_ShipType extends ShipType{
        public $requredAtributes = false;
    }
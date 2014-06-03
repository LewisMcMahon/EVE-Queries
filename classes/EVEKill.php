<?php

    class EVEKill extends DataSet{
        
        public $format = "xml";
        public $order = "3";
        
    }
    
    //atributes    
    class EVEKill_SolarSystem extends EVEKill{
        public $requredAtributes = false;
    }
      
    class EVEKill_Corporation extends EVEKill{
        public $requredAtributes = false;
    }
    
    class EVEKill_Alliance extends EVEKill{
        public $requredAtributes = false;
    }
    
    class EVEKill_Character extends EVEKill{
        public $requredAtributes = false;
    }
    
    class EVEKill_Ship extends EVEKill{
        public $requredAtributes = false;
    }
    
    class EVEKill_ShipType extends EVEKill{
        public $requredAtributes = false;
    }    
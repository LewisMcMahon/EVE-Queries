<?php

    class ZKill extends DataSet{
        
        public $format = "xml";
        public $order = "3";
        
    }
    
    //atributes    
    class ZKill_SolarSystem extends SolarSystem{
        public $requredAtributes = false;
    }
    
    class ZKill_Region extends Region{
        public $requredAtributes = false;
    }
      
    class ZKill_Corporation extends Corporation{
        public $requredAtributes = false;
    }
    
    class ZKill_Alliance extends Alliance{
        public $requredAtributes = false;
    }
    
    class ZKill_Character extends Character{
        public $requredAtributes = false;
    }
    
    class ZKill_Ship extends Ship{
        public $requredAtributes = false;
    }
    
    class ZKill_ShipGroup extends ShipGroup{
        public $requredAtributes = false;
    }    
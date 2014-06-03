<?php

    class EVEDBDump extends DataSet{
        
        public $format = "mysql";
        public $order = "1";
        
    }
    
    //atributes    
    class EVEDBDump_SolarSystem extends SolarSystem {
        public $requredAtributes = false;
    }
    
     class EVEDBDump_Region extends Region {
        public $requredAtributes = false;
    }
    
    class EVEDBDump_Ship extends Ship {
        public $requredAtributes = false;
    }
    
    class EVEDBDump_ShipGroup extends ShipGroup {
        public $requredAtributes = false;
    }
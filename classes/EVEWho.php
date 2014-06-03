<?php

    class EVEWho extends DataSet{
        
        public $format = "xml";
        public $order = "4";
        
    }

    //atributes
    class EVEWho_Corporation extends Corporation{
        public $requredAtributes = false;
    }
    
    class EVEWho_Alliance extends Alliance{
        public $requredAtributes = false;
    }
    
    class EVEWho_Character extends Character{
        public $requredAtributes = false;
    }
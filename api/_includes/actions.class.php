<?php

class actions extends connectDb{

    protected $_now;
    
	public function __construct() {
		parent::__construct();
		$this->_now = date("Y-m-d H:i:s");
	}
	
	public function __destruct() {
		parent::__destruct();
	}

    public function traceUpdate($token,$version){
        
        //si deja en base, nous ne faison rien
        $q_exist = "SELECT count(*) as nb from oko_update where apptoken='$token' and version='$version'";
        $this->log->debug($q_exist);
        
        $exist = $this->query($q_exist);     
        
        if($exist){
			$res = $exist->fetch_object();
	    	
	    	if ($res->nb == 0) {
	    	    //si pas deja en base alors on l'ajoute
	    	    $insert = "INSERT INTO oko_update set date='$this->_now', apptoken='$token', version='$version'";
                $this->log->debug($insert);
                $this->query($insert);
                
                echo "done";
	    	}else{
	    	    $this->log->debug("Déjà en base $token :: $version");
	    	}
        }
         
    }
    

    
    
    
    
}
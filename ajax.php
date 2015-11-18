<?php
/*****************************************************
* Projet : Okovision - Supervision chaudiere OeKofen
* Auteur : Stawen Dronek
* Utilisation commerciale interdite sans mon accord
******************************************************/

include_once 'config.php';

function is_ajax() {
  //return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
  return true;
}

function is_valid(){
  return ( strcmp(session::getInstance()->getVar('sid'),$_GET['sid']) == 0 )?true:false;
}

if (is_ajax() && is_valid()) {
	
		if (isset($_GET['type']) && isset($_GET['action']) ){
			/*
			* TODO
			* Ajotuer ici un control pour savoir si l'utilisateur en cours a le droit d'appeler les fonctions suivantes
			*/
			switch ($_GET['type']){
    			case "admin":
    				$a = new administration();
    				
    				switch ($_GET['action']){
    				    case "testIp":
    				        if( isset( $_GET['ip'] ) ){
    				            $a->ping($_GET['ip']);
    				        }
    				        break; 
    				    case "saveInfoGe":
    				        $a->saveInfoGenerale($_POST);
    				        break;
    				    case "getFileFromChaudiere":
    				        $a->getFileFromChaudiere();
    				        break; 
                        case "importFileFromChaudiere":
                            $a->importFileFromChaudiere($_POST);
                            break;
                        case "importFileFromUpload":
                            $a->importFileFromUpload($_POST);
                            break;
                        case "uploadCsv":
                        	$a->uploadCsv($_POST,$_FILES);
                            break;
                        case "getHeaderFromOkoCsv":
                        	$a->getHeaderFromOkoCsv();
                        	break;
                        case "statusMatrice":
                        	$a->statusMatrice();
                        	break;
                        case "importcsv":
                        	$a->importcsv();
                        	break;
                        case "getSaisons":
                        	$a->getSaisons();
                        case "existSaison":
                        	if( isset( $_GET['date'] ) ){
                        		$a->existSaison($_GET['date']);
                        	}
                        	break;
                        case "setSaison":
                        	$a->setSaison($_POST);
                        	break;
                        case "deleteSaison":
                        	$a->deleteSaison($_POST);
                        	break;
                        case "updateSaison":
                        	$a->updateSaison($_POST);
                        	break;
                        case "makeSyntheseByDay":
                            $a->makeSyntheseByDay($_GET['date']);
                            break;
                        case "getDayWithoutSynthese":
                            $a->getDayWithoutSynthese();
                            break;
                        case "checkUpdate":
                            $a->checkUpdate();
                            break;
                        case "makeUpdate":
                            $a->makeUpdate();
                            break;
                        case "getVersion":
                            $a->getVersion();
                            break;
                        case "getFileFromTmp":
                            $a->getFileFromTmp();
                            break;
                        case "importFileFromTmp":
                            if( isset( $_GET['file'] ) ){
                                $a->importFileFromTmp($_GET['file']);
                            }
                            break;
                        case "getDateForMigrate":
                            $a->getDateForMigrate();
                            break;
                        case "migrateDataForDate":
                            if( isset( $_GET['jour'] ) ){
                                $a->migrateDataForDate($_GET['jour']);
                            }
                            break;
                        case "login":
                            $a->login($_POST['user'],$_POST['pass']);
                            break;
                        case "logout":
                            $a->logout();
                            break;
    				}
    				break; 
    			case "graphique":
    				$g = new gstGraphique();
    				
    				switch ($_GET['action']){
    					case "getLastGraphePosition":
    						$g->getLastGraphePosition();
    						break;
    					case "grapheNameExist":
    						if( isset( $_GET['name'] ) ){
    							$g->grapheNameExist($_GET['name']);
    						}
    						break;
    					case "addGraphe":
    						$g->addGraphe($_POST);
    						break;
    				    case "getGraphe":
    				    	$g->getGraphe();
    				    	break;
    				    case "updateGraphe":
    				    	$g->updateGraphe($_POST);
    				    	break;
    				    case "updateGraphePosition":
    				        $g->updateGraphePosition($_POST);
    				        break;
    				    case "deleteGraphe":
    				    	$g->deleteGraphe($_POST);
    				    	break;
    				    case "getCapteurs":	
    				    	$g->getCapteurs();
    				    	break;
    				    case "grapheAssoCapteurExist":
    				    	$g->grapheAssoCapteurExist($_GET['graphe'],$_GET['capteur']);
    				    	break;
    				    case "addGrapheAsso":
    				    	$g->addGrapheAsso($_POST);
    				    	break;
    				    case "getGrapheAsso":
    				    	$g->getGrapheAsso($_GET['graphe']);
    				    	break;
    				    case "updateGrapheAsso":
    				    	$g->updateGrapheAsso($_POST);
    				    	break;
    				    case "updateGrapheAssoPosition":
    				        $g->updateGrapheAssoPosition($_POST);
    				        break;
    				    case "deleteAssoGraphe":
    				    	$g->deleteAssoGraphe($_POST);
    				    	break;
    				    	
    				    	
    				}
    				break;
    			case "rendu":
    			    $r = new rendu();
    				switch ($_GET['action']){
    				    case "getGraphe":
    						$g = new gstGraphique();
    						$g->getGraphe();
    						break;
    					case "getGrapheData":
    						$r->getGrapheData($_GET['id'],$_GET['jour']);
    						break;
    					case "getIndicByDay":
    					    if(isset($_GET['timeStart']) && isset($_GET['timeEnd'])){
    					        //$r->getIndicByDay($_GET['jour'],(int)($_GET['timeStart'] / 1000),(int)($_GET['timeEnd'] / 1000));
    					        $r->getIndicByDay($_GET['jour'], $_GET['timeStart'], $_GET['timeEnd']);
    					    }else{
    					        $r->getIndicByDay($_GET['jour']);
    					    }
    					    break;
    					case "getIndicByMonth":
    					    $r->getIndicByMonth($_GET['month'],$_GET['year']); 
    					    break;
    					case "getHistoByMonth":
    					    $r->getHistoByMonth($_GET['month'],$_GET['year']);
    					    break;
    					case "getTotalSaison":
    					    $r->getTotalSaison($_GET['saison']);
    					    break;
    					case "getSyntheseSaison":
    					    $r->getSyntheseSaison($_GET['saison']);
    					    break;
    					case "getSyntheseSaisonTable":
    					    $r->getSyntheseSaisonTable($_GET['saison']);
    					    break;
    					   
    				}
    				break;
    		}		
	    }

}else{
    if(!is_ajax()){
        echo '<pre>xmlhttprequest needed ! </pre>';
    }
    if(!is_valid()){
        header("Content-type: text/json; charset=utf-8");
		echo '{"response": false,"sessionToken": "invalid"}';
    }
}

?>
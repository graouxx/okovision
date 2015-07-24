<?php

/*****************************************************
* Projet : Okovision - Supervision chaudiere OeKofen
* Auteur : Stawen Dronek
* Utilisation commerciale interdite sans mon accord
******************************************************/
	
	function is_ajax() {
	  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	
	function testBddConnection($s){
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		$r = true;
		
		try{
			$db = new mysqli($s['db_adress'], $s['db_user'], $s['db_password'], 'mysql');
		} catch (Exception $e ) {
			$r=false;
     		
		}
		$t['response'] = $r;
        header("Content-type: text/json");
		echo json_encode($t, JSON_NUMERIC_CHECK);
		
		exit;
	}
	
	function makeInstallation($s){
	    /* create BDD */
	    $mysqli = new mysqli($s['db_adress'], $s['db_user'], $s['db_password'], 'mysql');

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        
        
        
        /* execute multi query */
        $mysqli->multi_query(file_get_contents('install/install.sql'));
        
        /* init de la table des dates de reference */
        $start_day = mktime(0, 0, 0, 9  , 1, 2014); //1er septembre 2014
		$stop_day = mktime(0, 0, 0, 9  , 1, 2037); //justqu'au 1er septembre 2037, on verra en 2037 si j'utilise encore l'app.
		$nb_day = ($stop_day - $start_day)/86400;
		$query = "";
		for ($i = 0; $i<= $nb_day; $i++){
			$day = date('Y-m-d' ,mktime(0, 0, 0, date("m",$start_day)  , date("d",$start_day)+$i, date("Y",$start_day)) );
			$query .= "INSERT INTO oko_dateref (jour) VALUES ('".$day."');";
			/* execute multi query */
        	$mysqli->multi_query($query);
		}
	
        
        
        $mysqli->close();
	    
	    /* Make Config.php */
        $configFile = file_get_contents('config_sample.php');
        
        $configFile = str_replace("###_BDD_IP_###",$s['db_adress'],$configFile);
        $configFile = str_replace("###_BDD_USER_###",$s['db_user'],$configFile);
        $configFile = str_replace("###_BDD_PASS_###",$s['db_password'],$configFile);
        /*
        $configFile = str_replace("###_FTP_SERVEUR_###",$s['ftp_adress'],$configFile);
        $configFile = str_replace("###_FTP_USER_###",$s['ftp_user'],$configFile);
        $configFile = str_replace("###_FTP_PASS_###",$s['ftp_password'],$configFile);
        $configFile = str_replace("###_FTP_DEPOT_###",$s['ftp_depot'],$configFile);
        */
        $configFile = str_replace("###_CONTEXT_###",getcwd(),$configFile);
        
        file_put_contents('config.php',$configFile);
        
        /* Make config.json */
        $param = array(
                        "chaudiere"                 => $s['oko_ip'],
                        "tc_ref"                    => $s['param_tcref'],
                        "poids_pellet"              => $s['param_poids_pellet'],
                        "surface_maison"            => $s['surface_maison'],
                        "get_data_from_chaudiere"   => $s['oko_typeconnect'],
                        "send_to_web"               => "0"
                    );
        
        file_put_contents('config.json',json_encode($param, JSON_UNESCAPED_SLASHES));
        
        
	}
	
	
	
	if (is_ajax()) {
		
		if (isset($_GET['type'])  ){
		
			switch ($_GET['type']){
				case "connect":
					testBddConnection($_POST);
					break;
				case "install":
				    makeInstallation($_POST);
				    break;
				
			}		
		}
	}
	
?>

<?php
	include('_templates/header.php');
?>
<div class="container theme-showcase" role="main">
		<div class="page-header" align="center">
			<h2>Installation Okovision</h2> <br>
		</div>
		<div>
			<h2><small>Vous allez renseigner les informations necessaires pour le stockage de vos données, ainsi que les premiers elements liés à votre installation</small></h2>
			<h3><small>Vous pourrez modifier ces informations, après l'installation, via l'écran de parametres</small></h3>
			<p>(*) Obligatoire </p> 
		</div>
		
		
			<fieldset>
				<form class="form-horizontal" id="formConnect">
				<!-- Form Name -->
					<legend>Connexion à votre base de donnée</legend>
					
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="db_adress">Adresse de la base (*) :</label>  
					  <div class="col-md-3">
					  <input id="db_adress" name="db_adress" type="text" placeholder="ex : localhost, 192.168.xxx.xxx" class="form-control input-md" required="">
					  <span class="help-block"></span>  
					  </div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="db_user">Utilisateur de connexion (*) :</label>  
					  <div class="col-md-3">
					  <input id="db_user" name="db_user" type="text" placeholder="ex: root" class="form-control input-md" required="">
					  </div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="db_password">Mot de passe (*) :</label>  
					  <div class="col-md-3">
					  <input id="db_password" name="db_password" type="text" placeholder="ex : toor" class="form-control input-md" required="">
					  </div>
					</div>
					
					<!-- Button -->
					<label class="col-md-4 control-label"  for="bt_testConnection">Tester la connexion :</label>
					  <div class="col-md-3">
					    <button id="bt_testConnection" name="bt_testConnection" class="btn btn-primary" type="button">Tester</button>
					  </div>
					</form>
			</fieldset>
			

			<form class="form-horizontal">
				<fieldset>
				
				<!-- Form Name -->
					<legend>Communication avec votre chaudiere</legend>
					
					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="oko_typeconnect">Mode de récupération du fichier CSV :</label>
					  <div class="col-md-3">
					    <select id="oko_typeconnect" name="oko_typeconnect" class="form-control">
					        <option value="0">USB</option>
			                <option value="1">IP</option>
					    </select>
					  </div>
					</div>
					
					<!-- Text input-->
					<div class="form-group" id="form-ip" style="display: none;">
					  <label class="col-md-4 control-label" for="oko_ip">Adresse IP de votre chaudière :</label>  
					  <div class="col-md-3">
					    <input id="oko_ip" name="oko_ip" type="text" placeholder="ex : 192.168.0.xx" class="form-control input-md">
					  </div>
					</div>
				
				</fieldset>
			</form>

			<form class="form-horizontal">
				<fieldset>
				
				<!-- Form Name -->
					<legend>Parametrage de l'application</legend>
					
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="param_tcref">T°C de reference :</label>  
					  <div class="col-md-3">
					  <input id="param_tcref" name="param_tcref" type="text" placeholder="ex : 20" class="form-control input-md" required="" value="20">
					  <span class="help-block">Si vous avez 2 consignes, réduit à 19 et confort à 21, vous faites la moyenne -&gt; 20. Ceci est pour le calcul du DJU</span>  
					  </div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="param_poids_pellet">Poids pellet pour 60 secondes de vis : </label>  
					  <div class="col-md-3">
					  <input id="param_poids_pellet" name="param_poids_pellet" type="text" placeholder="ex : 150" class="form-control input-md" required=""  value="150">
					  <span class="help-block">Poids de pellet mesuré par un fonctionnement de la vis d'alimentation du foyer pendant 60 secondes</span>  
					  </div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="parap_poids_pellet">Surface de la maison : </label>  
					  <div class="col-md-3">
					  <input id="surface_maison" name="param_surface" type="text" placeholder="ex : 180" class="form-control input-md" required=""  value="180">
					  <span class="help-block">en m²</span>  
					  </div>
					</div>
				
				</fieldset>
			</form>
            
            	<!-- Button -->
					
					  <div class="col-md-12" align="center">
					    <button id="bt_install" name="bt_install" class="btn btn-primary" type="button">Installer</button>
					  </div>

<?php
include('_templates/footer.php');
?>
<!--appel des scripts personnels de la page -->
	<script src="js/setup.js"></script>
    </body>
</html>
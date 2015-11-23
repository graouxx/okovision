<?php
include_once 'config.php';

if (isset($_POST['token']) && isset($_POST['version']) ){
    
    $r = new actions();
    $r->traceUpdate($_POST['token'],$_POST['version']);
   
}else{
    echo "Nothing here";
}



?>
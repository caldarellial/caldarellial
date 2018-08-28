<?php
include_once("datafetch.php");

define('AC_SERVERNAME',"localhost");
define('AC_USERNAME',"testuser");
define('AC_PASSWORD',"testpass");
define('AC_DBNAME',"caldarellial");

function Errored($code=0,$message="",$extraargs=[],$request="",$arguments=""){
	$errorarr = ["error"=>$message,"errorcode"=>$code];
	foreach ($extraargs as $key=>$val){
		$errorarr[$key] = $val;
	}
	die(json_encode($errorarr));
}

function Success($return,$extrareturns=[]){
	$fullreturn = ["success"=>$return];
	
	foreach ($extrareturns as $key=>$val){
		$fullreturn[$key] = $val;
	}
	
	die(json_encode($fullreturn));
}
?>
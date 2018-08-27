<?php
include_once("datafetch.php");

define('AC_SERVERNAME',"localhost");
define('AC_USERNAME',"testuser");
define('AC_PASSWORD',"testpass");
define('AC_DBNAME',"caldarellial");

function Errored($code=0,$message="",$extraargs=[],$request="",$arguments=""){
	$conn = new mysqli(RELIGIO_SERVERNAME, RELIGIO_USERNAME, RELIGIO_PASSWORD, RELIGIO_DBNAME);
	$sql = "INSERT INTO ErrorLogs(session,request,code,message,arguments) VALUES(?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sssss",$tkn,$req,$code,$message,$arg);
	$posted = $GLOBALS["_POST"];
	$tkn = isset($posted["token"])?$posted["token"]:"";
	$fileList = get_included_files();
	$req = ($request=="")?basename($fileList[count($fileList)-1],".php"):$request;
	
	$ignoreCalls = [];
	
	if (array_search($req,$ignoreCalls)!==false){
		$stmt->close();
		return;
	}
	
	$args = [];
	foreach ($_POST as $key=>$val){
		if ($key == "password"){continue;}
		$args[$key] = $val;
	}
	
	$arg = ($arguments=="")?json_encode($args):json_encode($arguments);
	
	$stmt->execute();
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
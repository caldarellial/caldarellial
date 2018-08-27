<?php
	function getObjectInfo($type,$typeid,$preventloop=false){
		$conn = new mysqli(AC_SERVERNAME, AC_USERNAME, AC_PASSWORD, AC_DBNAME);
        
        return isset($retobj)?$retobj:false;
    }
?>
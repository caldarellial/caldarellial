<?php
	function getObjectInfo($type,$typeid,$preventloop=false){
		$conn = new mysqli(AC_SERVERNAME, AC_USERNAME, AC_PASSWORD, AC_DBNAME);
        
		switch($type){
			case "project":
				$stmt = $conn->prepare("
					SELECT
					title,
					image_default,
					image_active,
					color,
					description,
					url
					FROM
					Projects
					WHERE id = ? OR (? = 0)
				");
				
				$stmt->bind_param("ii",$typeid,$typeid);
				$stmt->bind_result($rTitle,$rImageDefault,$rImageActive,$rColor,$rDescription,$rUrl);
				$stmt->execute();
				$stmt->store_result();
				while($stmt->fetch()){
					$retobj = [
						"id"=>$rId,
						"image_default"=>$rImageDefault,
						"image_active"=>$rImageActive,
						"color"=>$rColor,
						"description"=>$rDescription,
						"url"=>$rUrl
					];
				}
				break;
			default:
				$retobj = false;
				break;
		}
		
        return isset($retobj)?$retobj:false;
    }
?>
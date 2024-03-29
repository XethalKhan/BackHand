<?php
	define("SUBFOLDER", substr($_SERVER["SCRIPT_NAME"], 0, strrpos($_SERVER["SCRIPT_NAME"], '/')));
	define("BASE_FILE", $_SERVER["DOCUMENT_ROOT"] . SUBFOLDER);
	define("BASE_HREF", $_SERVER["HTTP_HOST"] . SUBFOLDER);
	define("DATABASE", env("DATABASE"));
	define("DBHOST", env("DBHOST"));
	define("UNAUTHORIZED_USER", env("UNAUTHORIZED_USER"));
	define("UNAUTHORIZED_PASS", env("UNAUTHORIZED_PASS"));
	define("LOG", env("LOG"));
	define("STATISTICS", env("STATISTICS"));

	function env($find){
		$envConf = file(BASE_FILE . "/config/.env");
		$val = "";
		foreach($envConf as $row){
			$data = explode("=", trim($row));
			if($data[0] == $find){
				$val = $data[1];
			}
		}
		return $val;
	}

?>
<?php
	namespace responder;

	require_once("action/Action.php");
	require_once("entities/Entity.php");

	use action\Action as Action;
	use entities\Entity as Entity;

	class ResponderFactory{

		public static function getResponder(Action $a, array $e){
			//var_dump($a->getHeaders()["Accept"]);
			//if(in_array("application/json", $a->getHeaders()["Accept"])){
				require_once("responder/ResponderJSON.php");
				return new ResponderJSON($a, $e);
			//}
		}

	}
?>
<?php
	namespace responder;

	require_once("action/Action.php");
	require_once("entities/Entity.php");

	use action\Action as Action;
	use entities\Entity as Entity;

	class Responder{

		private $a;
		private $e;

		public function __construct(Action $a, array $e){
			$this->a = $a;
			$this->e = $e;
		}

		protected function getAction(){
			return $this->a;
		}

		protected function getData(){
			return $this->e;
		}

		public function send(){
			var_dump($e);
		}

	}

?>
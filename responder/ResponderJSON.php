<?php
	namespace responder;

	require_once("action/Action.php");
	require_once("entities/Entity.php");
	require_once("responder/Responder.php");

	use action\Action as Action;
	use entities\Entity as Entity;
	use responder\Responder;

	class ResponderJSON extends Responder{

		public function __construct(Action $a, array $e){
			parent::__construct($a, $e);
		}

		private function set_response_code(){
			if($this->getAction()->getMethod() === "GET"){
				http_response_code(200);
			}
			else if($a->getMethod() === "POST"){
				http_response_code(201);
			}
		}

		private function set_headers(){
			header("Content-type: application/json");
		}

		private function parse(){
			
			if(count($this->getData()) === 1){
				echo json_encode($this->getData());
			}else{
				echo json_encode($this->getData());
			}
			
		}

		public function send(){
			$this->set_response_code();
			$this->set_headers();
			$this->parse();
		}

	}

?>
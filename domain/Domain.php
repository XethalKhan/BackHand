<?php

	namespace domain;

	class Domain{
		private $method;
		private $id;

		public function __construct($method = "GET", $id = 0){
			$this->method = $method;
			$this->id = $id;
		}

		protected function get(){

		}

		protected function getID($id){

		}

		protected function post(){

		}

		public final function handle(){
			if($this->method === "GET"){
				if($this->id === 0){
					return $this->get();
				}else{
					return $this->getID($this->id);
				}
			}
		}
	}

?>
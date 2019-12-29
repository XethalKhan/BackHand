<?php

	namespace action;

	require_once("action/ActionException.php");

	use action\ActionException;

	class Action{

		private $method;
		private $resource;
		private $headers;
		private $body;

		private $filter;

		public function __construct(){
			$this->method = $_SERVER['REQUEST_METHOD'];
			$this->resource = substr($_SERVER['REQUEST_URI'], strlen(SUBFOLDER) + 1);

			if(strpos($this->resource, "?") !== false){
				$this->resource = substr($this->resource, 0, strpos($this->resource, "?"));
			}

			$this->filter = explode("&", substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?") + 1));
			$this->headers = getallheaders();
			$this->body = file_get_contents('php://input');
		}

		public function check(){
			if($this->method === "POST"){
				throw new ActionException($this->method . " is not valid HTTP method", 400, null, $this);
			}
		}

		public function getMethod(){
			return $this->method;
		}

		public function getResource(){
			return $this->resource;
		}

		public function getHeaders(){
			return $this->headers;
		}

	}

?>
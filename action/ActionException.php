<?php

	namespace action;

	use Exception;
	use action\Action;

	class ActionException extends Exception{

		private $a;

		public function __construct($message, $code = 0, Exception $previous = null) {
	        parent::__construct($message, $code, $previous);
	    }

	    public function setAction(Action $a){
	    	$this->a = $a;
	    }
	}

?>
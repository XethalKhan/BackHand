<?php

	namespace entities;

	abstract class Entity{
		private $id;

		public function __construct($id = 0){
			$this->id = $id;
		}

		public function getID(){
			return $this->id;
		}
	}
?>
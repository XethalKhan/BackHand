<?php

	namespace entities;

	require_once("entities/Entity.php");

	use entities\Entity;

	class Product extends Entity{

		public $name;
		public $short_desc;
		public $long_desc;
		public $category_id;
		public $unit;
		public $unit_price;
		public $unit_in_stock;
		public $unit_on_order;
		public $discount;
		public $img;
		public $status;
		public $creation_date;

		public function __construct(
			$id = 0,
			$name = "",
			$short_desc = "",
			$long_desc = "",
			$category_id = 0,
			$unit = "",
			$unit_price = 0,
			$unit_in_stock = 0,
			$unit_on_order = 0,
			$discount = 0,
			$img = "",
			$status = 0,
			$creation_date = ""
		){
			parent::__construct($id);
			$this->name = $name;
			$this->short_desc = $short_desc;
			$this->long_desc = $long_desc;
			$this->category_id = (int)$category_id;
			$this->unit = $unit;
			$this->unit_price = (double)$unit_price;
			$this->unit_in_stock = (int)$unit_in_stock;
			$this->unit_on_order = (int)$unit_on_order;
			$this->discount = (double)$discount;
			$this->img = $img;
			$this->status = (int)$status;
			$this->creation_date = $creation_date;
		}

	}

?>
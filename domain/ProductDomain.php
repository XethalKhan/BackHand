<?php

	namespace domain;

	require_once("domain/Domain.php");
	require_once("entities/Product.php");

	use domain\Domain;
	use entities\Product as Product;

	class ProductDomain extends Domain{

		public function __construct($method = "GET", $id = 0)
	    {
	        parent::__construct($method, $id);
	    }

		protected function get(){
			global $conn;

			$stmt = $conn->prepare("SELECT * FROM product");

			if($stmt->execute()){
				$p = array();

				while($row = $stmt->fetch()){
					$p[] = new Product(
						$row->id,
						$row->name,
						$row->short_desc,
						$row->long_desc,
						$row->cat_id,
						$row->unit,
						$row->unit_price,
						$row->unit_in_stock,
						$row->unit_on_order,
						$row->discount,
						$row->img,
						$row->status,
						$row->creation_date
					);
				}

				return $p;
			}else{
				return false;
			}
		}

		protected function getID($id){
			global $conn;

			$stmt = $conn->prepare("SELECT * FROM product WHERE id = :pid");
			$stmt->bindParam(":pid", $id);

			if($stmt->execute()){
				$row = $stmt->fetch();
				
				return 
					array(
						new Product(
							$row->id,
							$row->name,
							$row->short_desc,
							$row->long_desc,
							$row->cat_id,
							$row->unit,
							$row->unit_price,
							$row->unit_in_stock,
							$row->unit_on_order,
							$row->discount,
							$row->img,
							$row->status,
							$row->creation_date
						)
					);

			}else{
				return false;
			}
		}

	}

?>
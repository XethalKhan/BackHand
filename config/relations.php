<?php

	$relations = [
		"resources" => [
			"product" => [
				"domain" => "Product",
				"request" => [
					"method" => ["GET", "POST"],
					"type" => ["json", "xml"]
				],
				"relations" => [
					"category" => "getCategoriesFromProduct"
				]
			]
		]
	];

?>
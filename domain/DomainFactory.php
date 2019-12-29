<?php

	namespace domain;

	require_once("action/Action.php");

	use action\Action;

	class DomainFactory{

		public static function getDomain(Action $a){

			global $relations;

			$resource = explode("/", $a->getResource());
			$size = count($resource);


			if($size === 1){

				$meta = $relations["resources"][$resource[0]];
				//var_dump($meta);

				if(file_exists("domain/" . ucfirst($resource[0]) . "Domain.php")){

					return DomainFactory::parseDomain(ucfirst($resource[0]), $a->getMethod());
				}

			}else if($size === 2){
				$meta = $relations["resources"][$resource[0]];

				if(file_exists("domain/" . ucfirst($resource[0]) . "Domain.php")){

					return DomainFactory::parseDomainID(ucfirst($resource[0]), $resource[1], $a->getMethod());
				}
			}else{

				for($i = 0; $i < $size; $i+=2){
					if(file_exists("domain/" . ucfirst($resource[$i]) . "Domain.php")){
						echo $resource[$i] . "Postoji<br/>";
					}else{
						echo $resource[$i] . "Ne postoji";
					}
				}

			}
		}

		private static function parseDomain($resource, $method){

			require_once("domain/" . ucfirst($resource) . "Domain.php");

			$classname = "\\domain\\" . ucfirst($resource) . "Domain";

			return new $classname($method, 0);

		}

		private static function parseDomainID($resource, $id, $method){

			require_once("domain/" . ucfirst($resource) . "Domain.php");

			$classname = "\\domain\\" . ucfirst($resource) . "Domain";

			return new $classname($method, $id);

		}

	}

?>
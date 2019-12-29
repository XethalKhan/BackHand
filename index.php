<?php

	require_once("./config/config.php");
	require_once("./config/connection.php");
	require_once("./config/relations.php");

	require_once('action/Action.php');
	require_once('domain/DomainFactory.php');
	require_once('responder/ResponderFactory.php');
	require_once('responder/Responder.php');

	use action\Action;
	use domain\DomainFactory;
	use responder\ResponderFactory;
	use responder\Responder;

	try{
		$a = new Action();

		$a->check();

		$d = DomainFactory::getDomain($a);

		$data = $d->handle();

		$res = ResponderFactory::getResponder($a, $data);

		$res->send();

	}catch(Exception $e){
		echo $e->getMessage();
	}

?>
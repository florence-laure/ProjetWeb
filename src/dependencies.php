<?php
	
	$container = $app->getContainer();

	$container['renderer'] = function ($c) {
    	$settings = $c->get('settings')['renderer'];
    	return new Slim\Views\PhpRenderer($settings['template_path']);
	};

	// pdo
	$container['pdo'] = function ($c) {
 		$settings = $c->get('settings')['db'];
		$pdo = new \PDO("mysql:host=".$settings['host'].";dbname=".$settings['dbname'], $settings['login'], $settings['password'], array(PDO::ATTR_PERSISTENT => true));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	return $pdo;
	};

	$container['progModel'] = function ($c) {
    	return new Models\ProgramModel($c->get('pdo'));
	};

	$container[ProgramsDisplayAction::class] = function ($c) {
    	return new Actions\ProgramsDisplayAction($c);
	};
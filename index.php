<?php
	
	require './configs/config.php';
	$m = !empty($_GET['m'])?$_GET['m']:'Index';

	$a = !empty($_GET['a'])? $_GET['a'] :'index';

	function mvc_autoload($className)
	{
		if (file_exists("./models/{$className}.class.php")) {
			require "./models/{$className}.class.php";
		} elseif (file_exists("./controller/{$className}.class.php")) {
			require "./controller/{$className}.class.php";
		}else{
			header('HTTP/1.0 404 not found');
			header('Status:404 not found');
			echo "<h1>404 not found</h1>";
			exit;
		} 
	}
	require './libs/Smarty.class.php';
	spl_autoload_register('mvc_autoload');

	
	

	$className = $m.'Controller';

	$controller = new $className();

	$controller->$a();
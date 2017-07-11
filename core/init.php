<?php 
	
	define('APPLICATION_PATH', realpath('../'));

	$paths = array(

			APPLICATION_PATH,
			APPLICATION_PATH.'/model',
			get_include_path()
		);

	set_include_path(implode(PATH_SEPARATOR, $paths));

	function __autoload($className) {

		require_once $className.".php";
	}

	

 ?>
<?php 

/**
 * controlador principal
 */
class Homecontroller
{
	
	public function index()
	{
		if (isset($_SESSION['user'])) {
			require 'Views/Layout.php';
			require 'Views/Home.php';
		    require 'Views/Scripts.php';
		}else{
			header('Location: ?controller=login');
		}
	}
}

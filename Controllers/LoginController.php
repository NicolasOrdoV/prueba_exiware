<?php

require 'Models/Login.php';

/**
 * Controlador login
 */
class LoginController
{
	private $model;

	public function __construct()
	{
		$this->model = new Login;
	}

	public function index()
	{
		require 'Views/Login.php';
		require 'Views/Scripts.php';
	}

	public function loginIn()
	{
		$validateUser = $this->model->validateUser($_POST);
		if ($validateUser === true) {
			header('Location: ?controller=home');
		} else {
			$error = [
				'errorMessage' => $validateUser,
				'email' => $_POST['correo_empleado'] 
			];
			require 'Views/Login.php';
		    require 'Views/Scripts.php';
		}	
	}

	public function logout()
	{
		if ($_SESSION['user']) {
			session_destroy();
			header('Location: ?controller=login');
		} else {
			header('Location: ?controller=login');
		}
		
	}
}
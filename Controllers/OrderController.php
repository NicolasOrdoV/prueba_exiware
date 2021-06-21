<?php

require 'Models/Order.php';
/**
 * Controlador pedidos
 */
class OrderController
{
    private $model;

	public function __construct()
	{
		$this->model = new Order;
	}

	public function index()
	{
		require 'Views/Layout.php';
		require 'Views/Orders/new.php';
		require 'Views/Scripts.php';
	}

	public function getByReference()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(isset($_GET['codigo']))
			{
				$codigo_producto = htmlspecialchars(trim($_GET['codigo']));
				$sqlsi = $this->model->getByR($codigo_producto);
				$sqlsi = json_decode(json_encode($sqlsi),true); 
			    if(!empty($sqlsi))
			    {
			     	$datos[] = $sqlsi[0]["id_producto"].",".$sqlsi[0]['referencia_producto'].",".$sqlsi[0]['nombre_producto'].",".$sqlsi[0]['valor_unitario_producto'];
			     	echo json_encode($datos);
			     	// var_dump($sqlsi);
			    }
			}
		} else {
		    echo "<p>No se encontro el nombre en la DB!!</p>";
		}
	}
}
<?php 

/**
 * Modelo pedidos
 */
class Order
{
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new Conexion;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByR($codigo_producto)
	{
		try {
			$strSql = "SELECT id_producto, referencia_producto, nombre_producto, valor_unitario_producto FROM `db.producto` WHERE referencia_producto  = $codigo_producto";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}
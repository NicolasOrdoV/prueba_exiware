<?php 

/**
 * Modelo login
 */
class Login
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

	public function validateUser($data)
	{
		try {
			$strSql = "SELECT * FROM `db.empleado`
			WHERE correo_empleado = '{$data['correo_empleado']}' AND contrasena_empleado = '{$data['contrasena_empleado']}'";
			$query = $this->pdo->select($strSql);
			if (isset($query[0]->id_empleado)) {
				$_SESSION['user'] = $query[0];
				return true;
			} else {
				return "Correo y la contraseña no son validas";
			}
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}
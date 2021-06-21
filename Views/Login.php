<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prueba Exiware</title>
	<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">
	<link rel="icon" href="Assets/img/2.png">
</head>
<body>
	<main class="container">
		<section class="mt-5 row">
			<div class="card w-50 m-auto ml-auto mr-auto mt-3">
				<div class="card-header row bg-danger justify-content-center">
					<img src="Assets/img/2.png" class="img-fluide m-auto">
					<h2 class="text-light col-12 d-flex justify-content-center pb-4">Iniciar sesión</h2>
				</div>
				<div class="card-body w-100">
					<form action="?controller=login&method=loginIn" method="POST">
						<?php if(isset($error['errorMessage'])) { ?>
							<div class="alert alert-danger alert-dismissable alert-width" role="alert">
								<button class="close" data-dismiss="alert">&times;</button>
								<p class="text-dark"><?php echo $error['errorMessage']; ?></p>
							</div>
					    <?php } ?>
						<div class="form-group">
							<label>Correo</label>
							<input type="email" name="correo_empleado" class="form-control" placeholder="test@test.com" value="<?php echo isset($error['email']) ? $error['email'] : '' ?>">
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input type="password" name="contrasena_empleado" class="form-control" placeholder="*****">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-danger">Ingresar</button>
						</div>
					</form>
				</div>
			</div>
		</section>
	</main>
</body>
</html>
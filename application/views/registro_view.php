<html>
	<head>
		<meta charset="utf-8" />
		<title>Register page</title>
	</head>
	<body>

	<h1>Regístrate</h1>
	<form name="form_reg" action="<?= base_url().'usuarios/registro_verify'?>" method="POST">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre"><br>

		<label for="email">Email</label>
		<input type="text" name="email"><br>

		<label for="usuario">Usuario</label>
		<input type="text" name="user"><br>

		<label for="password">Contraseña</label>
		<input type="password" name="pass"><br>

		<input type="submit" value="Registrar" name="submit_reg">
		<a href="<?= base_url().'/registro'?>usuarios/">Registrate</a>
	</form>
	<hr>
	<?= validation_errors(); ?>

	</body>
</html>
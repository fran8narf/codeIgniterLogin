<html>
	<head>
		<meta charset="utf-8" />
		<title>Login page</title>
	</head>
	<body>

	<h1>Iniciar sesión</h1>
	<form>
		<label for="usuario">Usuario</label>
		<input type="text" name="user"><br>

		<label for="password">Contraseña</label>
		<input type="password" name="pass"><br>

		<input type="submit" value="Entrar" name="submit">
		<a href="<?= base_url(); ?>usuarios/registro">Registrate</a>
	</form>
	</body>
</html>
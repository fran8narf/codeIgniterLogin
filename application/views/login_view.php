<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
	</head>
	<body>

	<h1>Iniciar sesión</h1>
	<?php if(isset($mensaje)): ?>
		<h2><?= $mensaje; ?></h2>	
	<?php endif; ?>
	<form name="form_login" action="<?= base_url().'login/verify_session' ?>" method="POST" >
		<label for="usuario">Usuario</label>
		<input type="text" name="user"><br>

		<label for="password">Contraseña</label>
		<input type="password" name="pass"><br>

		<input type="submit" value="Entrar" name="submit">
		<a href="<?= base_url(); ?>login/registro">Registrate</a>
	</form>

	</body>
</html>
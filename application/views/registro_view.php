<html>
	<head>
		<meta charset="utf-8" />
		<title>Register page</title>
	</head>
	<body>

	<h1>Regístrate</h1>
	<?php if(isset($mensaje)): ?>
		<h2><?= $mensaje; ?></h2>	
	<?php endif; ?>
	<form name="form_reg" action="<?= base_url().'usuarios/registro_verify'?>" method="POST">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?= @set_value('nombre') ?>"><br>

		<label for="email">Email</label>
		<input type="text" name="email" value="<?= @set_value('email') ?>"><br>

		<label for="usuario">Usuario</label>
		<input type="text" name="user" value="<?= @set_value('user') ?>"><br>

		<label for="password">Contraseña</label>
		<input type="password" name="pass" value="<?= @set_value('pass') ?>"><br>

		<label for="password2">Confirmar contraseña</label>
		<input type="password" name="pass2" value="<?= @set_value('pass') ?>"><br>

		<input type="submit" value="Registrar" name="submit_reg">
		<a href="<?= base_url() ?>usuarios/">Acceder</a>
	</form>
	<hr>
	<?= validation_errors(); ?>

	</body>
</html>
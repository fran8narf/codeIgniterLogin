<html>
<head>
	<title>Welcome, <?= $usuario ?></title>
</head>
<body>
	<h1>Bienvenido, <em><?= $usuario ?></em>.</h1>
	<a href="<?= base_url().'home/logout' ?>">Desconectarse</a>
</body>
</html>
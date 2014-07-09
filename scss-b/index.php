<!DOCTYPE html>
<html>
<head>
	<?php
	require "scss.inc.php";
	$scss = new scssc();
	$directory = __DIR__."/css";
	$scss->addImportPath( $directory );

	# formatos de salida
	$formatterName = 'scss_formatter';
	//$formatterName = 'scss_formatter_nested';
	//$formatterName = 'scss_formatter_compressed';

    $scss->setFormatter( $formatterName );

	$handle = fopen('style.css', 'w');
	$scssCode = $scss->compile(file_get_contents($directory.'/style.scss'));
	fwrite($handle, $scssCode);
	fclose($handle);

	?>
	<title>Probando scssphp</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header class="container">
		<h1>Probando scssphp</h1>
	</header>
	<div id="main" class="container">
		<p>Estamos probando <span>un span</span> y <strong>un strong</strong></p>
		<p class="generic-error"> esto es un generic-error</p>
	</div>
</body>
</html>
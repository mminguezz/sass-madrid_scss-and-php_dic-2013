<!DOCTYPE html>
<html>
<head>
	<title>Probando scssphp</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php
	$directory = __DIR__."/css";

	require "scss.inc.php";


scss_compile($directory.'/style.scss', $directory.'/main.css');

function scss_compile($fname, $fnameout = null) {
	$myespecialcss = 'No se ha cambiado el archivo style.scss';
	$start = microtime(true);
	if (filemtime($fname) > filemtime($fnameout)){
		if (is_readable($fname)) {
			if ($fnameout !== null) {
				$type = substr($fname, -5);
				if ($type == '.scss') {
					if (!$handle = fopen($fnameout, 'w')) {
						echo 'Cannot open file (' . $fnameout .')';
						exit;
					}
					$scss = new scssc();
					$scss->addImportPath(__DIR__."/css");

					$scss->setFormatter("scss_formatter");
					$myespecialcss = '/* time of '.$fname.' ' .date ("d F Y H:i:s.", filemtime($fname)).' time of '.$fnameout .' '.date ("d F Y H:i:s.", filemtime($fnameout)).'  */' ;

					$scssCode = $scss->compile(file_get_contents($fname).$myespecialcss);
					if (fwrite($handle, $scssCode) === FALSE) {
						echo 'Cannot write to file (' . $fnameout . ')';
						exit;
					}
					fclose($handle);
				}
			}
		}
	}
	$elapsed = round((microtime(true) - $start), 4);
	$lastscsscompile = date('d-m-Y',filemtime($fnameout));
	echo "/* compiled $lastscsscompile (${elapsed}s) for $fnameout*/\n\n";
	echo '<br>'. $myespecialcss;
}
	?>

	<header class="container">
		<h1>Probando scssphp</h1>
	</header>
	<div id="main" class="container">
		<p>Estamos probando <span>un span</span> y <strong>un strong</strong></p>
		<p class="generic-error"> esto es un generic-error</p>
		<h2>Estamos creando el archivo main.css</h2>
	</div>
</body>
</html>
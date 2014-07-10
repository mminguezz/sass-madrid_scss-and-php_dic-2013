<?php

	# Añadimos en el function:
	#   require get_template_directory() . '/css/style.php';
	#   function sass() {
	#   	wp_enqueue_style( 'sass', get_template_directory_uri() . '/css/scss/main.css', array(), null );
	#   }
	#   add_action( 'wp_enqueue_scripts', 'sass' );
	#
	# y el contenido de esta carpeta en el directorio css


	$directory = __DIR__."/scss";
	require $directory."/scss.inc.php";

###################################
# Valores a pasara a scss         #
###################################

# Recogemos valores introducidos en el tema pasarlos al scss
#	$mymenu = wp_get_nav_menu_items(1); // donde 1 es el id  del menu
#	$item_p = 0;
#	$item_c = 0;
#	foreach ( (array) $mymenu as $key => $menu_item ) {
#	    $item_menu_parent = $menu_item->menu_item_parent;
#		if ($item_menu_parent==0){
#	    	$item_p++;
#	    }
#	}
#
#   Recogemos valores introducidos en el tema pasarlos al scss
#	$my_text_color = get_header_textcolor();
#	$specialcss = '$lip:'. $item_p.'; $my_text_color:#'.$my_text_color.';';

	scss_compile($directory.'/style.scss', $directory.'/main.css', $specialcss);

	function scss_compile($fname, $fnameout = null, $specialcss = '') {
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
						$scss->addImportPath(__DIR__."/scss");

						$scss->setFormatter("scss_formatter");
						$myespecialcss = $specialcss;

						$scssCode = $scss->compile('/*Que pasa?*/'.$myespecialcss.file_get_contents($fname));
						if (fwrite($handle, $scssCode) === FALSE) {
							echo 'Cannot write to file (' . $fnameout . ')';
							exit;
						}
						fclose($handle);
					}
				}
			}
		}
	}
?>
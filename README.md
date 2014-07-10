sass-madrid_scss-and-php_dic-2013
=================================

Madrid Sass &amp; Compass Meetup - Dic 2013 - Compilando Sass con PHP

## Grupo de Meetup: Madrid Sass Compass
http://www.meetup.com/Madrid-Sass-Compass-Meetup/

## Pagina del Meetup: Compilando Sass con PHP
http://www.meetup.com/Madrid-Sass-Compass-Meetup/events/145897972/

## Slides
En el directorio slides esta la presentación, abre 'index.html' con el navegador para ver las diapositivas

## Ejemplos

### scss-a
Añadiendolo a nuestros PHP y probando que funciona.

### scss-b
Creando un archivo css desde scss con php.

### scss-c
Poniendo a prueba el compilado.

### sass-wp
_He modificado un poco el ejemplo de la charla, si no funciona pido disculpas por que no lo he probado._


Copia el contenido de esta carpeta en el directorio css de tu theme y añade al archivo function.php
'''require get_template_directory() . '/css/style.php';
function sass() {
	wp_enqueue_style( 'sass', get_template_directory_uri() . '/css/scss/main.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'sass' );'''

#### style.php
##### Valores a pasara a scss
En este bloque comentado recogemos el color de del texto del header con 'get_header_textcolor();' y contamos los elementos li de primer nivel del menu con el ID=1 para pasarlo como variable al scss. Yo he dejado definidos las variables en el scss por si quereis probar el resultado del menu sin añadirlo a un theme de WordPress.

En el style.scss tendriamos que cambiar '.main-navigation' por la clase del menu y a probar el resultado !Jugando con hsl y adjust_hue!. No os asusteis con el festival de colores. :)

Cualquier comentario o consejo sera bien recibido.
@m_minguezz
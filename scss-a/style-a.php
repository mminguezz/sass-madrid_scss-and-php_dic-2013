 <?php
    $directory = __DIR__."css";
    require"scss.inc.php";
    scss_server::serveFrom($directory);
    #  Ha creado el directorio "scss_cache" en el directorio "css"



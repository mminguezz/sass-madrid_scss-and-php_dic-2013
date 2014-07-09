 <?php
 # http://localhost/scss/scss-a/style-b.php
    require"scss.inc.php";
    
    $scss = new scssc();

	echo $scss->compile('
	  $color: #abc;
	  div { 
	  	color: lighten($color, 20%); 
	  }
	');
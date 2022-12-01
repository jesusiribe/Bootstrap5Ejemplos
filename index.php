<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").load("index.php");
  });
});
</script>
</head>

<body>

<?php
	function listadoDirectorio($directorio){
	    $listado = scandir($directorio);	    unset($listado[array_search('.', $listado, true)]);
	    unset($listado[array_search('..', $listado, true)]);
	    if (count($listado) < 1) {
	        return;
	    }
	    foreach($listado as $elemento){
	    	if(!is_dir($directorio.'/'.$elemento)) {
				echo "<li>- <a href='$directorio/$elemento'>$elemento</a></li>";

	        }
	        if(is_dir($directorio.'/'.$elemento)) {
	        	echo '<li class="open-dropdown">+ '.$elemento.'</li>';
	    		echo '<ul class="dropdown d-none">';
	        		listadoDirectorio($directorio.'/'.$elemento);
	    		echo '</ul>';
	        }
	    }
	}
	listadoDirectorio('./');
	
?>
	
	

</body>
</html>
<div id="preguntas"> 
	<form method="post" action=<?php echo"'detalles.php?id=".$idSubasta."'";?> onsubmit="return validarPregunta('textoPregunta');">
		<input type="submit" value="Preguntar" id="botonPregunta" >
		<textarea name="pregunta"  id="textoPregunta"></textarea><br>
	 </form>

</div>

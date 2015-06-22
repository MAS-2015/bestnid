<?php
	include('conexion.php');
	if(isset($_POST['pregunta'])){

		$pregunta=mysqli_escape_string($conexion, $_POST['pregunta']);
		$idUsuario= buscarIdUsuarioPorEmail($user);
		$sql ="INSERT INTO preguntas(idPregunta, fecha, pregunta, idUsuario, idSubasta) VALUES (NULL,'".date('Y-m-d')."','".$pregunta."',".$idUsuario.",".$idSubasta.")";
		$resultado= mysqli_query($conexion,$sql);
		}

	if(isset($_POST['respuesta'])){
		$respuesta = mysqli_escape_string($conexion,$_POST['respuesta']);
		$sql = "INSERT INTO respuestas (idRespuesta, fecha, respuesta, idpregunta) VALUES(NULL,'".date('Y-m-d')."','".$respuesta."',".$_GET['idp'].")";
		$resultado = mysqli_query($conexion, $sql);
		}

	$select = "SELECT pregunta, preguntas.fecha, respuesta , respuestas.fecha, preguntas.idPregunta FROM preguntas LEFT OUTER JOIN respuestas ON preguntas.idPregunta = respuestas.idPregunta WHERE idSubasta = ".$idSubasta." order by preguntas.idPregunta";
	$resultado = mysqli_query($conexion, $select);
	while($tuplaPregunta = mysqli_fetch_row($resultado)){
		echo "<div class = \"singularidad\" >
					<div class=\"pregunta\" id=\"pregunta".$tuplaPregunta[4]."\">
						<div class = \"headPregunta\" >
							<p class=\"infoHead\">hecha el ".$tuplaPregunta[1]."</p>
						</div>
						<div class =\"bodyPregunta\">
							<p class=\"infoBody\">".$tuplaPregunta['0']."</p><br> <br>
						</div>
						";
					
		if(!is_null($tuplaPregunta[2])){
			echo"	</div>
					<div class=\"respuesta\">
						<div class=\"headRespuesta\">
							<p class=\"infoHead\"> respondida el ".$tuplaPregunta[3]."</p>
						</div>
						<div class=\"bodyRespuesta\">
					 		<p class=\"infoBody\">".$tuplaPregunta[2]."</p>
						</div>
					</div>";
		}
		else if(isset($user)){
						$idUsuarioSubasta= buscarIdUsuarioPorIdSubasta($idSubasta);
						$idUsuario = buscarIdUsuarioPorEmail($user);
						if($idUsuario == $idUsuarioSubasta){
							echo"
						<div class =\"responder\">
							<script> setFuncionesPregunta(\"pregunta".$tuplaPregunta[4]."\");</script>
				 			<form class=\"formResponder\" method=\"post\" action=\"detalles.php?id=".$idSubasta."&idp=".$tuplaPregunta[4]."\">
				 				<textarea cols=\"50\" rows=\"5\" class=\"textoRespuesta\" name=\"respuesta\"></textarea>
				 				<button type=\"button\"class=\"reply\" onclick=\"mostrarFormResponder(this)\">responder</button>
 								<button type=\"button\" class=\"cancel\" onclick=\"cancelarResponder(this)\">cancelar</button>
				 			</form>
						</div>
							
					</div>";}
						else{ echo"</div>";}
			}
		else{ echo "</div>";}

		echo"</div><br>";
	}


?>
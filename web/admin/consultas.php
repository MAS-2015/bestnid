
<html>
	<head>
	<link type="text/css" id="global-css" rel="stylesheet" href="../css/header.css" media="all">
	<link type="text/css" id="global-css" rel="stylesheet" href="../css/registro.css" media="all">
	<link type="text/css" id="global-css" rel="stylesheet" href="../css/styles.css" media="all">
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/validarFechas.js"></script>
	<link rel="stylesheet" href="css/daterangepicker.css" />
	<script src="js/moment.min.js"></script>
	<script src="js/jquery.daterangepicker2.js"></script>
	</head>


	<body>

		<div class="wrapper">
			<div class="consultasFechas">
			<form method="post" action="operacion.php?op=consultas" onsubmit="return validarSelectorYFechas('selectorConsulta', 'fechaInicio','fechaFin')">
			<p class="subti">Seleccione tipo de consulta y fechas para la consulta </p><select name="consulta" id="selectorConsulta">
				<option value="">-seleccionar tipo-</option>
				<option value="usuarios">Usuarios registrados</option>
				<option value="finalizadas">Subastas finalizadas</option>
				<option value="iniciadas">Subastas iniciadas</option>
			</select>
			<span>desde:</span><span id="fechas"><input id="fechaInicio" name='inicio' size="16" value=""> hasta: <input id="fechaFin" name='fin' size="16" value=""></span>
			<input type="submit" value="consultar" class= "buttom" > <buttom type="buttom" class="buttom" onclick= "limpiar()" >limpiar</buttom>
			</form>
			<p id="msjFormato"></p>
			<script> $('#fechas').dateRangePicker({
				showShortcuts: false,
				format: 'YYYY-MM-DD',endDate: '2015-06-24',
				
					separator : ' to ',
					getValue: function()
				{
					if ($('#fechaInicio').val() && $('#fechaFin').val() )
						return $('#fechaInicio').val() + ' to ' + $('#fechaFin').val();
					else
						return '';
				},
			setValue: function(s,s1,s2)
			{
				$('#fechaInicio').val(s1);
			$('#fechaFin').val(s2);
		},

		

}	
	
				);</script>
		<?php 
		
			if (isset($_POST['inicio'])){
			switch($_POST['consulta']){
			case 'usuarios':{	
				include('modulos/conexion.php');
				$fechaInicio= $_POST['inicio'];
				$fechaFin = $_POST['fin'];
				
				$sql= "SELECT email, fechaRegistro FROM usuarios WHERE fechaRegistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."' order by fechaRegistro";
				$resultado = mysqli_query($conexion, $sql);
				$cont= 0;
				echo " <div class=\"lista\">
					<p class =\"subti\">usuarios registrados entre ".$fechaInicio." y ".$fechaFin."</p>";
				while($tuplaUsuario = mysqli_fetch_assoc($resultado)){

					echo" <div class=\"usuarioMuestra\">
							<p class=\"listaElemento\">#- ".$tuplaUsuario['email']."--fecha de Registro: ".$tuplaUsuario['fechaRegistro']."

					    </div> <br>";
					$cont ++;

				} 
				if($cont == 0){
					echo"<p>No se han registrado usuarios en las fechas consultadas</p>";
				}
				else{
				echo"
				 <p>En las fechas consultadas se han registrado ".$cont." usuarios</p>
				";}
				echo"</div>";
				break;
				}
			
			case 'finalizadas':{
				include('modulos/conexion.php');
				$fechaInicio= $_POST['inicio'];
				$fechaFin = $_POST['fin'];
				$sql= "SELECT titulo, email,fechaFin, precio, subastas.idSubasta FROM subastas left outer join usuarios  on  subastas.idUsuario = usuarios.idUsuario left outer join ofertas on subastas.idOfertaGanadora = ofertas.idOferta WHERE fechaFin BETWEEN '".$fechaInicio."' AND '".$fechaFin."' order by fechaRegistro";
				$resultado = mysqli_query($conexion, $sql);
				$suma= 0;
				$cont=0;
				$cont2=0;
				echo " <div class=\"lista\">
					<p class =\"subti\">Subastas finalizadas entre ".$fechaInicio." y ".$fechaFin."</p>";
				while($tuplaSubasta = mysqli_fetch_assoc($resultado)){
					$cont++;
					if(is_null($tuplaSubasta['precio'])){
						$msjPrecio ="#";
						$cont2++;
					}
					else{
						
						$msjPrecio=$tuplaSubasta['precio'];
						$suma += $tuplaSubasta['precio'];	}
					echo" <div class=\"subastaMuestra\">
							<p class=\"subasta\"><a href=\"../detalles.php?id=".$tuplaSubasta['idSubasta']."\">".$tuplaSubasta['titulo']."</a> </p><p>usuario:".$tuplaSubasta['email']."</p><p> fecha fin:".$tuplaSubasta['fechaFin']."</p><p> subastada en:".$msjPrecio."</p>

					   	  </div>
					   ";


				} 
				if($cont ==0){
					echo"<p> No hay subastas finalizadas en las fechas consultadas</p>";
				}
				else{
				echo "<p> Se han finalizado un total de ".$cont." subastas de las cuales a&uacute;n ".$cont2." faltan elegir ganador(#). Ganancia :".$suma * 0.30."$ </p>";
				}
				echo "</div>";
				break;
			}
			case 'iniciadas':{
				include('modulos/conexion.php');
				$fechaInicio= $_POST['inicio'];
				$fechaFin = $_POST['fin'];
				$sql= "SELECT titulo, email,fechaInicio, subastas.idSubasta FROM subastas left outer join usuarios  on  subastas.idUsuario = usuarios.idUsuario left outer join ofertas on subastas.idOfertaGanadora = ofertas.idOferta WHERE fechaInicio BETWEEN '".$fechaInicio."' AND '".$fechaFin."' order by fechaRegistro";
				$resultado = mysqli_query($conexion, $sql);
				$suma= 0;
				$cont=0;
				$cont2=0;
				echo " <div class=\"lista\">
					<p class =\"subti\">Subastas Iniciadas entre ".$fechaInicio." y ".$fechaFin."</p>";
				while($tuplaSubasta = mysqli_fetch_assoc($resultado)){
					$cont++;
					
					echo" <div class=\"subastaMuestra\">
							<p class=\"subasta\"><a href=\"../detalles.php?id=".$tuplaSubasta['idSubasta']."\">".$tuplaSubasta['titulo']."</a> </p><p>usuario:".$tuplaSubasta['email']."</p><p> fecha Inicio:".$tuplaSubasta['fechaInicio']."

					   	  </div>
					   ";


				} 
				if($cont ==0){
					echo"<p> No hay subastas Iniciadas en las fechas consultadas</p>";
				}
				else{
				echo "<p> Se han Iniciado un total de ".$cont." subastas";
				}
				echo "</div>";
				break;
			}
			}
			}
		
		?>
		</div>
		

		</div>
	</body>

</html>
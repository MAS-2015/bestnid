
<html>
	<head>
	<script src="js/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="css/daterangepicker.css" />
	<script src="js/moment.min.js"></script>
	<script src="js/jquery.daterangepicker2.js"></script>
	</head>


	<body>

		<div class="wrapper">
			<form method="post" action="usuariosRegistrados.php">
			<span>seleccionar fechas</span><span id="fechas"><input id="fechaInicio" name='inicio' size="20" value=""> entre <input id="fechaFin" name='fin' size="20" value=""></span>
			<input type="submit" value="consultar">
			</form>
			<script> $('#fechas').dateRangePicker({
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
				include('modulos/conexion.php');
				$fechaInicio= $_POST['inicio'];
				$fechaFin = $_POST['fin'];
				echo $_POST['fin'];
				echo $_POST['inicio'];
				$sql= "SELECT email, fechaRegistro FROM usuarios WHERE fechaRegistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."' order by fechaRegistro";
				echo $sql;
				$resultado = mysqli_query($conexion, $sql);
				while($tuplaUsuario = mysqli_fetch_assoc($resultado)){
					echo" <div class = usuario>
							<p> usuario: ".$tuplaUsuario['email']." fecha de Registro:".$tuplaUsuario['fechaRegistro']."

					    </div> <br>";


				} 

			}
		
		
		?>
		</div>
		

		
	</body>

</html>
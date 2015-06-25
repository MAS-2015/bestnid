<html>
	<head>
	<script src="js/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="css/daterangepicker.css" />
	<script src="js/moment.min.js"></script>
	<script src="js/jquery.daterangepicker2.js"></script>
	</head>


	<body>

		<div class="wrapper">
			<form method="post" action="subastasTErminadas.php">
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
				$sql= "SELECT titulo, email,fechaFin, precio FROM subastas left outer join usuarios  on  subastas.idUsuario = usuarios.idUsuario left outer join ofertas on subastas.idOfertaGanadora = ofertas.idOferta WHERE fechaFin BETWEEN '".$fechaInicio."' AND '".$fechaFin."' order by fechaRegistro";
				$resultado = mysqli_query($conexion, $sql);
				$suma= 0;
				while($tuplaSubasta = mysqli_fetch_assoc($resultado)){
					if(is_null($tuplaSubasta['precio'])){
						$msjPrecio ="NO SE ELIGIO GANADOR";
					}
					else{
						$msjPrecio=$tuplaSubasta['precio'];
						$suma += $tuplaSubasta['precio'];	}
					echo" <div class = usuario>
							<p>subasta: ". $tuplaSubasta['titulo']." usuario:".$tuplaSubasta['email']." fecha fin:".$tuplaSubasta['fechaFin']." subastada en:".$msjPrecio."</p>

					    </div> <br>";


				} 
				echo "<p> Ganancia :".$suma * 0.30."$";
			}
					
		
		?>

		</div>
		

		
	</body>

</html>
function getVarsUrl(){
    var url= location.search.replace("?", "");
    var arrUrl = url.split("&");
    var urlObj={};   
    for(var i=0; i<arrUrl.length; i++){
        var x= arrUrl[i].split("=");
        urlObj[x[0]]=x[1]
    }
    return urlObj;
}

function getFormOferta(){
	var id = getVarsUrl().id;

	$.post("formOferta.php",
	{
		idSubasta: id,
	},
	function(data, status){
		document.getElementById("oferta").innerHTML = data;
	});
	document.getElementById("oferta").focus();
}

function getFormOfertaEdit( idOferta){
	var id = getVarsUrl().id;
	$.post("formOferta.php",
	{
		idSubasta: id,
		idOferta: idOferta,
	},
	function(data, status){
		document.getElementById("oferta").innerHTML = data;
	});
	document.getElementById("oferta").focus();
}

function getFormGanador(){
	var id = getVarsUrl().id;
	$.post("formGanador.php",
	{
		idSubasta: id,
	},
	function(data, status){
		document.getElementById("oferta").innerHTML = data;
	});
	document.getElementById("oferta").focus();
}

function elegirGanador( idOferta ){
	var id = getVarsUrl().id;
	$.post("modulos/ganador.php",
	{
		idSubasta: id,
		ganador : idOferta,
	});
	document.getElementById("oferta").innerHTML = '<p>Se ha enviado un mail al ganador para notificarlo</p><br><button class="buttom" onclick="datosContacto(\''+id+'\');" >ver datos del ganador</button>';
}

function datosContacto(idSubasta){
	$.post("modulos/datosContacto.php",
	{
		idSubasta: idSubasta,
	},
	function(data, status){
	if(status){ document.getElementById("oferta").innerHTML = 'estatus true :';}
		document.getElementById("oferta").innerHTML = data;
	});
}

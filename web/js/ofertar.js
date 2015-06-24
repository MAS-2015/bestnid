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

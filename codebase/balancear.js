window.onload = function() {
	tamanopantalla = window.innerHeight / 2 - 500;
	if(tamanopantalla >= 40)
	{
		document.getElementById("balanza").style.marginTop = tamanopantalla + "px";
	}
	
};
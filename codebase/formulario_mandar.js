function mandarformalocal() {

	nombrelocal = $('#nombre-local').val();
	tipolocal = $('#tipo-local').val();
	envios = $('#envios').val();
	lunes = $('#dia_lunes:checkbox:checked').length > 0;
	martes = $('#dia_martes:checkbox:checked').length > 0;
	miercoles = $('#dia_miercoles:checkbox:checked').length > 0;
	jueves = $('#dia_jueves:checkbox:checked').length > 0;
	viernes = $('#dia_viernes:checkbox:checked').length > 0;
	sabado = $('#dia_sabado:checkbox:checked').length > 0;
	domingo = $('#dia_domingo:checkbox:checked').length > 0;
	abierto = $('#hora-abrir').val();
	cerrado = $('#hora-cerrar').val();
	ciudad = $('#ciudad-local').val();
	delegacion = $('#delegacion-local').val();
	colonia = $('#colonia-local').val();
	calle = $('#calle-local').val();
	numero = $('#numero-local').val();
	telefono = $('#telefono-local').val();
	whatsapp = $('#whatsapp-local').val();
	emaileste = $('#mail-local').val();
	aceptoterminos = $('#aceptoterminos:checkbox:checked').length > 0;

	contadordias = 0;

	if(lunes == true || martes == true || miercoles == true || jueves == true || viernes == true || sabado == true || domingo == true)
	{
		contadordias ++;
	}

	if(emaileste!="" && nombrelocal != "" && tipolocal !="Default" && envios!="Default" && abierto!="Default" && cerrado!="Default" && ciudad != "" && delegacion != "" && colonia != "" && calle != "" && numero != "" && telefono != "" && aceptoterminos == true)
	{
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emaileste))
		{
			if(abierto != cerrado)
			{
				if(contadordias > 0)
				{
					$('#enviadoes').val("sip");
					document.getElementById("ingresaru").submit();
				}
				else
				{
					alert("Debe de selecciona al menos un día en que este abierto.");
				}
			}
			else
			{
				alert("La hora de abrir y cerrar no pueden ser la misma.");
			}
		}
		else
		{
			alert("El mail proporcionado no es un mail valido.");
		}
	}
	else
	{
		alert("Complete todas las casillas con *.");
	}

	
}

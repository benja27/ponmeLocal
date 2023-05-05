function mandarforma() {


	// alert("aceptas compartir tu ubi")

	// let latitutde =  2311231321
	// let longitud = 654132132151


	busquedaes = $('#busqueda').val();
	if(busquedaes != "")
	{
		<?php
			echo 'var linkm = "'.$linkinit.'"';
		?>

		busquedaes2 = busquedaes.split(" ");
		busquedaes = "";
		for (var i = 0; i < busquedaes2.length; i++) {
			
			if(i == busquedaes2.length - 1)
			{
				busquedaes += busquedaes2[i];
			}
			else
			{
				busquedaes += busquedaes2[i]+"-";
			}
		}

		location.href = linkm + "/buscando/"+busquedaes;
	}
	else
	{
		alert("Llene la casilla con alguna busqueda.");
		$( "#arrowl" ).addClass( "arrow_pointl" );
		$("#arrowl").css("opacity", "1");
		$( "#arrowr" ).addClass( "arrow_pointr" );
		$("#arrowr").css("opacity", "1");
	}
}
function mandarforma2() {

	busquedaes = $('#busqueda').val();
	if(busquedaes != "")
	{
		<?php
			echo 'var linkm = "'.$linkinit.'"';
		?>

		busquedaes2 = busquedaes.split(" ");
		busquedaes = "";
		for (var i = 0; i < busquedaes2.length; i++) {
			
			if(i == busquedaes2.length - 1)
			{
				busquedaes += busquedaes2[i];
			}
			else
			{
				busquedaes += busquedaes2[i]+"-";
			}
		}


		location.href = linkm + "/buscando-ahora/"+busquedaes;
	}
	else
	{
		alert("Llene la casilla con alguna busqueda.");
		$( "#arrowl" ).addClass( "arrow_pointl" );
		$("#arrowl").css("opacity", "1");
		$( "#arrowr" ).addClass( "arrow_pointr" );
		$("#arrowr").css("opacity", "1");
	}
}

$("#busqueda").keyup(function(event) {
    if (event.keyCode === 13) 
    {
    	busquedaes = $('#busqueda').val();
        if(busquedaes != "")
		{
			<?php
				echo 'var linkm = "'.$linkinit.'"';
			?>

			busquedaes2 = busquedaes.split(" ");
			busquedaes = "";
			for (var i = 0; i < busquedaes2.length; i++) {
				
				if(i == busquedaes2.length - 1)
				{
					busquedaes += busquedaes2[i];
				}
				else
				{
					busquedaes += busquedaes2[i]+"-";
				}
			}

			location.href = linkm + "/buscando/"+busquedaes;
		}
		else
		{
			alert("Llene la casilla con alguna busqueda.");
			$( "#arrowl" ).addClass( "arrow_pointl" );
			$("#arrowl").css("opacity", "1");
			$( "#arrowr" ).addClass( "arrow_pointr" );
			$("#arrowr").css("opacity", "1");
		}
    }
    
});
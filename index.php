
<!-- facebook breaker -->

<script>
  if(/^\?fbclid=/.test(location.search))
     location.replace(location.href.replace(/\?fbclid.+/, ""));

</script>
<?php
	require_once ('codebase/simpleURL.php');
	/////URL CHECK
	$urlmain = new simpleURL($_SERVER['HTTP_HOST']);
	if( !$urlmain->segment(2))
	{
		$pagebe = '';
	}
	else
	{
		$pagebe = $urlmain->segment(2);
	}

	/////DATE FORMAT
	$tz = 'America/Mexico_City';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz));
	$dt->setTimestamp($timestamp);
	$dia = $dt->format("d");
	$diasem = $dt->format("w");
	$mes = $dt->format("m");
	$ano = $dt->format("Y");
	$hora = $dt->format("H");
	$minutos = $dt->format("i");
	$segundos = $dt->format("s");
	$stamp_time = $ano.''.$mes.''.$dia.''.$hora.''.$minutos.''.$segundos;

	/////MAIN FUNCTIONS
	function eraseletter($letraes, $base)
	{
		$depurador2 = explode( $letraes, $base);
		$completo = "";
		$count = sizeof($depurador2);
		for ($i = 0; $i < $count; $i++) 
		{
			$completo .= $depurador2[$i];
		}
		return $completo;
	}
	function changeletter($letraes, $cambioletra, $base)
	{
		$depurador2 = explode( $letraes, $base);
		$completo = "";
		$count = sizeof($depurador2);
		for ($i = 0; $i < $count; $i++) 
		{
			if($i == $count  - 1)
			{
				$completo .= $depurador2[$i];
			}
			else
			{
				$completo .= $depurador2[$i] . $cambioletra;
			}
		}
		return $completo;
	}
	function highlightletter($markando, $busqueda)
	{
		$depuradorg = explode( '-', $busqueda);
		$countg = sizeof($depuradorg);

		$completo = "";

		for ($g = 0; $g < $countg; $g++) 
		{
			if($g == 0)
			{
				$depurador2 = explode( $depuradorg[$g], $markando);
			}
			else
			{
				$depurador2 = explode( $depuradorg[$g], $completo);
				$completo = "";
			}
			$count = sizeof($depurador2);
			for ($i = 0; $i < $count; $i++) 
			{
				if($i == $count  - 1)
				{
					$completo .= $depurador2[$i];
				}
				else
				{
					$completo .= $depurador2[$i] .'<mark>'. $depuradorg[$g] . '</mark>';
				}
			}
		}
		return $completo;
	}

	if($pagebe == "buscando")
	{
		$busqueda = strtolower($urlmain->segment(2));

		require_once('connectvar.php');
		$dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);
		if($dbc)
		{
			$sies = false;
			$conteo = 0;
			$tipo_local = array();
			$nombre_local = array();
			$clase_local = array();
			$dias_local = array();
			$abierto_local = array();
			$cerrado_local = array();
			$calle_local = array();
			$numero_local = array();
			$delegacion_local = array();
			$colonia_local = array();
			$ciudad_local = array();
			$cp_local = array();
			$telefono_local = array();
			$envio_local = array();
			$palabras_local = array();
			///
			$facebook_local = array();
			$instagram_local = array();
			$web_local = array();
			$googlemap_local = array();
			$menu_local = array();

			$sql= "SELECT * FROM localito ORDER BY tipo DESC";
			$data = mysqli_query($dbc,$sql);

			while ($baseot = mysqli_fetch_array($data))
			{	
				////BUSQUEDA GENERAL

				$diasmas = "";

				$depuradord = explode( ',', $baseot["dias"]);

				if($depuradord[0] == "0")
				{
					$diasmas .= "lunes ";
				}
				if($depuradord[1] == "0")
				{
					$diasmas .= "martes ";
				}
				if($depuradord[2] == "0")
				{
					$diasmas .= "miercoles ";
				}
				if($depuradord[3] == "0")
				{
					$diasmas .= "jueves ";
				}
				if($depuradord[4] == "0")
				{
					$diasmas .= "viernes ";
				}
				if($depuradord[5] == "0")
				{
					$diasmas .= "sabado ";
				}
				if($depuradord[6] == "0")
				{
					$diasmas .= "domingo ";
				}


				$linea = strtolower($baseot["nombre"].' '.$baseot["classy"].' '.$baseot["calle"].' '.$baseot["numedi"].' '.$baseot["colonia"].' '.$baseot["delegacion"].' '.$baseot["ciudad"].' '.$baseot["copos"].' '.$baseot["palclaves"].' '.$diasmas);
				$linea = changeletter("."," ", $linea);
				$linea = changeletter(","," ", $linea);
				$linea = changeletter(":"," ", $linea);
				$linea = changeletter("-"," ", $linea);
				$linea = changeletter("á","a", $linea);
				$linea = changeletter("é","e", $linea);
				$linea = changeletter("í","i", $linea);
				$linea = changeletter("ó","o", $linea);
				$linea = changeletter("ú","u", $linea);
				$linea = changeletter("ü","u", $linea);
				$linea = changeletter("Á","A", $linea);
				$linea = changeletter("É","E", $linea);
				$linea = changeletter("Í","I", $linea);
				$linea = changeletter("Ó","O", $linea);
				$linea = changeletter("Ú","U", $linea);
				$linea = changeletter("Ü","U", $linea);
				$linea = changeletter("ñ","n", $linea);
				$linea = changeletter("Ñ","N", $linea);

				$depurador = explode( ' ', $linea);
				$count = sizeof($depurador);

				$busqueda = changeletter("%C3%B1","ñ", $busqueda);
				$busqueda = changeletter("%C3%91","Ñ", $busqueda);
				$busqueda = changeletter("%c3%a1","á", $busqueda);
				$busqueda = changeletter("%c3%a9","é", $busqueda);
				$busqueda = changeletter("%c3%ad","í", $busqueda);
				$busqueda = changeletter("%c3%b3","ó", $busqueda);
				$busqueda = changeletter("%c3%ba","ú", $busqueda);
				$busqueda = changeletter("%c3%bc","ü", $busqueda);
				$busqueda = changeletter("%c3%81","Á", $busqueda);
				$busqueda = changeletter("%c3%89","É", $busqueda);
				$busqueda = changeletter("%c3%8d","Í", $busqueda);
				$busqueda = changeletter("%c3%93","Ó", $busqueda);
				$busqueda = changeletter("%c3%9a","Ú", $busqueda);
				$busqueda = changeletter("%c3%9c","Ü", $busqueda);
				$busqueda = changeletter("ñ","n", $busqueda);
				$busqueda = changeletter("Ñ","N", $busqueda);
				$busqueda = changeletter("á","a", $busqueda);
				$busqueda = changeletter("é","e", $busqueda);
				$busqueda = changeletter("í","i", $busqueda);
				$busqueda = changeletter("ó","o", $busqueda);
				$busqueda = changeletter("ú","u", $busqueda);
				$busqueda = changeletter("ü","u", $busqueda);
				$busqueda = changeletter("Á","A", $busqueda);
				$busqueda = changeletter("É","E", $busqueda);
				$busqueda = changeletter("Í","I", $busqueda);
				$busqueda = changeletter("Ó","O", $busqueda);
				$busqueda = changeletter("Ú","U", $busqueda);
				$busqueda = changeletter("Ü","U", $busqueda);

				$depuradorb = explode( '-', $busqueda);
				$countb = sizeof($depuradorb);

				for ($b = 0; $b < $countb; $b++) 
				{
					for ($i = 0; $i < $count; $i++) 
					{
						if($depurador[$i] == strtolower($depuradorb[$b]))
						{
							$sies = true;
						}
						////MANEJAR S
						if($sies == false)
						{
							if(substr($depurador[$i], -1) == "s")
							{
								$pal = substr($depurador[$i], 0, -1);
								if($pal == strtolower($depuradorb[$b]))
								{
									$sies = true;
								}
							}
							if(substr($depuradorb[$b], -1) == "s")
							{
								$pal = substr($depuradorb[$b], 0, -1);
								if($depurador[$i] == $pal)
								{
									$sies = true;
								}
							}
							if(substr($depurador[$i], -2) == "es")
							{
								$pal = substr($depurador[$i], 0, -2);
								if($pal == strtolower($depuradorb[$b]))
								{
									$sies = true;
								}
							}
							if(substr($depuradorb[$b], -2) == "es")
							{
								$pal = substr($depuradorb[$b], 0, -2);
								if($depurador[$i] == $pal)
								{
									$sies = true;
								}
							}
						}
					}
				}
				///SI ENCUENTRA
				if($sies == true)
				{
					array_push($tipo_local, $baseot["tipo"]);
					array_push($nombre_local, $baseot["nombre"]);
					array_push($clase_local, $baseot["classy"]);
					array_push($dias_local, $baseot["dias"]);
					array_push($abierto_local, $baseot["abierto"]);
					array_push($cerrado_local, $baseot["cerrado"]);
					array_push($calle_local, $baseot["calle"]);
					array_push($numero_local, $baseot["numedi"]);
					array_push($colonia_local, $baseot["colonia"]);
					array_push($delegacion_local, $baseot["delegacion"]);
					array_push($ciudad_local, $baseot["ciudad"]);
					array_push($cp_local, $baseot["copos"]);
					array_push($telefono_local, $baseot["telefono"]);
					array_push($envio_local, $baseot["envios"]);
					array_push($palabras_local, $baseot["palclaves"]);
					////
					array_push($facebook_local, $baseot["facedi"]);
					array_push($instagram_local, $baseot["instadi"]);
					array_push($web_local, $baseot["dweb"]);
					array_push($googlemap_local, $baseot["googlem"]);
					array_push($menu_local, $baseot["menud"]);
					///
					$conteo ++;
					$sies = false;
				}
			}
		}
	}
	if($pagebe == "buscando-ahora")
	{
		$busqueda = strtolower($urlmain->segment(2));

		require_once('connectvar.php');
		$dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);
		if($dbc)
		{
			$sies = false;
			$conteo = 0;
			$tipo_local = array();
			$nombre_local = array();
			$clase_local = array();
			$dias_local = array();
			$abierto_local = array();
			$cerrado_local = array();
			$calle_local = array();
			$numero_local = array();
			$delegacion_local = array();
			$colonia_local = array();
			$ciudad_local = array();
			$cp_local = array();
			$telefono_local = array();
			$envio_local = array();
			$palabras_local = array();
			///
			$facebook_local = array();
			$instagram_local = array();
			$web_local = array();
			$googlemap_local = array();
			$menu_local = array();

			$sql= "SELECT * FROM localito";
			$data = mysqli_query($dbc,$sql);

			while ($baseot = mysqli_fetch_array($data))
			{	
				/////VER SI DIA CONCUERDA
				$diasmas = "";
				$depuradord = explode( ',', $baseot["dias"]);
				if($depuradord[$diasem - 1] == "0")
				{
					////CHECAR HORA
					$abiertoh = $baseot["abierto"];
					$abiertoh =eraseletter(':00', $abiertoh);
					$abiertoh = intval($abiertoh);
					$cerradoh = $baseot["cerrado"];
					$cerradoh =eraseletter(':00', $cerradoh);
					$cerradoh = intval($cerradoh);

					if($hora >= $abiertoh && $hora < $cerradoh)
					{
						////BUSQUEDA GENERAL
						$linea = strtolower($baseot["nombre"].' '.$baseot["classy"].' '.$baseot["calle"].' '.$baseot["numedi"].' '.$baseot["colonia"].' '.$baseot["delegacion"].' '.$baseot["ciudad"].' '.$baseot["copos"].' '.$baseot["palclaves"]);
						$linea = changeletter("."," ", $linea);
						$linea = changeletter(","," ", $linea);
						$linea = changeletter(":"," ", $linea);
						$linea = changeletter("-"," ", $linea);
						$linea = changeletter("á","a", $linea);
						$linea = changeletter("é","e", $linea);
						$linea = changeletter("í","i", $linea);
						$linea = changeletter("ó","o", $linea);
						$linea = changeletter("ú","u", $linea);
						$linea = changeletter("ü","u", $linea);
						$linea = changeletter("Á","A", $linea);
						$linea = changeletter("É","E", $linea);
						$linea = changeletter("Í","I", $linea);
						$linea = changeletter("Ó","O", $linea);
						$linea = changeletter("Ú","U", $linea);
						$linea = changeletter("Ü","U", $linea);
						$linea = changeletter("ñ","n", $linea);
						$linea = changeletter("Ñ","N", $linea);

						$depurador = explode( ' ', $linea);
						$count = sizeof($depurador);

						$busqueda = changeletter("%C3%B1","ñ", $busqueda);
						$busqueda = changeletter("%C3%91","Ñ", $busqueda);
						$busqueda = changeletter("%c3%a1","á", $busqueda);
						$busqueda = changeletter("%c3%a9","é", $busqueda);
						$busqueda = changeletter("%c3%ad","í", $busqueda);
						$busqueda = changeletter("%c3%b3","ó", $busqueda);
						$busqueda = changeletter("%c3%ba","ú", $busqueda);
						$busqueda = changeletter("%c3%bc","ü", $busqueda);
						$busqueda = changeletter("%c3%81","Á", $busqueda);
						$busqueda = changeletter("%c3%89","É", $busqueda);
						$busqueda = changeletter("%c3%8d","Í", $busqueda);
						$busqueda = changeletter("%c3%93","Ó", $busqueda);
						$busqueda = changeletter("%c3%9a","Ú", $busqueda);
						$busqueda = changeletter("%c3%9c","Ü", $busqueda);
						$busqueda = changeletter("ñ","n", $busqueda);
						$busqueda = changeletter("Ñ","N", $busqueda);
						$busqueda = changeletter("á","a", $busqueda);
						$busqueda = changeletter("é","e", $busqueda);
						$busqueda = changeletter("í","i", $busqueda);
						$busqueda = changeletter("ó","o", $busqueda);
						$busqueda = changeletter("ú","u", $busqueda);
						$busqueda = changeletter("ü","u", $busqueda);
						$busqueda = changeletter("Á","A", $busqueda);
						$busqueda = changeletter("É","E", $busqueda);
						$busqueda = changeletter("Í","I", $busqueda);
						$busqueda = changeletter("Ó","O", $busqueda);
						$busqueda = changeletter("Ú","U", $busqueda);
						$busqueda = changeletter("Ü","U", $busqueda);

						$depuradorb = explode( '-', $busqueda);
						$countb = sizeof($depuradorb);

						for ($b = 0; $b < $countb; $b++) 
						{
							for ($i = 0; $i < $count; $i++) 
							{
								if($depurador[$i] == strtolower($depuradorb[$b]))
								{
									$sies = true;
								}
								////MANEJAR S
								if($sies == false)
								{
									if(substr($depurador[$i], -1) == "s")
									{
										$pal = substr($depurador[$i], 0, -1);
										if($pal == strtolower($depuradorb[$b]))
										{
											$sies = true;
										}
									}
									if(substr($depuradorb[$b], -1) == "s")
									{
										$pal = substr($depuradorb[$b], 0, -1);
										if($depurador[$i] == $pal)
										{
											$sies = true;
										}
									}
								}
							}
						}
					}
				}
				///SI ENCUENTRA
				if($sies == true)
				{
					array_push($tipo_local, $baseot["tipo"]);
					array_push($nombre_local, $baseot["nombre"]);
					array_push($clase_local, $baseot["classy"]);
					array_push($dias_local, $baseot["dias"]);
					array_push($abierto_local, $baseot["abierto"]);
					array_push($cerrado_local, $baseot["cerrado"]);
					array_push($calle_local, $baseot["calle"]);
					array_push($numero_local, $baseot["numedi"]);
					array_push($colonia_local, $baseot["colonia"]);
					array_push($delegacion_local, $baseot["delegacion"]);
					array_push($ciudad_local, $baseot["ciudad"]);
					array_push($cp_local, $baseot["copos"]);
					array_push($telefono_local, $baseot["telefono"]);
					array_push($envio_local, $baseot["envios"]);
					array_push($palabras_local, $baseot["palclaves"]);
					////
					array_push($facebook_local, $baseot["facedi"]);
					array_push($instagram_local, $baseot["instadi"]);
					array_push($web_local, $baseot["dweb"]);
					array_push($googlemap_local, $baseot["googlem"]);
					array_push($menu_local, $baseot["menud"]);
					$conteo ++;
					$sies = false;
				}
			}
		}
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6N4JHPMPZH"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-6N4JHPMPZH');
	</script>
	<title>Ponme Local</title>
	<meta name="description" content="Esta página esta creada con la intención de crear una comunidad de consumo local y así lograr apoyar a los locales cercanos.">
	<meta property="og:url"  content="https://ponmelocal.com" />
	<meta property="og:title" content="Ponme Local" />
	<meta property="og:description" content="Esta página esta creada con la intención de crear una comunidad de consumo local y así lograr apoyar a los locales cercanos." />
	<?php
		if( isset($_SERVER['HTTPS'] ) ) 
		{
			$linkinit = "https://".$_SERVER['HTTP_HOST'];
		}
		else
		{
			$linkinit = "http://".$_SERVER['HTTP_HOST'];
		}
		echo '<meta property="og:image" content="'.$linkinit.'/img/postimg.png"/>';
	?>
	<meta name="keywords" content="Local, puesto, mercado, comida, cena, desayuno, horario, buscar, encontrar, fonda, fondita, servicio, envío, botana, merienda, saludable, vegano, sabroso, foodgasm, anuncio, mejor, calificación, buscador, busqueda, tacos, enchilada, sopa, comida corrida, tienda, bar, cocina, comida cacera, rumbo, higiene.">
	<meta property="og:locale" content="es_MX" />
	<meta property="og:type" content="website" />
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700|Archivo+Black:400,700|Lalezar:400,700|Roboto:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css'>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/7d931a3f92.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/update.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php
		// echo '<link rel="stylesheet" type="text/css" href="'.$linkinit.'/css/general.css?'.$stamp_time.'">';
	?>
	<meta property="og:image:width" content="900" />
	<meta property="og:image:height" content="560" />
	<link rel="canonical" href="https://ponmelocal.com" />
</head>
<body style="margin: 0px">
	<div class="visibledesk">
		<div id="balanza"></div>
	</div>
	<div class="container_f" style="width: 100%;">
		<!--CONTENIDO DE PAGINA-->
		<?php
		switch ($pagebe)
		{
			case '' :
			require_once('templates/index.php');
			break;
			case 'contactanos' :
			require_once('templates/contactanos.php');
			break;
			case 'terminos-condiciones' :
			require_once('templates/terminos-condiciones.php');
			break;
			case 'buscando' :
			require_once('templates/buscando.php');
			break;
			case 'buscando-ahora' :
			require_once('templates/buscando.php');
			break;
			case 'unete-ahora' :
			require_once('templates/unete-ahora.php');
			break;
			case 'bienvenida' :
			require_once('templates/bienvenida.php');
			break;
		}
		?>
		<!--FIN CONTENIDO DE PAGINA-->
	</div>
	<!--FOOTER-->
	<footer  class=' footer px-3 py-4 px- d-flex flex-wrap gap-3 align-items-center '>

		<div class='d-flex gap-3 col-12 col-lg-6 mx-auto justify-content-between' >
			<?php echo '<a href="'.$linkinit.'/terminos-condiciones">'; ?>
								<p style="color: #EBBE69;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;max-width: 400px;line-height: 30px;" class='m-0' >
									<strong>T&Eacute;RMINOS Y CONDICIONES</strong>
								</p>
			</a>

			<?php echo '<a href="'.$linkinit.'/contactanos">'; ?>
								<p style="color: #EBBE69;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;max-width: 400px;line-height: 30px;" class='m-0'>
									<strong>CONT&Aacute;CTANOS</strong>
								</p>
			</a>						
			<div class='redes d-flex align-items-center gap-3  justify-content-center' >
				<i class='fa-brands fa-facebook' ></i>
				<i class='fa-brands fa-instagram' ></i>
			</div>
		</div>


	
		<div class='col-12 col-lg-5 mx-auto d-flex justify-content-center ' >
			<p style="color: #EBBE69;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;max-width: 400px;line-height: 30px;">
									<strong>&copy; PonmeLocal <span id="anobe">2019</span>. Todos los derechos reservados.</strong>
			</p>
		</div>		
		
	</footer>
</body>
<!-- MAIN CODE -->
<script>
	////EXTRACODIGO
	<?php
		switch ($pagebe)
		{
			case '' :
			require_once('codebase/busqueda_mandar.js');
			require_once('codebase/balancear.js');
			break;
			case 'buscando' :
			require_once('codebase/busqueda_mandar.js');
			break;
			case 'buscando-ahora' :
			require_once('codebase/busqueda_mandar.js');
			break;
			case 'unete-ahora' :
			require_once('codebase/formulario_mandar.js');
			break;
		}
	?>




	////AÑO DE PRIVACIDAD
	document.getElementById("anobe").innerHTML = new Date().getFullYear();
	document.getElementById("anobe2").innerHTML = new Date().getFullYear();
</script>



</html>
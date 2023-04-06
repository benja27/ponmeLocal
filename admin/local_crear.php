<?php
	require_once('sessionstarter.php');
	$postnum = $_GET['selec'];
	$enviadoes = $_POST['enviadoes'];
	$cuies = $_POST['cuies'];
	if( isset($_SERVER['HTTPS'] ) ) 
	{
		$linktotal = "https://".$_SERVER['HTTP_HOST'];
	}
	else
	{
		$linktotal = "http://".$_SERVER['HTTP_HOST'];
	}
	if ($enviadoes == "sip")
	{
		$dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);
		if($dbc)
		{
			///POST DATA
			$tipodedisplay = $_POST['tipodedisplay'];
			$nombrelo = $_POST['nombrelo'];
			$claselo = $_POST['claselo'];
			$lunes = $_POST['lunes'];
			$martes = $_POST['martes'];
			$miercoles = $_POST['miercoles'];
			$jueves = $_POST['jueves'];
			$viernes = $_POST['viernes'];
			$sabado = $_POST['sabado'];
			$domingo = $_POST['domingo'];
			$abierto = $_POST['abierto'];
			$cerrado = $_POST['cerrado'];
			$callelo = $_POST['callelo'];
			$numelo = $_POST['numelo'];
			$colonialo = $_POST['colonialo'];
			$delegacionlo = $_POST['delegacionlo'];
			$ciudadlo = $_POST['ciudadlo'];
			$coposlo = $_POST['coposlo'];
			$envio = $_POST['envio'];
			$palclo = $_POST['palclo'];
			$facelo = $_POST['facelo'];
			$instalo = $_POST['instalo'];
			$paginalo = $_POST['paginalo'];
			$maplo = $_POST['maplo'];
			$menulo = $_POST['menulo'];
			$tello = $_POST['tello'];

			$dias = $lunes.','.$martes.','.$miercoles.','.$jueves.','.$viernes.','.$sabado.','.$domingo;

			if($cuies == "")
			{
				///FECHA
				$tz = 'America/Mexico_City';
				$timestamp = time();
				$dt = new DateTime("now", new DateTimeZone($tz));
				$dt->setTimestamp($timestamp);
				$dia = $dt->format("d");
				$mes = $dt->format("n");
				$ano = $dt->format("Y");
				$fecha = $dia.'/'.$mes.'/'.$ano;
				$fecha2 = $dia.''.$mes.''.$ano;
				$hora = date('H:i');

				////CLAVE UNICA
				$idesma = "";
				$idesma .= "local".$fecha2;
				$characters = '0123456789abcdefghijkmnlopqrstwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$%&?¿#';
				for ($i = 0; $i < 10; $i++) {
					$idesma .= $characters[rand(0, 40)];
				}
				////SUBIR DATOS
				$sql = "INSERT INTO localito (id, tipo, nombre, classy, dias, abierto, cerrado, calle, numedi, colonia, delegacion, ciudad, copos, telefono, envios, palclaves, facedi, instadi, googlem, googleb, dweb, menud) VALUES ('$idesma', '$tipodedisplay', '$nombrelo', '$claselo', '$dias', '$abierto', '$cerrado', '$callelo', '$numelo', '$colonialo', '$delegacionlo', '$ciudadlo', '$coposlo', '$tello', '$envio', '$palclo', '$facelo', '$instalo', '$maplo', '0', '$paginalo', '$menulo')";
				mysqli_query($dbc, $sql);

				echo "<script>window.location.href='locales.php';</script>";
    			exit;
			}
			else
			{
				$sql = "UPDATE localito SET tipo='$tipodedisplay', nombre='$nombrelo', classy='$claselo', dias='$dias', abierto='$abierto', cerrado='$cerrado', calle='$callelo', numedi='$numelo', colonia='$colonialo', delegacion='$delegacionlo', ciudad='$ciudadlo', copos='$coposlo', telefono='$tello', envios='$envio', palclaves='$palclo', facedi='$facelo', instadi='$instalo', googlem='$maplo', dweb='$paginalo', menud='$menulo' WHERE id='$cuies'";
	    		mysqli_query($dbc, $sql);
	    		echo "<script>window.location.href='locales.php';</script>";
    			exit;
			}
		}
	}
	if($postnum != "")
	{
		$dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);

		if($dbc)
		{
			$sql= "SELECT * FROM localito WHERE id='$postnum'";
			$data = mysqli_query($dbc,$sql);

			while ($baseot = mysqli_fetch_array($data))
			{
				$tipodedisplay = $baseot["tipo"];
				$nombrelo = $baseot["nombre"];
				$claselo = $baseot["classy"];

				$dias = $baseot["dias"];

				$subdias = explode( ",", $dias);

				$lunes = $subdias[0];
				$martes = $subdias[1];
				$miercoles = $subdias[2];
				$jueves = $subdias[3];
				$viernes = $subdias[4];
				$sabado = $subdias[5];
				$domingo = $subdias[6];

				$abierto = $baseot["abierto"];
				$cerrado = $baseot["cerrado"];
				$callelo = $baseot["calle"];
				$numelo = $baseot["numedi"];
				$colonialo = $baseot["colonia"];
				$delegacionlo = $baseot["delegacion"];
				$ciudadlo = $baseot["ciudad"];
				$coposlo = $baseot["copos"];
				$tello = $baseot["telefono"];
				$envio = $baseot["envios"];
				$palclo = $baseot["palclaves"];
				$facelo = $baseot["facedi"];
				$instalo = $baseot["instadi"];
				$paginalo = $baseot["dweb"];
				$maplo = $baseot["googlem"];
				$menulo = $baseot["menud"];
			}
		}
	}
?>	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="en">
<head>
	<title>PONMELOCAL ©</title>
	<meta name="description" content="">
	<meta name="keywords" content="....">
	<meta property="og:locale" content="es_MX" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<!--TIPOGRAFIAS GOOGLE-->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700|Archivo+Black:400,700|Lalezar:400,700|Roboto:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<?php
		echo'<link rel="shortcut icon" href="'.$linktotal.'/img/favicon.ico" type="image/x-icon">';
	?>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php
		echo'<link rel="stylesheet" type="text/css" href="'.$linktotal.'/css/general.css">';
	?>
</head>
<body style="background-color: #fff;">
<div style="position: fixed;height: 100%;z-index: 99999;left: -10px;">
		<div style="background-color: #4cc3a1;padding-left: 50px;padding-top: 30px;width: 250px;height: 100%;">
			<?php
				require_once('menu_all.php');
			?>	
		</div>
	</div>
	<div style="padding-left: 250px;padding-bottom: 100px;">
		<form enctype="multipart/form-data" id="ingresaru" name="ingresaru" method="post" action= "<?php echo $_SERVER['PHP_SELF'];?>">
			<!--USUARI BARRA-->
			<div style="height: 60px;margin-top: -10px;padding-right: 40px;padding-top: 30;">
				<table align="right" style="">
					<td>
						<button type="submit" name="logeout" style="height: 40px;width: 40px;border-radius: 10px;background-color:#4cc3a1;padding-left: 4px;padding-top: 2px;border-color: #4cc3a1;cursor:hand;">
							<i class="material-icons" style="font-size:23px;display: inline-flex;vertical-align: middle;padding-top: 0px;color: #fff;">power_settings_new</i>
						</button>
					</td>
				</table>
			</div>
			<!--SECCION PAGINA-->
			<div style="padding-right: 40px;padding-bottom: 10px;">
				<h1 style="font-size: 25px;color:#0e0e0e;text-align: right;">LOCALES <span style="color: #4cc3a1;"> > </span> CREAR LOCAL</h1>
			</div>
			<div style="width: 110%;height: 3px;background-color: #4cc3a1;"></div>
			<!--CONTENIDO-->
			<div style="padding-right: 40px;padding-top: 40px;padding-left: 80px;">
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Tipo cuenta:</h1>
				<select id="tipodedisplay" name="tipodedisplay" style="width:180px;">
					<?php
						if($tipodedisplay == "0" || $tipodedisplay == "")
						{
							echo'<option value="0" selected>Normal</option>';
							echo'<option value="1" >Premium</option>';
						}
						else
						{
							echo'<option value="0" >Normal</option>';
							echo'<option value="1" selected>Premium</option>';
						}
					?>
				</select>
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Nombre Local*:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="nombrelo" name="nombrelo" <?php echo 'value="'.$nombrelo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Clase Local*:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="claselo" name="claselo" <?php echo 'value="'.$claselo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Dias abierto:</h1>
				<table>
					<tr>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Lunes</h1>
							<select id="lunes" name="lunes" style="width:50px;">
								<?php
									if($lunes == "0" || $lunes == "")
									{
										echo'<option value="0" selected>SI</option>';
										echo'<option value="1" >NO</option>';
									}
									else
									{
										echo'<option value="0" >SI</option>';
										echo'<option value="1" selected>NO</option>';
									}
								?>
							</select>
						</td>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Martes</h1>
							<select id="martes" name="martes" style="width:50px;">
								<?php
									if($martes == "0" || $martes == "")
									{
										echo'<option value="0" selected>SI</option>';
										echo'<option value="1" >NO</option>';
									}
									else
									{
										echo'<option value="0" >SI</option>';
										echo'<option value="1" selected>NO</option>';
									}
								?>
							</select>
						</td>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Miercoles</h1>
							<select id="miercoles" name="miercoles" style="width:50px;">
								<?php
									if($miercoles == "0" || $miercoles == "")
									{
										echo'<option value="0" selected>SI</option>';
										echo'<option value="1" >NO</option>';
									}
									else
									{
										echo'<option value="0" >SI</option>';
										echo'<option value="1" selected>NO</option>';
									}
								?>
							</select>
						</td>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Jueves</h1>
							<select id="jueves" name="jueves" style="width:50px;">
								<?php
									if($jueves == "0" || $jueves == "")
									{
										echo'<option value="0" selected>SI</option>';
										echo'<option value="1" >NO</option>';
									}
									else
									{
										echo'<option value="0" >SI</option>';
										echo'<option value="1" selected>NO</option>';
									}
								?>
							</select>
						</td>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Viernes</h1>
							<select id="viernes" name="viernes" style="width:50px;">
								<?php
									if($viernes == "0" || $viernes == "")
									{
										echo'<option value="0" selected>SI</option>';
										echo'<option value="1" >NO</option>';
									}
									else
									{
										echo'<option value="0" >SI</option>';
										echo'<option value="1" selected>NO</option>';
									}
								?>
							</select>
						</td>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Sabado</h1>
							<select id="sabado" name="sabado" style="width:50px;">
								<?php
									if($sabado == "0" || $sabado == "")
									{
										echo'<option value="0" selected>SI</option>';
										echo'<option value="1" >NO</option>';
									}
									else
									{
										echo'<option value="0" >SI</option>';
										echo'<option value="1" selected>NO</option>';
									}
								?>
							</select>
						</td>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Domingo</h1>
							<select id="domingo" name="domingo" style="width:50px;">
								<?php
									if($domingo == "0" || $domingo == "")
									{
										echo'<option value="0" selected>SI</option>';
										echo'<option value="1" >NO</option>';
									}
									else
									{
										echo'<option value="0" >SI</option>';
										echo'<option value="1" selected>NO</option>';
									}
								?>
							</select>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Horario:</h1>
				<table>
					<tr>
						<td style="width: 120px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Abierto</h1>
							<select id="abierto" name="abierto" style="width:80px;">
								<?php
									for ($i = 0; $i < 24; $i++) 
									{
										if($i < 10)
										{
											$horarioc = "0".$i.":00";
										}
										else
										{
											$horarioc = $i.":00";
										}
										
										if($abierto == $horarioc)
										{
											echo '<option value="'.$horarioc.'" selected>'.$horarioc.'</option>';
										}
										else
										{
											echo '<option value="'.$horarioc.'" >'.$horarioc.'</option>';
										}
									}
								?>
								
							</select>
						</td>
						<td style="width: 50px;">
							<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">A</h1>
						</td>
						<td style="width: 100px;">
							<h1 style="font-size: 18px;color:#5c5c5c;text-align: left;">Cerrado</h1>
							<select id="cerrado" name="cerrado" style="width:80px;">
								<?php
									for ($i = 0; $i < 24; $i++) 
									{
										if($i < 10)
										{
											$horarioc = "0".$i.":00";
										}
										else
										{
											$horarioc = $i.":00";
										}
										
										if($cerrado == $horarioc)
										{
											echo '<option value="'.$horarioc.'" selected>'.$horarioc.'</option>';
										}
										else
										{
											echo '<option value="'.$horarioc.'" >'.$horarioc.'</option>';
										}
									}
								?>
							</select>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Calle*:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="callelo" name="callelo" <?php echo 'value="'.$callelo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">N&uacute;mero Ext:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="numelo" name="numelo" <?php echo 'value="'.$numelo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Colonia:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="colonialo" name="colonialo" <?php echo 'value="'.$colonialo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Delegaci&oacute;n:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="delegacionlo" name="delegacionlo" <?php echo 'value="'.$delegacionlo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Ciudad:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="ciudadlo" name="ciudadlo" <?php echo 'value="'.$ciudadlo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">CP:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="coposlo" name="coposlo" <?php echo 'value="'.$coposlo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Tel&eacute;fono*:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="tello" name="tello" <?php echo 'value="'.$tello.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Envios:</h1>
				<select id="envio" name="envio" style="width:180px;">
					<?php
						if($envio == "0" || $envio == "")
						{
							echo'<option value="0" selected>SI</option>';
							echo'<option value="1" >NO</option>';
						}
						else
						{
							echo'<option value="0" >SI</option>';
							echo'<option value="1" selected>NO</option>';
						}
					?>
				</select>
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Palabras clava*:</h1>
				<input class="form-control" style="width: 500px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 12px;" type="text" id="palclo" name="palclo" <?php echo 'value="'.$palclo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">P&aacute;gina Facebook:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="facelo" name="facelo" <?php echo 'value="'.$facelo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">P&aacute;gina Instagram:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="instalo" name="instalo"  <?php echo 'value="'.$instalo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">P&aacute;gina Web:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="paginalo" name="paginalo"  <?php echo 'value="'.$paginalo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Google Map:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="maplo" name="maplo"  <?php echo 'value="'.$maplo.'"'; ?> />
				<br>
				<br>
				<h1 style="font-size: 18px;color:#0e0e0e;text-align: left;">Men&uacute; ID:</h1>
				<input class="form-control" style="width: 300px;height: 60px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: left;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="menulo" name="menulo"  <?php echo 'value="'.$menulo.'"'; ?> />
				<br>
				<br>
				<br>
				<br>
				<div onclick="mandarforma()" style="border-radius: 10px;border: 2px solid;border-color: #4cc3a1;width: 200px;height: 60px;background-color: #4cc3a1;font-size:18px;color: #ffffff;cursor: hand;user-select: none;"><center><h1 style="font-size:20px;color: #ffffff;text-align: center;line-height: 34px">AGREGAR +</h1></center>
					</div>
			</div>
			<?php
				if($postnum != "")
				{

					echo'<input id="salvado" name="salvado" type="hidden" value="1">';
					echo'<input id="cuies" name="cuies" type="hidden" value="'.$postnum.'">';
				}
				else
				{
					echo'<input id="salvado" name="salvado" type="hidden" value="0">';
					echo'<input id="cuies" name="cuies" type="hidden" value="">';
				}
			?>	
			<input id="enviadoes" name="enviadoes" type="hidden" value="">
		</form>
	</div>
</body>
<!-- MAIN CODE -->
<script>
/////FUNCION MANDAR FORMA
function mandarforma() {

	nombresta = $('#nombrelo').val();
	claseesta = $('#claselo').val();
	abiertota = $('#abierto').val();
	cerradota = $('#cerrado').val();
	telefonta = $('#tello').val();
	palclavta = $('#palclo').val();

	if(nombresta != "" && claseesta !="" && telefonta !="" && palclavta !="")
	{
		if(abiertota != cerradota)
		{
			$('#enviadoes').val("sip");
			document.getElementById("ingresaru").submit();
		}
		else
		{
			alert("La hora de apertura y cierre no deben de ser la misma.");
		}
	}
	else
	{
		alert("Complete todas las casillas con *.");
	}
}
</script>
</html>
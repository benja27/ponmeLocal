<?php
	require_once('sessionstarter.php');
	$postnum = $_GET['selec'];

	if( isset($_SERVER['HTTPS'] ) ) 
	{
		$linktotal = "https://".$_SERVER['HTTP_HOST'];
	}
	else
	{
		$linktotal = "http://".$_SERVER['HTTP_HOST'];
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
	<div style="padding-left: 250px;">
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
				<h1 style="font-size: 25px;color:#0e0e0e;text-align: right;">INICIO</h1>
			</div>
			<div style="width: 110%;height: 3px;background-color: #4cc3a1;"></div>
			<!--CONTENIDO-->
			<div style="padding-right: 40px;padding-top: 40px;padding-left: 40px;">

			</div>
		</form>
	</div>
</body>
<!-- MAIN CODE -->
<script>
</script>
</html>
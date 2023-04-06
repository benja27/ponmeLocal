<?php
	session_start();
	require_once('connectvar.php');
	if( isset($_SERVER['HTTPS'] ) ) 
	{
		$linktotal = "https://".$_SERVER['HTTP_HOST'];
	}
	else
	{
		$linktotal = "http://".$_SERVER['HTTP_HOST'];
	}
	/////CHECAR SESIONES ACTIVAS
	$dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);
	if($_SESSION["manager"] != "")
	{
		$url = 'http://'.$_SERVER['HTTP_HOST'];
   		header('Location:'.$url.'/admin/index.php');
	}
	//LOGIN MANAGER
	if (isset($_POST["ingresaru"]))
	{
	    $dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);
	    if($dbc)
	    {
	    	$usuariosi = false;
	    	$error = 0;
	    	$usuarioes = $_POST['usuarioes'];
	    	$contrasenaes = $_POST['contrasenaes'];
	    	//OBTENER DATO
	    	$texc= array ();
	    	$sql= "SELECT * FROM maspeper";
	    	$data = mysqli_query($dbc,$sql);
	    	while ($baseot = mysqli_fetch_array($data))
	    	{
	    		//BUSCAR
	    		if($baseot['chile'] == $usuarioes)
		        {
		        	$usuariosi = true;
		        }
	      	}
	      	if($usuariosi == true)
	      	{
	      		$sql= "SELECT * FROM maspeper WHERE chile='$usuarioes'";
	      		$data = mysqli_query($dbc,$sql);
	      		$baseot = mysqli_fetch_array($data);
	      		if($baseot['frijol'] == $contrasenaes)
	      		{
	      			$_SESSION["manager"] = $baseot['chile'];
	      			/////
	      			$url = 'http://'.$_SERVER['HTTP_HOST'];
	      			header('Location:'.$url.'/admin/index.php');
	      		}
	      		else
	      		{
	      			echo "<script type='text/javascript'>alert('El password es incorrecto');</script>";
	      			$error = 2;
	      		}
	      	}
	      	else
	      	{
	      		echo "<script type='text/javascript'>alert('El correo o usuario es incorrecto');</script>";
	      		$error = 1;
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
	<div class="row">
		
	</div>
	<form enctype="multipart/form-data" method="post" action= "<?php echo $_SERVER['PHP_SELF'];?>">
		<div class="row" style="padding-top: 40px;">
			<center>
				<h1 style="font-size: 20px;color:#0e0e0e;text-align: center;font-family: 'Archivo Black', sans-serif;"><u>ACCESO A MANAGER</u></h1>
				<br>
				<br>
				<h1 style="font-size: 20px;color:#0e0e0e;text-align: center;">USUARIO:</h1>
				<input class="inputes" style="width: 300px;height: 30px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="text" id="usuarioes" name="usuarioes" value=""/>
				<br>
				<br>
				<h1 style="font-size: 20px;color:#0e0e0e;text-align: center;">CONTRASE&Ntilde;A:</h1>
				<input class="inputes" style="width: 300px;height: 30px;border-bottom: 3px solid #4cc3a1;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;" type="password" id="contrasenaes" name="contrasenaes" value=""/>
				<br>
				<br>
				<br>
				<br>
				<button style="border-radius: 10px;margin-right: auto;margin-left: auto;border: 2px solid;border-color: #4cc3a1;width: 200px;height: 60px;background-color: #4cc3a1;color: #ffffff;cursor: hand;" type="submit" name="ingresaru"><center><h1 style="font-size:20px;color: #ffffff;text-align: center;line-height: 0px;">ACCEDER</h1></center>
				</button>
			</center>
		</div>
	</form>
</body>
<!-- MAIN CODE -->
<script>
</script>
</html>
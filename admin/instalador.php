<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="en">
<head>
	<title>INSTALADOR DE SISTEMA</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<!--CSS-->
		<link rel="stylesheet" href="style/pixin.css"/>
</head>
	<body>
		<div class = "contenedorb">
			<div class = "contenedorg">
				<div class = "grissup"></div>
				<div class = "logopix"></div>
				<h2 style="position: absolute;top: 130px;left: 260px;">BIENVENIDOS AL INSTALADOR SISTEMA</h2>
				<h4 style="position: absolute;top: 230px;left: 0px;">- Aprete el boton para instalar las tablas.</h4>
				<div style="position:absolute;top: 280px;left: 0px;width: 900;">
					<hr>
					<form enctype="multipart/form-data" method="post" action= "<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000"/>
						<br/>
						<input type="submit" name="submit" value="Submit"/>
					</form>
					<hr>
				</div>
				<?php
					require_once('connectvar.php');
					if (isset($_POST["submit"])){
						// $dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD,MI_DB);
						$dbc = mysqli_connect("localhost","root","","local");
						echo'<div style="position:absolute;top: 500px;width: 900;>"';
						//CHECK CONNECTION
						if ($dbc) {
							//CREATE LIGAS
							$sql = "SELECT 1 FROM localito LIMIT 1";
							if(mysqli_query($dbc, $sql))
							{
								echo'existe localito <br>';
							  	echo'existe localito <br>';
							}
							else
							{
							    $sql = "CREATE TABLE localito (id VARCHAR(50) NOT NULL, tipo VARCHAR(5) NOT NULL, nombre VARCHAR(50) NOT NULL, classy VARCHAR(50) NOT NULL, dias VARCHAR(50) NOT NULL, abierto VARCHAR(10) NOT NULL, cerrado VARCHAR(10) NOT NULL, calle VARCHAR(100) NOT NULL, numedi VARCHAR(100) NOT NULL, colonia VARCHAR(100) NOT NULL, delegacion VARCHAR(100) NOT NULL, ciudad VARCHAR(100) NOT NULL, copos VARCHAR(100) NOT NULL, telefono VARCHAR(20) NOT NULL, envios VARCHAR(5) NOT NULL, palclaves MEDIUMTEXT NOT NULL, facedi VARCHAR(100) NOT NULL, instadi VARCHAR(100) NOT NULL, googlem VARCHAR(1000) NOT NULL, googleb VARCHAR(1000) NOT NULL, dweb VARCHAR(1000) NOT NULL, menud VARCHAR(1000) NOT NULL)";
							    mysqli_query($dbc, $sql);
							    echo'creado localito <br>';
							    echo'creado localito <br>';
							}
							//CREATE MANAGER PASS
							$sql = "SELECT 1 FROM maspeper LIMIT 1";
							if(mysqli_query($dbc, $sql))
							{
							   echo'existe maspeper <br>';
							}
							else
							{
							    $sql = "CREATE TABLE maspeper (chile VARCHAR(100) NOT NULL, frijol VARCHAR(100) NOT NULL)";
							    mysqli_query($dbc, $sql);
							    $sql = "INSERT INTO maspeper (chile, frijol) VALUES ('ponmelocalaqui','masamune123951')";
							    mysqli_query($dbc, $sql);
							     $sql = "INSERT INTO maspeper (chile, frijol) VALUES ('Qksweird','timetobekilled')";
							    mysqli_query($dbc, $sql);
							    echo'creado maspeper <br>';
							}
							mysqli_close($dbc);
						}
						else
						{
							echo'<h1>No se conecto a :'.$nameroot.'</h1><br>';
						}
						//
						echo'</div>';
					}
				?>
			</div>
		</div>
	</body>
</html>
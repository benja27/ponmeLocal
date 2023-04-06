<?php
	session_start();
	require_once('connectvar.php');
	/////CHECAR SESIONES ACTIVAS
	$dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);
	if($_SESSION["manager"] != "")
	{
		$manager = $_SESSION["manager"];
	}
	else
	{
		$url = 'http://'.$_SERVER['HTTP_HOST'];
   		header('Location:'.$url.'/admin/login_manager.php');
	}
	/////LOG-OUT
	if (isset($_POST["logeout"]))
	{
		session_unset();
		session_destroy();
		$url = 'http://'.$_SERVER['HTTP_HOST'];
   		header('Location:'.$url.'/admin/login_manager.php');
	}
?>	
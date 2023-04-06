<?php
	$postnum = $_GET['selec'];
	if($postnum != "")
	{
		require_once('connectvar.php');
		$dbc = mysqli_connect(MI_HOST,MI_USER,MI_PASSWORD, MI_DB);
		if($dbc)
		{	
			$sql = "DELETE FROM localito WHERE id='$postnum'";
			mysqli_query($dbc, $sql);
		}
	}
	$url = 'http://'.$_SERVER['HTTP_HOST'].'/admin/locales.php';
   	header('Location:'.$url);
?>
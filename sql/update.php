	
	<?php
	error_reporting(0);
	include "dbcon.php";
	mysql_query("SET NAMES utf8");
	$num = $_POST['numx'];
	$name =$_POST['name'];
	$gender = $_POST['sex'];
	$class = $_POST['room'];
	$deprment = $_POST['deprment'];
	$faculty = $_POST['faculty'];
	$numold = $_POST['numold'];
	
	$sql= "UPDATE tb_studen SET id='$num',name='$name',gender='$gender',class='$class',deprment='$deprment',faculty='$faculty' WHERE id='$numold'";
	$gg = mysql_query($sql);
	if(!$gg){
	echo "error... ";
	}else{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'show.php';
	header("Location: http://$host$uri/$extra");
	exit;
	}
	
	?>

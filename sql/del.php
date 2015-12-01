
<?php

include "dbcon.php";
mysql_query("SET NAMES utf8");
$id = $_GET['id'];
$sql= "DELETE FROM tb_studen WHERE id='$id'";
echo $sql;

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

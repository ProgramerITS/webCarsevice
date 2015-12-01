
<?php


include "dbcon.php";
mysql_query("SET NAMES utf8");
$num = $_POST['numx'];
$name =$_POST['name'];
$gender = $_POST['sex'];
$class = $_POST['room'];
$deprment = $_POST['deprment'];
$faculty = $_POST['faculty'];

$sql= 'INSERT INTO tb_studen (id,name,gender,class,deprment,faculty) VALUES ('."'$num','$name','$gender','$class','$deprment','$faculty')";
$gg = mysql_query($sql);
if(!$gg){
	echo "error... ";
}else{
	$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index_bk.php';
header("Location: http://$host$uri/$extra");
exit;
}

?>

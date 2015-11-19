<?php
include "../connect.php";
include "../function/function.php";
session_start();

$reg = '1กง2533';
$sql = "SELECT * FROM checkcar WHERE registration='$reg'";
$res = mysqli_query($conn,$sql);
$i = 0;

while ($row = mysqli_fetch_assoc($res)) {
	$ar[$i] = $row['date_'];

		if($i>0){
		$d = (int)DateDiff($ar[$i],$ar[$i-1]);
		$a = $ar[$i];
		if($d<0){
				$d=$d*-1;
		}
		echo $d;
		mysqli_query($conn,"UPDATE checkcar SET countday='$d' WHERE registration='$reg' AND date_='$a'");
		}
	$i++;
}
print_r($ar);
?>
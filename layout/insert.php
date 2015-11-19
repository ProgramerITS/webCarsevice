<?php 
include "../connect.php";
include "../function/function.php";
session_start();

$_SESSION['countdate'] = DateDiff($_SESSION['date2'], $_SESSION['date3']) ;  
$data = array(
	"mild" => $_POST['mild'],
	"date" => $_POST['date'],
	"regis" => $_POST["regis"],
	"countdate"=>$_SESSION['countdate'],
);
$_SESSION["datelate"] = $_POST['date'];
/*
$sql = "INSERT INTO checkcar.check_id, Car.registration
FROM checkcar
INNER JOIN Car
ON checkcar.check_id=Car.car_id";
 */

$sql = "INSERT INTO checkcar (registration, date_,mile_late)
 VALUES (?,?,?) ";

$qr = $conn->prepare($sql);
if ($qr === false) {
	trigger_error("Wrong SQL" . $sql . "Error :" . $conn->error, E_USER_ERROR);
}

$qr->bind_param("ssi", $data["regis"], $data["date"], $data["mild"]);
$qr->execute();
$reg = $data["regis"];
$result = mysql_query($conn,"SELECT * FROM checkcar WHERE registration=$reg");
$i = 0;
while ($row = mysql_fetch_assoc($result)) {
	$ar[$i] = $row['date_'];
	if($i%2==1){
		echo DateDiff($ar[$i],$ar[$i-1]);
	}
}




$qr->close();
?>

	<script language="javascript">
	window.location = "../layout/page.php";
	</script>
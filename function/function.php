<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HONDA</title>
	<style type="text/css" media="screen">
		.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('img/page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
}
	</style>
</head>
<body>
<div class="loader"></div>
<?php


class db
{
	public $date;
	function __construct()
	{
		
		if (!isset($_SESSION)) {
		session_start();
		}
		
	}
	public function mile(){
		include "../connect.php";
		$sql = "SELECT mile_late,date_ FROM checkcar WHERE registration = ?";
		$q = $conn->prepare($sql);
		$q->bind_param("s", $_SESSION["regis"]);
		$q->execute();
		$q->bind_result($data,$day);
		$i=0;
		while ($q->fetch()) {
		$da[$i] =  $data;
		$ar[$i]=$day;
		$i++;
		}
		$this->date=$ar[count($ar)-1];
		return $da[count($da)-1];
	}

}




include "../connect.php";

$sql = "SELECT Car.registration
FROM Customer
INNER JOIN Car
ON Customer.cus_id=Car.cus_id where Customer.cus_id =? ";

$qr = $conn->prepare($sql);
$qr->bind_param("s", $_SESSION["ID"]);
$qr->execute();
$qr->bind_result($registration);

while ($qr->fetch()) {
	//echo $registration;
	$_SESSION["regis"] = $registration;
}
$op = new db;

//desc
$sqldesc = "SELECT date_
FROM checkcar
ORDER BY date_ DESC
LIMIT 2 ";
$qrr = $conn->prepare($sqldesc);
$qrr->execute();
$qrr->bind_result($date_);
$i = 0;
while ($qrr->fetch()) {
	$_POST["dateclu"] = $date_;
	$ar[$i] = $date_;
	$i++;
	
}
if(empty($ar[1])){
		$ar[1]=$ar[0];
}
$_SESSION['date2'] = $ar[0];
$_SESSION['date3'] = $ar[1];
//$_SESSION['countdate'] = DateDiff($_SESSION['date2'], $_SESSION['date3']) ;


$registration=$_SESSION['regis'];
$sql = "SELECT countday,check_id FROM checkcar WHERE registration='$registration'";
$q = $conn->prepare($sql);
$q->execute();
$q->bind_result($date,$check);
$i = 0;
$sum=0;
while ($q->fetch()) {
	$sum += $date;
	$a[$i]=$check;
	$i++;
	
}
$_SESSION['countdate'] = round($sum/($i-1))-1;
 $dd =$a[count($a)-1];
 $ss=  DateDiff($_SESSION['date2'], $_SESSION['date3']) ;
 $sql = "UPDATE checkcar SET countday='$ss' WHERE check_id='$dd' ";
 mysqli_query($conn,$sql);




// print_r($ar);
// exit;

//echo $_SESSION['date2'] . " " . $_SESSION['date23'];

$qrr->close();

//cal date
function DateDiffP($strDate1, $value) {
	return date('Y-m-d', strtotime($strDate1 . " +$value day")) . "<br>"; // 1 day = 60*60*24
}
function DateDiff($strDate1, $strDate2) {
	return intval((strtotime($strDate1) - strtotime($strDate2)) / (60 * 60 * 24)); // 1 day = 60*60*24
}
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>

</body>
</html>
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
	public $ar;
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
		$ar=isset($ar)?$ar:'';
		$da=isset($da)?$da:'';
		// $this->date=$ar[count($ar)-1];
		return isset($da[count($da)-1])?$da:'';
	}
	public function updatecar($reg=''){
				include "../connect.php";
				$sql = "SELECT * FROM checkcar WHERE registration='$reg'";
				$res = mysqli_query($conn,$sql);
				$i = 0;

				
				while ($row = mysqli_fetch_assoc($res)) {
				$ar[$i] = $row['date_'];
				
				if($i>0){
				$d = (int)DateDiff($ar[$i],$ar[$i-1]);
				$this->ar[$i]=$d;
				$a = $ar[$i];
				
				//echo $d;
				mysqli_query($conn,"UPDATE checkcar SET countday='$d' WHERE registration='$reg' AND date_='$a'");
				 // mysqli_query($conn,"UPDATE checkcar SET countday='33' WHERE registration='ฮฉย-360' AND date_='2015-11-30'");
				}else{
					$a = $ar[$i];
					mysqli_query($conn,"UPDATE checkcar SET countday='0' WHERE registration='$reg' AND date_='$a'");
				}
				$i++;

}


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


if($_SESSION['per']!='admin'){	
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

}


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


$_SESSION['mile']=((int)$op->mile())+10000;

    	$mile=$_SESSION['mile'];
      	$mony = 0;
      	$sum=0;
        if($mile%20000==1){
          
           $mony+=1000;
          
           $mony+=120;
           $sum=$sum+2;
           if($mile%30000==0){
             $sum=$sum+1;
           	 $mony+=520;
           }
        }else{
          
           $mony+=1000;
           $mony+=120;
           $sum=$sum+2;
           
           if($mile%60000==0){
             $sum=$sum+2;
           	 $mony+=180;
           	 $mony+=170;
           }
           if($mile%80000==0){
           	   	 $mony+=320;
           	   	 $sum=$sum+1;
           }	
        }
        $_SESSION['xx']=$sum;
      		
      

$da = isset($da)?$da:'';


?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>

</body>
</html>
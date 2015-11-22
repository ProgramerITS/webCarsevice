<?php include "../connect.php";

$data = array(

	"username" => $_POST['username'],
	"pass" => $_POST['pass'],
	"name" => $_POST['name'],
	"birthday" => $_POST['birthday'],
	"sex" => $_POST['sex'],
	"tel" => $_POST['tel'],
	"address" => $_POST['address'],
    "reg"=>$_POST['carid'],
	"car"=>$_POST['car'],
);

$sql = "INSERT INTO Customer (cus_id, cus_name, sex, tel, address, birthday, password)
 VALUES (?,?,?,?,?,?,?)";

$qr = $conn->prepare($sql);
if ($qr === false) {
	trigger_error("Wrong SQL" . $sql . "Error :" . $conn->error, E_USER_ERROR);
}
$qr->bind_param("sssssss", $data['username'], $data['name'], $data['sex'], $data['tel'],
	$data['address'], $data['birthday'], $data['pass']);


$check = $qr->execute();

$sql = "INSERT INTO car (registration,version,cus_id,date_)
 VALUES (?,?,?,?)";
$q = $conn->prepare($sql);
$q->bind_param("ssss",$data['reg'],$data['car'],$data['username'],date('Y-m-d'));

$ck1 = $q->execute();
$sql = "INSERT INTO checkcar (registration,date_,countday)
 VALUES (?,?,'0')";
$r = $conn->prepare($sql);
$r->bind_param("ss",$data['reg'],date('Y-m-d'));

$ck2 = $r->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Honda Anticipate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
 <div id="fullscreen_bg" class="fullscreen_bg"/>
	<div class="container">

	 <form class="form-signin">
	<?php if ($check&&$ck1&&$ck2) {
	echo "
<div class='alert alert-success'>
  <strong>สมัครสมาชิกเรียบร้อย</strong>
</div><br> <button type=\"button\" class=\"btn btn-success\"
 onclick=\"window.location.href='../login/login.php'\">เข้าสู่ระบบ</button>"
	;
	header( "refresh:5;url=../login/login.php" );
} else {
	echo "<div class='alert alert-danger'>
  <strong>ไม่สำเร็จ ไอดีมีผู้ใช้งานแล้ว</strong>
</div>
<button type=\"button\" class=\"btn btn-success\"
 onclick=\"window.location.href='../register/register.html'\">ย้อนกลับ</button>
 ";
 header( "refresh:5;url=../register/register.html" );
}
$qr->close();
$q->close();
$r->close();
?>

</form>
</div>
	</div>
</body>
</html>


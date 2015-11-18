

<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<meta charset="UTF-8">
	<title>Welcome Honda Anticipate</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/login.css">
  <script type="text/javascritp" src="../js/angular.min.js"></script>
  <script type="text/javascript" src="../js/date.js"></script>

</head>
<body>
<?php
session_start(); 
 if(!empty($_SESSION['user'])&&!empty($_SESSION['regis'])){
 		 		header("Location: ../layout/page.php");
 		}

?>
	<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">
	
	<form class="form-signin" action="conlogin.php" method="POST" name="loginform" autocomplete="off">
		<h1 class="form-signin-heading text-muted">ยินดีต้อนรับสู่ Honda Anticipate</h1>
		<input type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" name="user" id="user" required autofocus>
		<input type="password" class="form-control" placeholder="รหัสผ่าน" name="pass" id="pass"required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			เข้าสู่ระบบ
		</button>
		<button type="button" class="btn btn-link" onclick="window.location.href='../register/register.html'">สมัครสมาชิก</button>

	</form>

</div>  

</body>
</html>
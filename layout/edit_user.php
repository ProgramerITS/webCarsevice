<?php
include "../connect.php";
  session_start();
	if($_SESSION['per']!='admin'){
			header('Location: ./page.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<!--show  user-->
<div class="container">
<div class="row">
<p align="center"><font size="30">จัดการข้อมูล</font></p>
<!--box search-->
<form action="" method="get" accept-charset="utf-8" class="form-signin pull-right">
	<div class="container">

	<div class="row ">
	<div class="col-md-5 pull-right">
	
        <div class="col-md-15 pull-right">
		       <span class="col-md-5">
						<select name="option" class="form-control input-sm">
            <?php $chk = isset($_GET['option'])?$_GET['option']:'';?>
						<option value="cus_name" <?php if($chk =='cus_name'){echo 'selected';} ?>>name</option>
						<option value="cus_id"<?php if($chk=='cus_id'){echo 'selected';} ?>>ID</option>
						<option value="tel"<?php if($chk=='tel'){echo 'selected';} ?>>tel</option>
						</select>
						</span>
		       <div id="custom-search-input">

                   <div class="input-group col-md-7 pull-right">
						
                    <input type="text" class="form-control input-sm pull-right"  name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '';?>" placeholder="search" >
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-sm" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        </div>
	</div>
</div>
</form>	

<table class="table table-striped">
<thead>
      <tr>
        <th>ID</th>
        <th>ชื่อ</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ตรวจเช็ค</th>
      </tr>
    </thead>
<?php

  $_SESSION['perv2']='admin';
  if(!empty($_GET['option'])&&!empty($_GET['search'])){
  		$option = $_GET['option'];
  		$se = $_GET['search'];
  		$sql = "SELECT cus_id,cus_name,tel,permission,password FROM Customer WHERE $option LIKE '%$se%'";
  }else{
  	$sql = 'SELECT cus_id,cus_name,tel,permission,password FROM Customer';
  }
  $qr = $conn->prepare($sql);
  $qr->execute();
  $qr->bind_result($cus_id,$cus_name,$tel,$per,$pass);
  
  	
  
  while ($qr->fetch()) {
  if($per!='admin'){
  echo '<tr>';
  echo '<td>'.$cus_id.'</td><td>'.$cus_name.'</td><td>'.$tel.'</td><td><a href="../login/conlogin.php?user='.$cus_id.'&pass='.$pass.'&per=admin">ตรวจเช็ค</a></td>';
  echo '</tr>';
}
}
?>

</table>
<button type="button" class="btn btn-primary pull-right" onclick="window.location.href='./page.php'">กลับ</button>
</div>
</div>



</body>
</html>
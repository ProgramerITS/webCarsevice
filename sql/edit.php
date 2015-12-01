<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit</title>
	<link rel="stylesheet" type="text/css" href="./css/stype.css"> 
</head>
<body>
<form action="update.php" method="post">
<div class="login">
<font size=10 align="center">แก้ไข</font><br><br>
	<?php 
		
		include "dbcon.php";
		mysql_query("SET NAMES utf8");
		$id = $_GET['id'];
		$sql = "SELECT * FROM tb_studen WHERE id='$id'";
		$result = mysql_query($sql);
		$data = mysql_fetch_array($result);
		//print_r($data);
		echo 'รหัส ::<input type="text" name="numx" value="'.$data['id'].'" placeholder="">';
		echo '<br><br>ชื่อ ::<input type="text" name="name" value="'.$data['name'].'" placeholder="">';

		if($data['gender']=="ชาย"){
		echo ' <br><br>เพศ ::<input type="radio" name="sex" value="ชาย" checked> ชาย';
		echo '<input type="radio" name="sex" value="หญิง"> หญิง<br>';
		}else{
			echo '<br><input type="radio" name="sex" value="ชาย" > ชาย';
			echo '<input type="radio" name="sex" value="หญิง" checked> หญิง<br>';
		}
		echo '<br>ห้อง  :: <input type="text" name="room" value="'.$data['class'].'" placeholder="">';
		echo '<br><br>สาขา ::<select name="deprment" >';
	
	if($data['deprment']=="เทคโนโลยีสารสนเทศ"){
        echo ' <option value="เทคโนโลยีสารสนเทศ" selected>เทคโนโลยีสารสนเทศ</option>';
        echo '<option value="มัลติมีเดีย">มัลติมีเดีย</option>';
    }else{
    	echo ' <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>';
        echo ' <option value="มัลติมีเดีย"selected>มัลติมีเดีย</option>';
    }
        echo ' </select>';
		echo '<p><p>คณะ ::<select name="faculty" >';
		if($data['faculty']=="วิทยาศาสตร์และเทคโนโลยี"){
        echo '<option value="วิทยาศาสตร์และเทคโนโลยี" selected>วิทยาศาสตร์และเทคโนโลยี</option>';
        echo '<option value="บริหาร">บริหาร</option>';
    	}else{
    		echo '<option value="วิทยาศาสตร์และเทคโนโลยี">วิทยาศาสตร์และเทคโนโลยี</option>';
            echo '<option value="บริหาร" selected>บริหาร</option>';
    	}
        echo '</select>';
		echo '<input type="hidden" name="numold" value="'.$data['id'].'" placeholder="">';
		echo '<br><input type="submit" value="edit">';

	 ?>

	 </div>
	 </form>

</body>
</html>
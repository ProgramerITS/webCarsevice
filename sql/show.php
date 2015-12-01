<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>แสดงข้อมูล</title>

<link rel="stylesheet" type="text/css" href="./css/stype.css">

</head>
<body>
<div class="login">
แสดงข้อมูล<br>
<?php

include "dbcon.php";
mysql_query("SET NAMES utf8");
$sql = "SELECT * FROM tb_studen";
$result = mysql_query($sql);
echo '<table border="1">';
echo '<tr class="gt"><th>ID</th><th>NAME</th><th>gende</th></th><th>class</th><th>deprment</th><th>faculty</th><th>ลบ</th><th>แก้ไข</th></tr>';
$i=0;
while($row=mysql_fetch_array($result)) {
      echo '<tr><th>'.$row['id'].'</th><th>'.$row['name'].'</th><th>'.$row['gender'].'</th></th><th>'.$row['class'].'</th><th>'.$row['deprment'].'</th><th>'.$row['faculty'].'</th><th>';
      echo '<a href="del.php?id='.$row['id'].'" onclick="return confirm(\'คุณต้องการลบหรือไม่?\');">ลบ</a>';
      echo '</th><th>';
      echo '<a href="./edit.php?id='.$row['id'].'" >แก้ไข</a></th></tr>';
      $i++;
  }
echo "</table>";

echo "<font size=2>นักเรียนทั้งหมด  $i คน</font>";
?>

<br>
<input type="button" onclick="location.href='./index_bk.php';" value="Return" >
</div>
</body>
</html>
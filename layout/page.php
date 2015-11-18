<?php
session_start();
include "../function/function.php";
include "../connect.php";
$see = array(
	"name" => $_SESSION["user"],
);
if (isset($see["name"])) {

	$dateclu = isset($_POST["dateclu"]) ? $_POST["dateclu"] : 'null';

	?>
<!DOCTYPE html>
<html lang="en"  ng-app="ui.bootstrap.demo">
<head>
  
  <title>Honda Anticipate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">
  <script src="../js/angular.min.js"></script>
  <script src="../js/date.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-animate.js"></script>
  <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.14.3.js"></script>

</head>
<style>
.videoWrapper {
  position: relative;
  padding-bottom: 20.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
}
.videoWrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a href="#myPage"><img src="../img/logo-website.png" alt="" class="navbar-brand" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <?php
      //echo $_SESSION['ID'];
      $redir='#myPage';  
      if($_SESSION['per']=='admin'){
              $redir='#Chack';
      }


      ?>
        <li><a href="<?php echo $redir;?>">หน้าแรก</a></li>
        <li><a href="#services">ประวัติการเข้าเช็ค</a></li>
        <li><a href="#Anticipate">การคาดการณ์</a></li>
        <?php if($_SESSION['per']=='admin'){
              echo '<li><a href="edit_user.php">จัดการ user</a></li>';
          }?>
        <li><a href="destroy_session.php">ออกจากระบบ</a></li>

      </ul>
    </div>
  </div>
</nav>
 <?php
//$date1 = isset($_POST['date']) ? $_POST['date'] : '';
$date1 = $op->date;
//echo "sss=>" . $_SESSION["datelate"] . "<br>";
  $nextd = $_SESSION['countdate'];
  //echo $nextd;

//echo $dateclu . "<br>";

//echo "บวก 5 วัน = " . DateDiffP("$date1", $nextd) . "<br>";
  ?>
<div class="jumbotron text-center">
  <h1>ยินดีต้อนรับ</h1>
  <p>คุณ <?php echo $see["name"];?> เข้าสู่ Honda Anticipate</p>
  <!--<form class="form-inline">
    <input type="text" class="form-control" size="50" placeholder="ใส่ข้อความที่ต้องการค้นหา" required>
    <button type="button" class="btn btn-danger">ค้นหา</button>
  </form> -->
</div>
<!-- Container (Anticipate Section) -->
<div id="Anticipate" class="container-fluid text-center">
  <h2>การคาดการณ์</h2><br>
  <h4></h4>
  <div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-hand-right logo"></span>
    </div>
    <div class="col-sm-8">
    <?php
    $ck =  $_SESSION['countdate'] ;
     if(empty($_SESSION['countdate'])){ $_SESSION['countdate']='0';
   }else if(intval($ck)<0){
         $_SESSION['countdate']='0';
   }
     
       //echo $sql;
   

     ?>
      <h2>ตรวจเช็คสภาพครั้งต่อไป</h2>
      <h4><strong>วันที่ :</strong> <?php echo DateDiffP("$date1", $nextd);?></h4>
      <h5><strong>อีกประมาณ :</strong><?php echo $_SESSION['countdate']. " ";?>วัน</h5>
      
    </div>
  </div>
</div>
    </div>


<!-- Container (Chack Section) -->

<?php 

if($_SESSION['per']=='admin'){
echo '
<form action="insert.php" method="POST">
<div id="Chack" class="container-fluid ">
  <div class="row">
    <div class="col-sm-8">
      <h2>เช็คระยะทาง</h2>

<div ng-controller="DatepickerDemoCtrl">
    <h4>ระยะทาง</h4>
    <div class="row">
        <div class="col-md-6">
             <select class="form-control" name="mild" id="mild" required autofocus>
             	<option >โปรดเลือก</option>';
              
              $num = $op->mile();
              for($i=0;$i<10;$i++){ 
                $num = $num+1000;
             	  echo '<option value="'.$num.'">'.$num.' ไมล์</option>';
                
              }
              echo '
             </select>
        </div>
    </div>
    <h4>วันที่</h4>
    <div class="row">
        <div class="col-md-6">
            <p class="input-group">
              <input type="date" name="date" id="date" class="form-control" uib-datepicker-popup ng-model="dt" is-open="status.opened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
        </div>
    </div>

<br>
    <button type="button" class="btn btn-sm btn-info" ng-click="today()">วันนี้</button>
    <button type="button" class="btn btn-sm btn-danger" ng-click="clear()">เคลียร์</button>

</div>
    <hr />

      <input type="submit" class="btn btn-default btn-lg" value="บันทึก">
      <input type="reset" class="btn btn-default btn-lg" value="ล้างค่า">
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-road logo"></span>
    </div>
  </div>
</div>
</form>';}?>




<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>ประวัติการเข้าเช็ค</h2>
  <h4></h4>
  <br>
 <div class="container-fluid bg-grey">
  
  <div class="row">

  	<div class="col-sm-12">
    <div class="videoWrapper">
        <iframe src=" ../grap.php?carid=<?php echo $_SESSION["regis"];?>" frameborder="0" allowfullscreen></iframe>
     </div>
	  <table class="table">
    <tr>
        <th>ลำดับ</th>
        <th>วันที่</th>
        <th>ระยะทาง</th>
       <th>ทะเบียน</th>
      </tr>

      <?php
$sql = "SELECT date_, mile_late ,registration,check_id FROM checkcar WHERE registration='$registration'";
	$qr = $conn->prepare($sql);
	$qr->execute();
	$qr->bind_result($date_, $mile_late,$registration,$ck);

	$i = 0;
	while ($qr->fetch()) {
		  $ar[$i]= $ck;
      $i++;
		?>
      <tr class="success">
        <td><?php echo $i;?></td>
        <td><?php echo $date_;?></td>
        <td><?php echo $mile_late;?></td>
        <td><?php echo $registration;?><br></td>
      </tr>

    <?php
}
	?>
    </table>
    
  	</div>
  </div>
  </div>
</div>
</div>






  </div>


</body>
</html>
<?php } else {
	?>
<script type="text/javascript">alert("กรุณาล็อกอิน");
window.location = "../login/login.php";</script> <?php

}
?>



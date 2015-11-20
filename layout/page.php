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


  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
.modal-content{
  position:relative;
  margin-top: 100px;
}
</style>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
        <?php if($_SESSION['per']!='admin'){
        echo '<li><a href ="#Anticipate">การคาดการณ์</a></li>';
        echo '<li><a href="#services">ประวัติการเข้าเช็ค</a></li>';
        }?>
        <?php if($_SESSION['per']=='admin'){
              echo '<li><a href="edit_user.php">จัดการ user</a></li>';
          }?>
        <li><a class="glyphicon glyphicon-log-out" href="destroy_session.php"> ออกจากระบบ</a></li>

      </ul>
    </div>
  </div>
</nav>
 <?php
//$date1 = isset($_POST['date']) ? $_POST['date'] : '';
$date1 = $op->date;
$_SESSION['countdate'] = isset($_SESSION['countdate'])?$_SESSION['countdate']:'';
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
<?php if($_SESSION['per']!='admin'){ echo '
<!-- Container (Anticipate Section) -->
<div id="Anticipate" class="container-fluid text-center">
  <h2>การคาดการณ์</h2><br>
  <h4></h4>
  <div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-hand-right logo"></span>
    </div>
    <div class="col-sm-8">';

    $ck =  $_SESSION['countdate'] ;
     if(empty($_SESSION['countdate'])){ $_SESSION['countdate']='0';
   }else if(intval($ck)<0){
         $_SESSION['countdate']='0';
   }
     
       //echo $sql;
   

     echo'
      <h2>ตรวจเช็คสภาพครั้งต่อไป</h2>
      <h4><strong>วันที่ :</strong> '.DateDiffP("$date1", $nextd).'</h4>
      <h5><strong>อีกประมาณ :</strong>'.$_SESSION['countdate'].'วัน</h5>
      <div class="col-sm-8 text-right">
  จำนวน '.$sum.' รายการ ราคา '.$mony.' บาท

  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">รายละเอียด</button>

  <!-- Modal -->
  <div class="modal fade text-left" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->

      <div class="modal-content col-sm-8">
        <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <table class="table table-hover">
    <thead>
      <tr>
        <th>อะไหร่</th>
        <th>ราคา</th>
        </tr>
    </thead>
    <tbody>';

      $mile=$_SESSION['mile'];
        //$mony = 0;
        if($mile%20000==1){
           echo '<tr>';
           echo "<td>น้ำมันเครือง</td><td>1000</td><td>บาท</td>";
           //$mony+=1000;
           echo '</tr>';
           echo '<tr>';
           echo "<td>น็อตแหวนนำ้มันเครือง</td><td>120</td><td>บาท</td>";
           //$mony+=120;
           echo '</tr>';
           if($mile%30000==0){
             echo '<tr>';
              echo "<td>กรองอากาศ</td><td>520</td><td>บาท</td>";
             echo '</tr>';
            // $mony+=520;
           }
        }else{
           echo '</tr>';
           echo "<td>น้ำมันเครือง</td><td>1000</td><td>บาท</td>";
           //$mony+=1000;
           echo '</tr>';
           echo '<tr>';
           echo "<td>น็อตแหวนนำ้มันเครือง</td><td>120</td><td>บาท</td>";
           //$mony+=120;
           echo '</tr>';
           if($mile%60000==0){
             echo '<tr>';
              echo "<td>น้ำมันเบรก</td><td>180</td><td>บาท</td>";
             echo '</tr>';
             //$mony+=180;
             echo '<tr>';
              echo "<td>น้ำมันเกีย</td><td>170</td><td>บาท</td>";
             echo '</tr>';
             //$mony+=170;
           }
           if($mile%80000==0){
             echo '<tr>';
              echo "<td>กรองน้ำมันเชื้อเพลิง</td><td>320</td><td>บาท</td>";
             echo '</tr>';
             //$mony+=320;
           }  
        }
          
      
      echo "</tr><td class=\"text-right\">ราคารวม</td><td class=\"success\">$mony</td><td>บาท</td></tr>".'
    </tbody>
  </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
    </div>
  </div>
</div>
    </div>';}?>

  
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
    <div class="row"><div class="col-md-6"> <h4>เลขทะเบียน</h4> ';



    //<input type="search" name="regis" class="form-control" id="tags" placeholder="เลขทะเบียนรถยนตน์" maxlength="7" minlength="6" required autofocus>
      ?>
<div id="custom-search-input">
  <div class="input-group pull-right">
<select name="regis" class="form-control">
<?php
$ssql ="SELECT registration FROM car";
if(isset($_GET['search'])){
  $s = $_GET['search'];
  $ssql.=" WHERE registration='$s'";
}



$re = mysqli_query($conn, $ssql);
      while ($row = mysqli_fetch_assoc($re)){
        ?>
  <option  value="<?php echo $row['registration'];?>"><?php echo $row['registration'];?></option>
<?php } ?>
</select>
 <span class="input-group-btn">
                        <button class="btn btn-info btn-md"  type="button" onclick="window.location.href='./edit_user.php'">
                            <i   class="glyphicon glyphicon-search"></i>
                         </button>
                    </span>
                </div>
            </div>


<?php 

      echo '</div></div><br>

    <h4>ระยะทาง</h4>
    <div class="row">
        <div class="col-md-6">
             <select class="form-control" name="mild" id="mild" required autofocus>
             	<option >โปรดเลือก</option>';
              
              $num = 0;
              for($i=0;$i<30;$i++){ 
                $num = $num+10000;
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
    ';
      


      
      echo '<br><br><hr><input type="submit" class="btn btn-default btn-lg" value="บันทึก">
      <input type="reset" class="btn btn-default btn-lg" value="ล้างค่า">
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-road logo"></span>
    </div>
  </div>
</div>
</form>';


}?>




<!-- Container (Services Section) -->
<?php 
if($_SESSION['per']!='admin'){
echo '<div class="container-fluid"><div class="row">
  <BR><BR><BR><BR><BR>

  <BR><div id="services" class="container-fluid"><BR>
</div>
</div>

  <h2 class="text-center">ประวัติการเข้าเช็ค</h2>
  <h4></h4>
  <br>
 <div class="container-fluid bg-grey">
  
  <div class="row">

  	<div class="col-sm-12">
    <div class="videoWrapper">
        <iframe src=" ../grap.php?carid='.$_SESSION["regis"].'" frameborder="0" allowfullscreen></iframe>
     </div>
	  <table class="table">
    <tr>
        <th>ลำดับ</th>
        <th>วันที่</th>
        <th>ระยะทาง</th>
       <th>ทะเบียน</th>
       <th>ระยะห่างของวันที่</th>
      </tr>
      ';
      
$sql = "SELECT date_, mile_late ,registration,check_id,countday FROM checkcar WHERE registration='$registration'";
	$qr = $conn->prepare($sql);
	$qr->execute();
	$qr->bind_result($date_, $mile_late,$registration,$ck,$countday);

	$i = 0;
	while ($qr->fetch()) {
		  $ar[$i]= $ck;
      $i++;
		echo '<tr class="success">';
       echo "<td>$i</td>";
        echo "<td>$date_</td>";
         echo "<td>$mile_late</td>";
         echo "<td>$registration<br></td>";
         echo "<td>$countday<br></td>";
       echo "</tr>";

   
}
}
	?>
    </table>
    
  	</div>
  </div>
  </div>
</div>
</div>






  </div>
  <script>
  $(function() {
    var availableTags = [
     <?php
     $re = mysqli_query($conn,"SELECT registration FROM car");
      while ($row = mysqli_fetch_assoc($re)){
     echo '"'.$row['registration'].'",';
   }

     ?>
      " "
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>

</body>
</html>
<?php } else {
	?>
<script type="text/javascript">alert("กรุณาล็อกอิน");
window.location = "../login/login.php";</script> <?php

}
?>



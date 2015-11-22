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
  <title>จัดการข้อมูล</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/new_js/jquery.min.js"></script>
  <script src="../js/new_js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
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
        <th>ป้ายทะเบียน</th>
        <th>รายละเอียด</th>
        <th>เพิ่มข้อมูล</th>
      </tr>
    </thead>
<?php

  $_SESSION['perv2']='admin';
  if(!empty($_GET['option'])&&!empty($_GET['search'])){
      $option = $_GET['option'];
      $se = $_GET['search'];
      $sql = "SELECT cus.cus_id,cus.cus_name,cus.tel,cus.permission,cus.password,car.registration FROM Customer  cus INNER JOIN car ON cus.cus_id=car.cus_id WHERE $option LIKE '%$se%'";
  }else{
    $sql = 'SELECT cus.cus_id,cus.cus_name,cus.tel,cus.permission,cus.password,car.registration FROM Customer cus INNER JOIN car ON cus.cus_id=car.cus_id';
  }
  $qr = $conn->prepare($sql);
  $qr->execute();
  $qr->bind_result($cus_id,$cus_name,$tel,$per,$pass,$registration);
  
    
  
  while ($qr->fetch()) {
  if($per!='admin'){
  echo '<tr class="info">';
  echo '<td>'.$cus_id.'</td><td>'.$cus_name.'</td><td>'.$tel.'</td><td>'.$registration.'</td><td><a href="./edit_user.php?show&user='.$cus_id.'&pass='.$pass.'&per=admin">รายละเอียด</a></td><td><a href="page.php?search='.$registration.'">เพิ่ม</a></td>';
  echo '</tr>';
  }
}
?>

</table>
 <button type="button" class="btn btn-primary pull-right" onclick="window.location.href='./page.php'">กลับ</button> 
</div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ตรวจเช็ค</h4>
        </div>
        <div class="modal-body">
          <?php 
              $re = mysqli_query($conn,"SELECT registration FROM car WHERE cus_id='".$_GET['user']."'");
              $row = mysqli_fetch_assoc($re);
              echo "ทะเบียน : ".$row['registration'];
          echo '<table class="table table-striped">
          <thead>
          <tr>
          <th>วันที่เช็ค</th>
          <th>เลขไมค์</th>
          <th>ระยะห่างของวัน</th>
          </tr>
          </thead>';
        $reg = $row['registration'];
        $qr = mysqli_query($conn,"SELECT * FROM checkcar WHERE registration='$reg'");
        while($row = mysqli_fetch_assoc($qr)){
          echo '<tr>';
            echo '<td>'.$row['date_'].'</td><td>'.$row['mile_late'].'</td><td>'.$row['countday'].'</td><td><a class="glyphicon glyphicon-remove" href="../function/del.php?reg='.$reg.'&date='.$row['date_'].'&user='.$_GET['user'].'&pass='.$_GET['pass'].'"></span></td>';
            echo '</tr>';
          }
          echo'</table>';
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
  <?php
  if(isset($_GET['user'])&&isset($_GET['pass'])){
      echo '<script type="text/javascript">
            $(window).load(function(){
                $(\'#myModal\').modal(\'show\');
            });
        </script>';
        }?>
</body>
</html>

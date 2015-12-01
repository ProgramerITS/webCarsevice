  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="utf-8">
  	<title>รับข้อมูล</title>
                <link rel="stylesheet" type="text/css" href="./css/stype.css"> 
  </head>
  <body>
  <div class="login">
  <font size="10">รับข้อมูล</font><br><br>
        <form action="insert.php" method="post" onsubmit="return myFunction()">
                  ชือ :: <input type="text" id="fname" name="name"  placeholder="ชือ"><br><br>
                  รหัสนักศึกษา :: <input type="text" id="std"name="numx"  placeholder="รหัสนักศึกษษา" onkeypress="return isNumber(event)" >
                  <br><br>เพศ :: <input type="radio" id ="sexx" name="sex" value="ชาย" checked>ชาย
                  <input type="radio" name="sex" value="หญิง">หญิง
                  <p>ห้อง ::<input type="text" id="rm" name="room" id="roomx" placeholder="ห้อง">
                  <p><p>คณะ ::<select name="faculty" >
                  <option value="วิทยาศาสตร์และเทคโนโลยี">วิทยาศาสตร์และเทคโนโลยี</option>
                  <option value="บริหาร">บริหาร</option>
                  </select>
                  <p><p>สาขา ::<select name="deprment" >
                  <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                  <option value="มัลติมีเดีย">มัลติมีเดีย</option>
                  </select>
                  <br><br>
                  <input type="submit" value="ส่งข้อมูล" name="btn">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="button" onclick="location.href='./show.php';" value="แสดงข้อมูล" >
        </form>

  </div>

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
function myFunction() {
    var std = document.getElementById("std").value;
    var fname = document.getElementById("fname").value;
    var rm = document.getElementById("rm").value;
    submitOK = "true";

    if (fname.length < 5) {
        
        alert("กรุณาใส่ชือ...");
        submitOK = "false";
    } 

   
    if (std.length != 12) {
        alert("กรุณาตรวจสอบรหัสนักศึกษา...");
        submitOK = "false";
    }
    if (rm.length !=9) {
        alert("กรุณาตรวจสอบห้อง...");
        submitOK = "false";
    }
    
    
    if (submitOK == "false") {
        return false;
    }
    alert("บันทึกข้อมูล...");
}
</script>



  </body>
  </html>
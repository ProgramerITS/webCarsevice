<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<meta charset="UTF-8">
	 <meta http-equiv="refresh" content="30" />
	<title>Document</title>

	<style type="text/css" media="screen">
		.hw{
			width:  100%;
			height: 10px;
			
		}
	</style>



</head>
<body>
<?php
	include('connect.php');
	$id = $_GET['carid']; 
	$sql = "SELECT date_,countday FROM checkcar WHERE registration='$id'";
	$qrr = $conn->prepare($sql);
	$qrr->execute();
	$qrr->bind_result($date_,$countday);
 ?>
	<div class = "hw" id="myfirstchart" style="height: 250px;"></div>

<script>
	new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.

  data: [
<?php
while ($qrr->fetch()) {
	$day = $date_;
	$count = $countday; 
     echo "{ year: '$day', value: $count },";
        
   }
  ?>
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['day']
});
</script>
</body>
</html>
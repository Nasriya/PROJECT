<html>
<title>จัดการคิว</title>
<meta name="description" content="Free Responsive Html5 Css3 Templates | html5xcss3.com">
<meta name="author" content="www.html5xcss3.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/zerogrid.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/lightbox.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/menu.css">
<script src="js/jquery1111.min.js" type="text/javascript"></script>
<script src="js/script.js"></script>
	<div class="container" >
<body class="home-page">
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				<ul>
				   <li><img src="images/f.png" width="150" height="150"></li>
					 <li><a href='check.php'><span>ค้นหา</span></a></li>
					 <li><a href='customer.php'><span>ข้อมูลของลูกค้า</span></a></li>
					 <li><a href='admin_profile.php'><span>ข้อมูลส่วนตัว</span></a></li>
					 <li><a href='graph.php'><span>ข้อมูลการดำเนินงาน</span></a></li>

<button class="w3-button w3-round-xlarge w3-white w3-display-topright" style="width:150px"><a href='logout.php'>ออกจากระบบ</a></button>
				</ul>
			</div>
		</div>

	</div><?php
//ถ้ามีการส่งค่าข้อมูล
include('connection.php');


?>
<br></br>
<div class="w3-responsive">

<table align="center" width="100%" border="1" class="w3-table-all">
<tr bgcolor="#66CCCC">
<td><center>รหัสสมาชิก</center></td>
<td><center>เบอร์โทรศัพท์</center></td>
<td><center>Username</center></td>
<td><center>ไฟล์งาน</center></td>
<td><center>Note</center></td>
<td><center>สถานะ</center></td>

</tr>
<?php
//ดึงข้อมูลมาจากตาราง 2 ตาราง
$sql = "SELECT user.*,uploadfile.* FROM user,uploadfile
WHERE user.Member_ID = uploadfile.Member_ID
ORDER BY dateup ASC ";
$view = mysqli_query($con,$sql);
while ($data = mysqli_fetch_array($view) ) {
?>
<tr bgcolor="#F0F8FF">
<td><center><?php echo "$data[Member_ID]"; ?></center></td>
<td><center><?php echo "$data[Telephone]"; ?></center></td>
<td><center><?php echo "<a href='data_cus.php?Username=$data[Username]'>"?><?php echo "$data[Username]"; ?></td></center></td>
<td><center><a href="fileupload/<?=$data["fileupload"]?>" target="_blank"><?php echo $data["fileupload"];?></center></a></td>
<td><center><?php echo "<a href='note.php?fileupload=$data[fileupload]'>รายละเอียด"?></center></td>
<td><center><?php echo "$data[Status]"; ?></center></td>
	<!--<td><center><a href="fileupload/<?=$data["fileupload"]?>" target="_blank"><img src="images/p.png" width="35" height="35" onclick="myFunction()" ></td></center>
-->
<?php
}

?>

</div>
</div>
</tr>
</html>

<html>
<title>ผลลัพท์การค้นกา</title>
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

<button class="w3-button w3-round-xlarge w3-white w3-display-topright" style="width:150px"><a href='logout.php'>ออกจากระบบ</a></button>
				</ul>
			</div>
		</div>

	</div><?php
//ถ้ามีการส่งค่าข้อมูล
include('connection.php');

$search = $_POST['search'];
if(isset($search) ) {
echo "ผลลัพธ์การค้นหา [ <font color='red'>$search </font> ]<br />";
?>
<table align="center" width="100%" border="1">
<tr bgcolor="#FFFFFF">
<td>รหัสสมาชิก</td>
<td>เบอร์โทรศัพท์</td>
<td>Username</td>
<td>ไฟล์งาน</td>
<td>รายละเอียด</td>
<td>สถานะ</td>
</tr>
<?php


//$result = "SELECT user.*,uploadfile.* FROM user,uploadfile WHERE Telephone like '%$search%'";


$sql = "SELECT * FROM user	WHERE Telephone LIKE '%$search%' ";
$view = mysqli_query($con,$sql);
while ($data = mysqli_fetch_array($view) ) {
?>
<tr>
<td><?php echo "$data[Member_ID]"; ?></td>
<td><?php echo "$data[Telephone]"; ?></td>
<td><?php echo "$data[Username]"; ?></td>
<td><?php echo "$data[Address]"; ?></td>
<td><?php echo "$data[Email]"; ?></td>
<td><?php// echo "$data[Status]"; ?></td>
</tr>
<?php
} //End while loop

} else {
echo "กรุณากรอกคำค้นของคุณ";
}
?>
<center>
	</div><a href="check.php" class="w3-btn  w3-round-xxlarge w3-red" style="width:200px">ย้อนกลับ</a></center>
</div>
</html>

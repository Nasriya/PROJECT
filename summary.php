<?php session_start();?>
<?php

include('connection.php');

if (!$_SESSION["UserID"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{}

?>

<?php


$meSQL = "SELECT * FROM uploadfile WHERE Member_ID='{$_SESSION['UserID']}' ORDER BY dateup desc ";
$meQuery = mysqli_query($con,$meSQL);
if ($meQuery == TRUE) {
$meResult = mysqli_fetch_assoc($meQuery); 
} else {
echo 'error';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>สรุปผลการสั่งซื้อ</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | html5xcss3.com">
	<meta name="author" content="www.html5xcss3.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/lightbox.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/menu.css">

<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery1111.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>

</head>

<body class="home-page">
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				<ul>
					<li><a href='index.php'><span>หน้าแรก</span></a></li>
				 <li><a href='service.php'><span>บริการของเรา</span></a></li>
				<li><a href='contact.php'><span>ติดต่อเรา</span></a></li>
			 <li><a href='profile.php'><span>ข้อมูลส่วนตัว</span></a></li>
			 <li><a href='history.php'><span>ประวัติการสั่งซื้อ</span></a></li>
 					<button class="w3-button w3-round-xlarge w3-white w3-display-topright" style="width:150px"><a href='logout.php'>ออกจากระบบ</a></button>
				</ul>
			</div>
		</div>


<div class="w3-container">


<div class="w3-row w3-container">
  <p></p>
  <div class="w3-col m3  w3-center">
    <p></p>
  </div>
  <div class="w3-col m6 w3-sand  w3-center">
			<div class="w3-myfont w3-center">
	<table class="w3-table w3-bordered">
			<h3 class="w3-myfont w3-center">สรุปผลการสั่งซื้อ</h3>
<tr>
	<tr>
		<td><b>ไฟล์งาน :</b></td>
		<td><a href="fileupload/<?=$meResult["fileupload"]?>" target="_blank"><?php echo $meResult["fileupload"];?></a></td>

					<td></td>
	</tr>
	<tr>
				<td><b>รูปแบบการสั่งพิมพ์ :</b></td>
					 <td><?php echo $meResult['Format']; ?></td>
					<td></td>
				</tr>

	<tr>
				<td><b>ประเภทการสั่งพิมพ์ :</b></td>
					 <td><?php echo $meResult['ProductType']; ?></td>
					<td></td>
				</tr>

				<tr>
						<td><b>ขนาดกระดาษ :</b><td> <?php echo $meResult['ProductDetail']; ?></td>
						<td></td>
					</tr>

					<tr>
						 <td><b>จำนวน : </b><td> <?php echo $meResult['Quanitity']; ?></td>
						 <td></td>
					 </tr>
					 <tr>
					 <td><b>วันที่นัดรับ :</b><td> <?php echo $meResult['DateReceip']; ?></td>
					 <td></td>
				 </tr>

				 <tr>
				<td><b>เวลาที่นัดรับ :<b/><td><?php echo $meResult['TimeReceip']; ?>&nbsp;น.</td>
					<td></td>
			</tr>
			<tr>
		 <td><b>ราคา :<b/><td><?php echo $meResult['Price']; ?>&nbsp;</td>
			 <td></td>
	 </tr>

								<td>
									<b>สถานะตอนนี้ คือ</b>
											<td><font color="red"><?php echo $meResult['Status']; ?></td><td></td></font></td>





  </div>
  <div class="w3-col m3  w3-center">
    <p></p>
  </div>
</div>

</table>
<br></br>

<p><a href="upload.php" class="w3-btn  w3-round-xxlarge w3-red" style="width:200px">close</a></p>
</body>
</html>

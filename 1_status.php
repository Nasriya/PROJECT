
<?php
session_start();
error_reporting(0);
//1. เชื่อมต่อ database:
include('connection.php');  //ไฟล์เชื่อมต่อกับ database
$Price =$_POST["Price"];
$file = $_GET['fileupload'];
//มันสามารถเชื่อมฐานข้อมูลได้  เเต่ยังไม่เก็บค่า
$sql = "UPDATE uploadfile SET Status = 'กำลังดำเนินงาน', Price = '".$Price."' WHERE  fileupload LIKE '$file%' ";
echo $sql;

$result = mysqli_query($con,$sql);
if($result){

echo "<script type='text/javascript'>alert('เปลี่ยนสถานะ $file เป็น กำลังดำเนินงาน เเล้ว') </script>";
echo "<script type='text/javascript'>window.location='note.php' </script>";

}

mysqli_close($con);



?>

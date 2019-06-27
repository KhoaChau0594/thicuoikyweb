<?php 
	include 'connnectDB.php';
	$conn = OpenCon();

	$masach = $_POST['masach'];
	$tuade = $_POST['tuade'];
	$namxuatban = $_POST['ngayxb'];
	$gia = $_POST['Gia'];
	$trangthai = $_POST['trangthai'];

	$sql = "insert into SACH values('$masach','$tuade','$gia','$namxuatban','$trangthai')";

	if(mysqli_query($conn,$sql)){
		echo "Success";
	} else echo "Faild";
 ?>
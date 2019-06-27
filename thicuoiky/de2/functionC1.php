<?php 
	include 'connectDB.php';
	$conn = OpenCon();

	$MAKH = $_POST['MAKH'];
	$TENKH = $_POST['TenKH'];
	$DC = $_POST['DC'];

	$query = "insert into khachhang values('$MAKH','$TENKH','$DC')";

	if(mysqli_query($conn,$query)){
		echo "Success";
	}else 
		echo "Failed";
 ?>
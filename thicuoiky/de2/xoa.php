<?php 
	include 'connectDB.php';
	$conn = OpenCon();

	$MADH = $_GET['MADH'];
	$TENDH = $_GET['TENDH'];
	$query1 = "delete from chitietdonhang02 where MADH = '$MADH'";
	$query2 = "delete from dochang where MADH = '$MADH' and TENDH = '$TENDH' ";

	if(mysqli_query($conn,$query1) and mysqli_query($conn,$query2)){
		echo "Success";
	}else 
		echo "Failed";
 ?>
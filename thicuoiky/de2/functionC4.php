<?php 
	include 'connectDB.php';

	$conn = OpenCon();
	$MAKH = $_POST['MAKH'];
	$sql = "select * from dochang where MAKH ='$MAKH'";

	$res = mysqli_query($conn,$sql);
	$rows = array();
	$result['isSuccess'] = false;

	if(mysqli_num_rows($res) == true){
		$result['isSuccess'] = true;
		$result['rows'] = array();
		while($row = mysqli_fetch_assoc($res))
			array_push($result['rows'],$row);
	}

	echo json_encode($result);

 ?>
<?php 
	include 'connectDB.php';

	$conn = OpenCon();
	$sql = "SELECT * FROM `dochang`";

	$result = mysqli_query($conn,$sql);

	$res['success'] = false;

	if(mysqli_num_rows($result) > 0){
		$res['rows'] = array();
		$res['success'] = true;
		while($row = mysqli_fetch_assoc($result)){
			array_push($res['rows'],$row);
		}
	}
	
	echo json_encode($res);


?>
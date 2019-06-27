<?php 
	include 'connectDB.php';
	$ngayDH = $_GET['ngayDH'];

	$conn = OpenCon();
	$sql = "select * from dochang where NGAYDAT = '$ngayDH'";

	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		$res['rows'] = array();
		$res['success'] = true;
		while($row = mysqli_fetch_assoc($result)){
			array_push($res['rows'],$row);
		}
		echo json_encode($res);
	} else {
		$res['success'] = false;
		echo json_encode($res);
	};
 ?>
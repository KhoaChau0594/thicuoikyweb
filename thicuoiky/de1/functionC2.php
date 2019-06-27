<?php 
	include 'connnectDB.php';
	$conn = OpenCon();

	$ngay = $_POST['ngay'];

	$sql = "select s.MASACH, s.TUADE from SACH s, MUONSACH ms where ms.NGAYMUON = '$ngay' and ms.MASACH = s.MASACH";

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
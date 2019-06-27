<?php 
	include 'connnectDB.php';
	$conn = OpenCon();
	$docgia = $_POST['docgia'];
	$masach = $_POST['masach'];
	$sql = "delete 
	from MUONSACH 
	where MADOCGIA = '$docgia' 
		and MASACH = '$masach'";

	if(mysqli_query($conn,$sql)){
		$msg['success'] = true;
	}
	else{
		$msg['success'] = false;	
	}
	echo json_encode($msg);
 ?>
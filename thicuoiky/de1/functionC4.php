<?php 
include 'connnectDB.php';

$madocgia = $_POST['madocgia'];

$conn = OpenCon();
$sql = "SELECT TUADE
			FROM MUONSACH ms, SACH s, DOCGIA dg
			WHERE dg.MADOCGIA = '$madocgia '
				and  dg.MADOCGIA = ms.MADOCGIA
				and s.MASACH = ms.MASACH";

$result = mysqli_query($conn,$sql);
$data['arr'] = array();
$data['success'] = true;

if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($data['arr'],$row);		
	}
	echo json_encode($data);
}
else{
	$data['success'] = false;
	echo json_encode($data);	
}


 ?>
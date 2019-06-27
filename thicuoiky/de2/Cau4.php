<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cau 4</title>
</head>
<body>
	Ten khach hang: <select id="tenKH">
		<option value=""></option>
		<?php 
			include 'connectDB.php';

			$conn = OpenCon();
			$sql = 'select * from khachhang';
			$result = mysqli_query($conn,$sql);

			while($row = mysqli_fetch_assoc($result)){
				echo '<option value=\''. $row['MAKH'] .'\'>' . $row['TENKH'] . '</option>';
			}
		 ?>
	</select>
	<br><p>Danh sach don hang dat</p>
	<table>
		<thead>
			<th>STT</th>
			<th>Ten don hang</th>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<script src="jquery-3.3.1.js"></script>
	<script>
			let haha;
			$('#tenKH').change(()=>{
				$selectedID = $('#tenKH').val();

				$.ajax({
					url: '/thicuoiky/de2/functionC4.php',
					type: 'POST',
					data: {MAKH : $selectedID},
					dataType: 'json'
				}).done((msg)=>{
					haha = msg;
					$('tbody tr').remove();
					if(msg.isSuccess){
						$.each(msg.rows,(index,value)=>{
							$tr = '<tr>' +
										'<td>' + index + 1  + '</td>' +
										'<td>' + value['TENDH']  + '</td>' +
									'</tr>';

							$('tbody').append($tr);
						})
					}
					else alert("Khong tim thay du lieu");
				})
			})
	</script>
</body>
</html>
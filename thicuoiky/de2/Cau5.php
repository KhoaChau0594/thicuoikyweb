<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cau 5</title>
</head>
<body>
	<p>Danh sach 10 mat hang ban chay nhat</p>

	<table>
		<thead>
			<th>STT</th>
			<th>Ten Mat Hang</th>
			<th>So luong ban</th>
		</thead>
		<tbody>
			<?php 
				include 'connectDB.php';
				$conn = OpenCon();

				$sql = "select h.TENHH,SUM(SOLUONG) soluong
							from hanghoa as h,chitietdonhang02 as ct
							where ct.MAHH = h.MAHH
							group by h.TENHH
							order by soluong desc
							limit 10";

				$result = mysqli_query($conn,$sql);

				if(mysqli_num_rows($result) == true){
					$i = 0;
						while($row = mysqli_fetch_assoc($result)){
							echo '<tr>';
							echo '<td>' . ($i + 1) . '</td>';
							echo '<td>' . $row['TENHH'] . '</td>';
							echo '<td>' . $row['soluong'] . '</td>';
							echo '</tr>';

							$i++;
						}
					}
				
			 ?>
		</tbody>
	</table>
</body>
</html>
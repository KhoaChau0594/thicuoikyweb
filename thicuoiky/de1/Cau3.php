<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cau 3</title>
	<style>
		table,th,td{
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<?php 
			include 'connnectDB.php';

			$conn = OpenCon();
			$sql = 'select * from MUONSACH,DOCGIA where DOCGIA.MADOCGIA = MUONSACH.MADOCGIA';
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) > 0){
			?>
			<table>
				<thead>
					<th>STT</th>
					<th>Ten doc gia</th>
					<th>Ma sach</th>
					<th>Chuc nang</th>
				</thead>
				<tbody>
			<?php
				$i = 1;
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td class="tendocgia">'.$row['TENDOCGIA'].'</td>';
					echo '<input type="hidden" name="madocgia" value='. $row['MADOCGIA'] .'>';
					echo '<td class="masach">'.$row['MASACH'].'</td>';
					echo '<td><button type=\'button\' class=\'xoa\'>Xoa</button></td>';
					echo '</tr>';
					$i++;
				}
			}else{
				echo 'No data';
			}
			?>
		</tbody>
	</table>
	<script src="jquery-3.3.1.js"></script>
	<script>
		$('.xoa').click((event)=>{
			$tr = $(event.target).parents()[1];
			let masach = $($tr).find('.masach').html();
			let madocgia = $($tr).find('input').val();
			console.log(madocgia);
			$.ajax({
				data: {'docgia' : madocgia,
							'masach' : masach},
				url:'http://localhost/thicuoiky/de1/functionc3.php',
				dataType: 'json',
				type: 'POST'
			}).done((msg)=>{
				console.log(msg);
				if(msg.success == true){
					$($tr).remove();
				}
				else{
					alert('Failed');
				}
			})
		})
	</script>
</body>
</html>
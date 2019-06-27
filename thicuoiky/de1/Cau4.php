<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cau 4</title>
</head>
<body>
	<p>Ten doc gia: 
		<select name="" id="name">
			<option value=""></option>
		<?php 
			include 'connnectDB.php';

			$conn = OpenCon();
			$sql = "SELECT * from DOCGIA";

			$result = mysqli_query($conn,$sql);

			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo '<option value="'.$row['MADOCGIA'].'">'.$row['TENDOCGIA'].'</option>';
				}
			}
		 ?>				
	</select></p>

<script src="jquery-3.3.1.js"></script>
<script>
	$('#name').change((event)=>{
		let madocgia = $(event.target).val();
		$.ajax({
			data: {'madocgia' : madocgia},
			dataType: 'json',
			url: '/thicuoiky/de1/functionC4.php',
			type: 'POST'
		}).done((msg)=>{
			$('table').remove();
			if(msg.success == false){
				alert('No data');
			}
			else{
				
				$table = '<table><thead><th>STT</th><th>Ten Sach</th></thead><tbody></tbody></table>';
				$('body').append($table);
				$.each(msg.arr,(index,value)=>{
					$tr = '<tr>' +
							'<td>' + index + 1 + '</td>' +
							'<td>' + value['TUADE'] + '</td>' +
							'</tr>'
				})
				$('tbody').append($tr);
			}
		}).fail(()=>{
			$('table').remove();
		})
	})
</script>
</body>
</html>
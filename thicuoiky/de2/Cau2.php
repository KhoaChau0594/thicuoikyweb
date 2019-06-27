<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cau 2</title>
</head>
<body>
	Ngay: <input type="date" name="ngayDH"><br><br>
	<p>Danh sach don dat hang</p>

	<table>
		<thead>
			<th>STT</th>
			<th>Ma dat hang</th>
			<th>Ten khach hang</th>
		</thead>
		<tbody>

		</tbody>
	</table>
</body>
<script src="jquery-3.3.1.js"></script>
<script>
	$('input[name="ngayDH"]').change((event)=>{
		ngayDH = $(event.target).val();
		$.ajax({
			url: '/thicuoiky/de2/functionC2.php',
			data: {ngayDH : ngayDH},
			dataType: 'json',
			type: 'GET'
		}).done((msg)=>{
			$('tbody tr').remove();
			if(msg.success){
				$.each(msg.rows,(index,value)=>{
					$tr = '<tr>'+
							'<td>' + index + 1 + '</td>'+
							'<td>' + value['MADH'] + '</td>'+
							'<td>' + value['TENDH'] + '</td>'+
						'</tr>';
					$('tbody').append($tr);		
				})
			}else alert('Khong tim thay du lieu')
			
		})

	}
	);
	
</script>
</html>
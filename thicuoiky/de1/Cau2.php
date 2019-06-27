<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table, th, td, tr{
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	Ngay: <input type="date" id="ngay">
	<br><p>Nhung cuon sach duoc muon ngay</p>
	<table>
		<thead>
			<th>STT</th>
			<th>Ma sach</th>
			<th>Tua de</th>
		</thead>
		<tbody>
			
		</tbody>
	</table>


<script src="jquery-3.3.1.js"></script>
<script>
	$('#ngay').change(()=>{
		$.ajax({
			data: {'ngay': $('#ngay').val()},
			url: 'http://localhost/thicuoiky/de1/functionc2.php',
			dataType: 'json',
			type: 'POST'
		}).done((msg)=>{
			$('tbody tr').remove();
			if(msg.success == true){
				$.each(msg.rows,(index,value)=>{
					$td = '<tr><td>'+index+1+'</td>' +
						'<td>'+value['MASACH']+'</td>' +
						'<td>'+value['TUADE'] + '</td></tr>';
					$('tbody').append($td);
				})
			}
			else alert('No data found');
		})
	})
</script>
</body>
</html>
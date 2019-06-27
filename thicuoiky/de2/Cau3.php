<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cau 3</title>
</head>
<body>
	<p>Danh sach don hang</p>

	<table>
		<thead>
			<th>STT</th>
			<th>Ma don hang</th>
			<th>Ten don hang</th>
			<th>Chuc nang</th>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<script src="jquery-3.3.1.js"></script>
	<script>
		$(()=>{
			$.ajax({
				url: '/thicuoiky/de2/functionC3.php',
				type: 'GET',
				dataType: 'json'
			}).done((msg)=>{
				$('tbody tr').remove();
				if(msg.success){
					$.each(msg.rows,(index,value)=>{
						$tr = '<tr>'+
								'<td>' + index + 1 + '</td>'+
								'<td>' + value['MADH'] + '</td>'+
								'<td>' + value['TENDH'] + '</td>'+
								'<td> <button class=\'xoaBtn\'>Xoa</button> </td>'+
							'</tr>';
						$('tbody').append($tr);		
					})
				}else alert('Khong tim thay du lieu')
				})

			console.log()
			$('.xoaBtn').click((event)=>{
			$tr = $(event.target).parents()[1];
			
			$.ajax({
				url: '/thicuoiky/de2/xoa.php',
				type: 'GET',
				dataType: 'json',
				data: {MADH : $($tr).find('td:nth-child(2)').html(),
					TENDH: $($tr).find('td:nth-child(3)').html()}
			}).done((msg)=>{
				if(msg.isSuccess){
					alert('Xoa thanh cong');
					$tr.remove();
				}
				else alert('Xoa that bai')
			})
		});
		});


	</script>
</body>
</html>
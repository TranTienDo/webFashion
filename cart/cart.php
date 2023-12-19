<!-- Content here -->
<div class="container mt-3">
	<h1>Your cart</h1>

	<table class="table table-bordered table-sm">
		<thead>
			<tr style='text-align: center'>
				<th> </th>
				<th style='width:12%;'>Hình ảnh</th>
				<th>Tên sản phẩm</th>
				<th>Đơn giá</th>
				<th>Số lượng</th>
				<th>Thành Tiền</th>
				<th>Hành động</th>
				<th>ID</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$giaTien = 200000;

			for ($i = 1; $i <= 4; $i++) {

				?>
				<tr>
					<td> <input type="checkbox"> </td>
					<td> <img src="asset/images/tiedo.jpeg " style='width:100px;margin:0 0 0 19%;object-fit: cover' alt="hình ảnh"> </td>
					<td>Tên sản phẩm
						<?php echo "$i" ?>
					</td>
					<td>
						<?php echo "$giaTien" ?>
					</td>
					<td> 1 </td>
					<td>
						<?php echo "$giaTien" ?>
					</td>
					<td>
						<i class="fa fa-toggle-off" aria-hidden="true"
							style='background:#009900;padding:3%;maring:5px;border-radius: 10px;'></i>
						<i class="fa-solid fa-eye"
							style='background:#0066FF;color:#FFFFFF;padding:3%;margin:5px;border-radius:10px'></i>
						<i class='fas fa-edit' style=' background:#00FFFF;padding: 3%;margin:5px;border-radius:10px '></i>
						<i class='fas fa-trash-alt '
							style='background:	#FF0000;color:#ffffff;padding:3%;;margin:5px;border-radius 10px; '></i>
					</td>
					<td>
						<?php echo "$i" ?>
					</td>

				</tr>
				<?php

			}
			$sum = $giaTien * 4;
			?>

		</tbody>
		<tr>
			<td>Tổng cộng </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

			<td>
				<?php echo "$sum" ?>
			</td>
		</tr>
	</table>
</div>

</div>
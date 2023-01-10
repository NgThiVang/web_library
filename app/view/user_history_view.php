<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../web/css/userRender/historyUser.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
	<title>Lịch sử mượn sách của người dùng</title>
</head>
<style>
	.btn-group >.btn:first-child {
    margin-left: 0;
    background: transparent !important;
		border: none;
	}
</style>
<body>
	<button class="custombackhome"><a href="../../index.php"><img
				src="https://img.icons8.com/material-outlined/24/FFFFFF/home--v2.png" /> Trang chủ </a></button>
	<?php
	require '../controller/user_history_controller.php';
	?>
	<div class="container">
		<form method="GET">
			<div class="col-md-12">
				<div class="col-sm-2">
					<div class="content">Người dùng</div>
				</div>
				<div class="col-sm-7">
				<select class="selectpicker selectbox" name="user_id" data-show-subtext="true" data-live-search="true">
				<option > </option>
						<?php
						foreach ($listUser as $key => $value) {
							 if($_GET['user_id'] && $_GET['user_id'] == $value['id']){
									echo '<option value="' . $value['id'] .'" selected >' . $value['name'] . '</option>';
								}else{
									echo '<option value="' . $value['id'] .'">' . $value['name'] . '</option>';
								}
							
						}
						?>
				</select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-sm-2">
					<div class="content">Sách</div>
				</div>
				<div class="col-sm-7">
				<select class="selectpicker selectbox" name="book_id"  data-show-subtext="true" data-live-search="true">
				<option> </option>
					<?php
						foreach ($list_book as $key => $value) {
							if($_GET['book_id'] && $_GET['book_id'] == $value['id']){
								echo '<option value="' . $value['id'] .'" selected >' . $value['name'] . '</option>';
							}else{
								echo '<option value="' . $value['id'] .'">' . $value['name'] . '</option>';
							}
						}
						?>
				</select>
				<span id="result"></span>
					<!-- <select class="selectbox" name="book_id">
						
					</select> -->
				</div>
			</div>
			<!-- button tìm kiếm -->
			<input id="button" type="submit" name="search" value="Tìm kiếm" style="cursor:pointer" class="search">
			<input id="button" type="submit" name="reset" value="reset" style="cursor:pointer" class="search">
			<!--  -->
			<!-- Đếm số thiết bị -->
			<div class="count">
				Số kết quả tìm thấy: <?php echo (count($result)); ?>
			</div>

			<!-- Bảng hiển thị -->
			<table class="table">
				<tr>
					<th class="title-col"> No </th>
					<th> Tên người dùng</th>
					<th> Thời gian dự kiến muộn</th>
					<th> Thời điểm trả </th>
					<th> Tên sách</th>
				</tr>
				<?php
				for ($i = 0; $i <= count($result) - 1; $i++) {
					$result[$i]['borrowed_date'] = formatDate($result[$i]['borrowed_date']);
					$result[$i]['return_plan_date'] = formatDate($result[$i]['return_plan_date']);
					$result[$i]['return_actual_date'] = formatDate($result[$i]['return_actual_date']);

					echo '
                                <tr>
                                    <td>' . ($i + 1) . '</td>
                                    <td>' . $result[$i]['users_name'] . '</td>
                                    <td>' . $result[$i]['borrowed_date'] . ' ~ ' . $result[$i]['return_plan_date'] . '</td>
                                    <td>' . $result[$i]['return_actual_date'] . '</td>
                                    <td>' . $result[$i]['books_name'] . '</td>
                                </tr>';
				}
				?>


			</table>
		</form>
	</div>
</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>


</html>
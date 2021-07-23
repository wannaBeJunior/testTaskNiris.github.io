<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/Style.css?<?php echo time()?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		<div class="content">
			<form action="insertCity/insertCity" method="POST">
				<label>Добавить город</label>
				<input type="text" name="city" placeholder="Введите название города...">
				<input type="submit" name="button" value="Добавить">
				<label>Ошибка</label>
			</form>
			<div class="citiesList">
				<label>Список городов</label>
				<div class="up" onclick="listUp(-1)">
					<p>UP</p>
				</div>
				<div class="list">
					<?php
						foreach ($data as $city) {
							?>
								<p><?php echo $city['cityName']; ?></p>
							<?php
						}
					?>
				</div>
				<div class="down" onclick="listDown(1)">
					<p>DOWN</p>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/mainPage.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="canonical" href="https://html5-templates.com/" />
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="./assets/js/plugins/window.js"></script>
	<link rel="stylesheet" href="./assets/css/98.css" />
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	<title>Room6 | Desktop</title>
</head>

<body>
	<div id="desktop">

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/room6/View/Students/window.php" ?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/room6/View/Subjects/window.php" ?>

		<div id="taskbar">
		</div>

		<div id="icons">

			<div class="icon">
				<a class="openWindow" data-id="0">
					<div class="shortcut">
						<img src="./assets/images/users-2.png" alt="Shortcut Icon">
						Students
					</div>
				</a>
			</div>

			<div class="icon">
				<a class="openWindow" data-id="1">
					<div class="shortcut">
						<img src="./assets/images/help_book_cool-4.png" alt="Shortcut Icon">
						Subjects
					</div>
				</a>
			</div>

			<div class="icon">
				<a class="openWindow" data-id="2">
					<div class="shortcut">
						<img src="./assets/images/directory_open_cool-0.png" alt="Shortcut Icon">
						Documents
					</div>
				</a>
			</div>

			<div class="icon">
				<a class="openWindow" data-id="3">
					<div class="shortcut">
						<img src="./assets/images/B7_U2avCIAAHrvO.png" alt="Shortcut Icon">
						Python Compiler
					</div>
				</a>
			</div>

			

		</div>
	</div>
	<script>
		function updateGridColumns() {
			const iconsContainer = document.getElementById('icons');
			const screenWidth = window.innerWidth;
			const numColumns = Math.floor(screenWidth / 100);
			iconsContainer.style.gridTemplateColumns = `repeat(${numColumns}, 1fr)`;
		}
		window.addEventListener('resize', updateGridColumns);
		updateGridColumns();
	</script>
</body>

</html>
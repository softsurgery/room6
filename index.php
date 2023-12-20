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
	<script src="./assets/js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	<link rel="stylesheet" href="./assets/css/98.css" />

	<title>Windows Template</title>
</head>

<body>
	<div id="desktop">

		<div class="window" data-title="Welcome">
			<h1>Subjects</h1>
			<p>Minimize the windows to the taskbar, make them full screen or close them.</p>
			<p>Drag the title bar to move the windows or resize them from the bottom right corner.</p>
			<hr />
			<p><strong>You can download and edit this template freely as long as you leave a visible link to
					HTML5-Templates.com</strong></p>
		</div>

		<div id="taskbar">
		</div>

		<div id="icons">
			<div class="icon">
				<div class="shortcut">
					<img src="./assets/images/help_book_cool-4.png" alt="Shortcut Icon">
					<a class="openWindow" data-id="0">Subjects</a>
				</div>
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
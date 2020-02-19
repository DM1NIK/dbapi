<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Title</title>
	</head>
	<body>
		<?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        foreach (glob("classes/*.php") as $filename)
        {
            include $filename;
        }
        $test = new main();
				echo "die";
?>

	</body>
</html>

<?php

echo "Nimic";
	session_start();
	echo "In if";
	unset($_SESSION['username']);
	header("Location:signin.php");
	session_destroy();

	?>
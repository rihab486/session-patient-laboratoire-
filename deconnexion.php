	<?php
	session_start();
	$_SESSION = array();
	session_destroy(); 
	header("Location: test1.php"); //tarja3 win da5alit il email mdp
	?>

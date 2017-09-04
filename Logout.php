<?php
session_start();
    if(isset($_SESSION['username'])) {
		echo $_SESSION['username'];
		unset($_SESSION['username']);
		echo " You have been logged out!";
		
	}
	else
	{
		echo "Error: You must be signed in to logout!";
	}
	echo '<form action="LandingPage.php" method="post" enctype="multipart/form-data" style="cursor: pointer;">
<br>
<input type="submit" value="Home" name="submit" style="cursor: pointer;">
</form>';
	?>
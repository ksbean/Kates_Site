<?php
if(isset($_POST["submit"])) {
$target_dir="Images/";
$target_file=strip_tags($target_dir . $_POST['imageToDelete']);
$deleteOk = 0;


if( file_exists($target_file)){
		
		$deleteOk = 1;
	}
	else{
		$deleteOk=0;
	}
	if($deleteOk==1)
	{
		echo $target_file;
		unlink($target_file);
		 echo " has been deleted.";
	}
	else if($deleteOk==0){
		echo "File Not Found";
	}
	echo' <form action="LandingPage.php" method="post" enctype="multipart/form-data" style="color:white;">
<br>
<input type="submit" value="Home" name="submit" style="cursor: pointer;">
</form>';
}
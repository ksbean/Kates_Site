<?php
if(isset($_POST["sub"])) {
$target_dir="Images/";
$target_file=strip_tags($target_dir . basename($_FILES["imageToUpload"]["name"]));
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
if($check == true){}
else{
	$uploadOk = 0;
	echo "not an image file";
}
	if( file_exists($target_file)){
		
		$uploadOk = 2;
	}
if($_FILES["imageToUpload"]["size"] > 500000)
{
	echo "Sorry file is to large";
	$uploadOk=0;
}
if($uploadOk == 0){
	echo "ERROR: FILE UPLOAD FAILED";
}
else if($uploadOk == 2)
{
	echo "Sorry File already exists";
	
}
else{
if(move_uploaded_file($_FILES["imageToUpload"]["tmp_name"],$target_file)){
	
echo "The File " . basename($_FILES["imageToUpload"]["name"]). " has been uploaded.";
$msg = "A File has been uploaded to your site, if this upload was not executed by you, please visit the site and change your Identification Information!
	if it as you please ignore this message 
	Thank you have a nice day!";
	$msg = wordwrap($msg, 50);
	//mail("ksbean@umich.edu","Uploaded File Sucessfully",$msg,"From: ksbean@umich");		
}
else{
	echo "Sorry,there was an error uploading your file.";
}
}
echo '<form action="LandingPage.php" method="post" enctype="multipart/form-data" style="cursor: pointer;">
<br>
<input type="submit" value="Home" name="submit" style="cursor: pointer;">
</form>';
}
?>
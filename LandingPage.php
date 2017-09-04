<!DOCTYPE html>
<html lang = "en">
<?php 
include('head.php');
?>
<title>Katelyn's Site Header</title>
<link href="StyleSheets/LandngSS.css" rel="stylesheet" type="text/css" />
<body>
<script type="text/javascript">
var counter=1;
function showimg(){
	document.getElementById("photobannercont").innerHTML= imgar[counter].concat('<input style="float:left; width:10%;" type="button" class="scroll" value="<" onclick="chandisneg()"></input> <input style="float:right; width:10%;" type="button" class="scroll" value=">" onclick="chandispos()"></input>');
	}
function chandisneg(){
if(imgar[counter-1]!=null)
	counter=counter-1;
else
	counter=imgar.length;

showimg();
}

function chandispos(){
if(imgar[counter+1]!=null)
	counter=counter+1;	
else
	counter=0;

showimg();
}
</script>
<br><br><br>
<div id="photobannercont">
<?php
include('displayImages.php');
?>
<script>
var imgar=<?php echo json_encode($_SESSION['imagearray']) ?>;
showimg();
</script>
</div>

<h1 style="color:white"> Documents</h1>
<div class= "DD">
<?php
include('DD.php');
?>
</div>
<br>
<footer style="text-algin: center;">
<?php
 session_start();
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
echo '<form style="border: 10px solid black; border-bottom:0px; width: 300px;margin:auto;" action="uplimg.php" method="post" enctype="multipart/form-data">
<h2 style="color:white;"><u>Select Image to Upload:</u></h2>
<input type="file" name="imageToUpload" id="imageToUpload" >
<input type="submit" value="Upload Image" name="sub" style="cursor: pointer;">
</form>'; 
echo '<form style="border: 10px solid black; border-bottom:0px; width: 300px; margin:auto;" action="Delimg.php" method="post" enctype="multipart/form-data">
<h2 style="color:white;"> <u>Select Image to Delete:</u></h2>
<select id="selectImage">
<option> Choose an Image </option>
</select>
<input type="submit" value="Delete Image" name="submit" style="cursor: pointer;">
</form>';
echo '<form  style="border: 10px solid black; border-bottom:0px; width: 300px; margin:auto;" action="Upload_File.php" method="post" enctype="multipart/form-data">
<h2 style="color:white;"><u>Select File to Upload:</u></h2>
<input type="file" name="fileToUpload" id="fileToUpload" >
<input type="submit" value="Upload Document" name="submit" style="cursor: pointer;">
</form>';
echo '<form style="border: 10px solid black; width: 300px; margin:auto;"  action="Delete_File.php" method="post" enctype="multipart/form-data">
<h2 style="color:white;"> <u>Select File to Delete:</u></h2>
<input type="text" name="fileToDelete" id="fileToDelete">
<input type="submit" value="Delete Document" name="submit" style="cursor: pointer;">
</form>';

echo '<form style="" action="Logout.php" method="post" enctype="multipart/form-data">
<input type="submit" value="Logout" name="submit" style="cursor: pointer;">
</form>';
	} 
	else{
	echo '<form style="bottom:0px;" action="login.php" method="post" enctype="multipart/form-data">
<input type="submit" value="Login" name="submit" style="cursor: pointer;">
</form>';
	}
	
?>
</footer>
</body>
</html>


<?php
$dir = "Images/";
$imagearray=array();
if(is_dir($dir))
{
	if($dh = opendir($dir)){
		while(($file = readdir($dh)) !== false){
			if($file == '.' || $file == "..")
			{
			;
			}
			else{
				array_push($imagearray,"<img align='middle' id='photo1' class='photobanner' src=$dir$file style='display:inline; width:80%;' >");
			}
		}
		closedir($dh);
		$_SESSION['imagearray']=$imagearray;
		
	}
	

	
}
else
{
	echo "Error: Directory not found!";
}
?>
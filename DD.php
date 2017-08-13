<?php
$dir = "Random/";
$torf=2;
$i=0;
$filear= array();
while($torf !== 0)
{
	if($torf!==2)
	{
		$dir=$dir$filear[$i];
	}
	$torf=0;
	
if(is_dir($dir)){
	if($dh = opendir($dir)){
		while(($file = readdir($dh)) !== false){
			if($file == '.' || $file == "..")
			{
			;
			}
			else if(is_dir($file))
			{
				$torf=1;
			}
			else {
				echo"<a style='background: rgba(0,0,0,1); border: 1px solid white; 
				font-size:20px; color:white; text-algin:right; float:left;padding:5.5px; width:97%' 
				href=$dir$file download>$file</a><br><br>";
			}
		}
		closedir($dh);
	}
}
}
else
{
	echo "Error: Directory not found!";
}
?>
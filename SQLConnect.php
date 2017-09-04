<?php
function connect(){
    $dbCon = mysqli_connect("localhost", "root", "pa55word", "test") 
	or die("connection failed: %s\n". $dbCon -> error);
	return $dbCon;
}

function disconnect($dbCon){
$dbCon -> close();	
}
?>
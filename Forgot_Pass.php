<p>Please Enter your Email Address Here</p>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="email" name="email" id="email">
<button type="submit" name = "submit">Send Email</button>
</form>
<form action="LandingPage.php" method="post" enctype="multipart/form-data">
<br>
<input type="submit" value="Home" name="submit">
</form>
<form action="login.php" method="post" enctype="multipart/form-data">
<input type="submit" value="Login" name="submit">
</form>
<?php
if (isset($_POST['submit']) && isset($_POST['email']) ) 
	{ 
include 'SQLConnect.php';		//Allows connect function
$connect = connect();
$emaili=strip_tags($_POST['email']);
htmlspecialchars($emaili);
$emaili=trim($emaili);					//ALL SECURITY MEASURES
$emaili=stripslashes($emaili);

$query= mysqli_query($connect,"SELECT Email,Username
					  FROM user
					  WHERE Email= '$emaili'");		//checks if password andusername valid
if(!$query){
	die('Failed Login' . mysql_error());			//Query fails to execute	  
}
else if($query->num_rows!=0){
	$row=mysqli_fetch_row($query);
	$dbEmail=$row[0];
	$dbUser=$row[1];
} else{
	die( "Sorry that Email could not be located, please try again.");
}
if($emaili == $dbEmail)
{
	function generateRandomString(){
		$length = rand(10,20);
		$characters = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM.,+=_-';
		$charactersLength=strlen($characters);
		$rndstr ='';
		for($i=0;$i<$length;$i++){
			$rndstr .=$characters[rand(0, $charactersLength -1)];
		}
		return $rndstr;
	}

	
	$RndString=generateRandomString();
	//$query=mysqli_query($connect,"UPDATE user SET Password=$RndString WHERE Email=$emaili");
	echo $RndString;
	$msg = "Your password has been changed: \r\n
	Username: '$dbUser' \r\n
	Password: '$RndString' \r\n
	";
	echo $msg;
	/*$msg = wordwrap($msg,20);
	mail("ksbean@umich.edu","Password Update",$msg,"From: ksbean@umich");*/
	
}
mysqli_close($connect);
	}
?>
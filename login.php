<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Username: <input type="text" name="name" id="name">
Password: <input type="password" name="pass" id="pass">
<button type="submit" name = "submit" style="cursor: pointer;">Login</button>
</form>
<a href="Forgot_Pass.php">Forgot Password?</a>

<form action="LandingPage.php" method="post" enctype="multipart/form-data" style="cursor: pointer;">
<br>
<input type="submit" value="Home" name="submit" style="cursor: pointer;">
</form>;
<?php
session_start();

if (isset($_POST['submit']) && isset($_POST['name']) ) 
	{ 
include 'SQLConnect.php';		//Allows connect function
$connect = connect();

$useri=strip_tags($_POST['name']);
$passi=strip_tags($_POST['pass']);
htmlspecialchars($useri);
$useri=trim($useri);					//ALL SECURITY MEASURES
$useri=stripslashes($useri);
htmlspecialchars($passi);
$passi=trim($passi);
$passi=stripslashes($passi);


$query= mysqli_query($connect,"SELECT Username,Password,Email,IndexNum
					  FROM user
					  WHERE (Username= '$useri' || Email='$useri') && Password = '$passi'");		//checks if password andusername valid
if(!$query){
	die('Failed Login' . mysql_error());			//Query fails to execute	  
}
else if($query->num_rows!=0){
	$row=mysqli_fetch_row($query);
	$dbUser=$row[0];
	$dbPass=$row[1];
	$dbEmail=$row[2];
	
} else{
	die( "Invalid Username or Password");
}
if(($useri == $dbUser || $useri == $dbEmail) && $passi==$dbPass)
{
	$_SESSION['username']=$useri;
	 header('Location: LandingPage.php');
}


//$num_rows = $query->num_rows; //for testing purposes only
//echo $num_rows;
disconnect($connect);
	}
?>
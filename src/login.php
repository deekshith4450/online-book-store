<?php
$con=mysqli_connect("localhost","root","","project2");
if(!$con)
{
	echo "not connected";
	
}


$email=(string)$_POST['Emailid'];
$pass=(string)$_POST['pwd'];
if($email==null and $pass ==null)
{
	
	echo "<script>alert(\"please insert eamil and password\")</script>";
	header("refresh:0; url=login.html");
}
else
{

$result=mysqli_query($con,"select password from user where email='$email'");
$dbpass=mysqli_fetch_row($result);
$norows=mysqli_num_rows($result);
if($norows>1)
{
	alertpop("password doesnot match");
}
else
{
	$arpass=(string)$dbpass[0];
	if(strcmp($arpass,$pass)!==0)
	{
		echo "<script>alert(\"email id or password does not match\")</script>";
		header("refresh:0; url=login.html");
	}
	else
	{
		$query="INSERT INTO LOGIN VALUES( '$email','$pass')";
		if(!mysqli_query($con,$query))
		{
			echo "not inserted";
		}
		else
		{
			
			header("refresh:0; url=navlogin.php");
			/*echo "<!DOCTYPE html>";
			echo "<html>";
			echo "<head>";
			echo "<meta charset=\"ISO-8859-1\">";
			echo "<title>online book store</title>";
			echo "</head>";
			echo "<body>";
			echo "<iframe src=\"sitename.html\" width=\"100%\" height=\"100%\" scrolling =\"no\"></iframe>";
			echo "<iframe src=\"loginnavigation.html\" width =\"100%\" height=\"100 \"scrolling =\"no\"></iframe>";
			echo "<iframe src=\"branches.html\" height=\"500\" width=\"15%\" ></iframe>";
			echo "<iframe src=\"home.html\" width=\"84%\" height=\"500\" name=\"main\"></iframe>";
			echo "</body>";
			echo "</html>";*/
		}	
		//echo"loggind in";
		
	}
	
	
}
}

?>
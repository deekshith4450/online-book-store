<?php
$con=mysqli_connect('localhost','root','','project2');



$fname=$_POST['Fname'];
$lname=$_POST['Lname'];
$email=$_POST['Email'];
$password=$_POST['pwd'];
$cpassword=$_POST['cpwd'];
$pno=$_POST['phno'];
$address=$_POST['address'];

if($fname==null or $lname==null or $email==null or $password==null or $cpassword==null or $pno==null or $address==null)
{
	echo "<script>alert(\"enter missing fields\")</script>";
	header("refresh:0; url=http://localhost/project_2/webcontent/signup.html");
	
}
elseif(strcmp($password,$cpassword)!=0)
{
	echo"<script>alert(\"password does not match\")</script>";
	header("refresh:0; url=http://localhost/project_2/webcontent/signup.html");
}
elseif(strlen($pno)!=10)
{
	echo"<script>alert(\"phone number is not valid\")</script>";
	header("refresh:0; url=signup.html");
}
else
{
	$query="SELECT fname FROM user WHERE email='$email'";
	$queryexec=mysqli_query($con,$query);
	$dbfname=mysqli_fetch_row($queryexec);
	if($dbfname!=null)
	{
		echo"<script>alert(\"user already exists with that email\")</script>";
		header("refresh:0; url=login.html");
	
	}
	else
	{
		$insertquery="INSERT INTO user VALUES('$fname','$lname','$email','$password','$pno','$address')";
		if(!mysqli_query($con,$insertquery))
		{
		echo"not inserted";
		}
		else
		{
		echo"<script>alert(\"congratulations you are registerd\")</script>";
		header("refresh:0; url=login.html");
		}
	}
}

		

?>
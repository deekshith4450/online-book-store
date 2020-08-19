<?php
$con =mysqli_connect('localhost','root','','project2');
if(!$con)
{
	echo "Not connected";
}
else
{
$query='DELETE FROM login';
$result=mysqli_query($con,$query);
mysqli_query($con,'DELETE FROM addtocart');
if(!$result)
{
	echo "something went wrong";
}
else
{
	//header('Location: navigation.html');
	header('location: firstpage1.html');
}
}






?>
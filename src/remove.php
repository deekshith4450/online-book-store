<?php


  $con=mysqli_connect('localhost','root','','project2');
if(!$con)
{
	echo "could not connect";
}
else
{	$var=$_GET['myvar'];
	$back=$_SERVER['HTTP_REFERER'];
	if($back=="http://localhost/project_2/webcontent/cart.php")
	{
		/* echo $back;
		echo $var; */
		$query="DELETE FROM addtocart WHERE ISBN=$var";
		$result=mysqli_query($con,$query);
		echo mysqli_error($con);
		if(!$result)
		{
			echo "something went wrong";
		}
		else
		{
			header("refresh:0; url=$back");
		}
	}
	else if($back=="http://localhost/project_2/webcontent/yourorders.php")
	{
		/* echo $back; */
		//echo $var;
		$query="DELETE FROM ordertable WHERE orderid=$var";
		$result=mysqli_query($con,$query);
		echo mysqli_error($con);
		if(!$result)
		{
			echo "something went wrong";
		}
		else
		{
			header("refresh:0; url=$back");
		}
	}
	
}  


?>
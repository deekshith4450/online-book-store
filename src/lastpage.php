<?php
$var=$_GET['add'];
$price=$_GET['price'];
$edd=$_GET['edd'];
//echo $var,$edd,$price;
$radio=$_POST['payments'];
$online=$_POST['bank'];
$paymentid="p";
$paymenttype;
if($online =="Select you Bank" and !isset($radio))
{
	
	echo "<script>alert(\"select any one payment methods\")</script>";
	header("refresh:0; url=cart.php");
}
else if(isset($radio))
{
	$online="";
	//echo $online;
	//echo $radio;
	$GLOBALS['paymenttype']=$radio;
	
	
}
else
{	$radio=null;
	$$GLOBALS['paymenttype']=$online;
}
$con=mysqli_connect('localhost','root','','project2');

if(!$con)
{
	echo "could not connect";
}
else
{
	$query="SELECT email FROM login";
	$exe=mysqli_query($con,$query);
	$email=mysqli_fetch_row($exe);
	if(!$email or !$exe)
	{
		echo "something went wrong";
	}
	else
	{
		$query2="SELECT fname,lname FROM user WHERE email='$email[0]'";
		$query4="SELECT ISBN from addtocart";
		$exe2=mysqli_query($con,$query2);
		$exe4=mysqli_query($con,$query4);
		$names=mysqli_fetch_row($exe2);
		if(!$exe2)
		{
			echo "names error";
		}
		else
		{
			$orderid=$names[0][0].$names[1][0];
			$orderid.=date('dmyHi');
			while($isbn=mysqli_fetch_row($exe4))
		{	$query3="INSERT INTO ordertable VALUES('$orderid','$isbn[0]','$email[0]','$var','$edd','$price')";
			$exe3=mysqli_query($con,$query3);
			//echo $orderid;
		}
		$GLOBALS['paymentid'].=date('dmygi');
		$paymentdate=date('d-F-Y');
		$pid=$GLOBALS['paymentid'];
		$ptype=$GLOBALS['paymenttype'];
		//echo $pid,$email[0],$orderid,$ptype,$paymentdate;
		$query5="INSERT INTO payment VALUES('$pid','$email[0]','$orderid','$ptype','$paymentdate')";
		if(!$exe5=mysqli_query($con,$query5))
		{
			echo "did not insert into payment table";
			//echo mysqli_error(mysqli_query($con,$query5));
		}
		else{
			$query6="DELETE FROM addtocart";
			if(!$exe6=mysqli_query($con,$query6))
			{
				echo "error";
			}
			else{
				
			echo "<table align=\"center\"> 
			<tr><td><img src=\"images\payments.png\"</td></tr>";}
		}
		
		
		}
			
	
	
	
	
	
	
	
	}
	
	
	
}

			
			



?>
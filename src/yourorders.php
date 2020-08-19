<?php
$con=mysqli_connect('localhost','root','','project2');
if(!$con)
{
	echo "Did not connect";
}
else
{
	$query="SELECT email FROM login";
	$exe=mysqli_query($con,$query);
	if(!$exe)
	{
		echo mysqli_error($exe);
	}
	else
	{	$orderarr=array();
		$books=array();
		$tp=array();
		$email=mysqli_fetch_row($exe);
		$query2="SELECT orderid,isbn,totalprice,deliverydate FROM ordertable WHERE email='$email[0]'";
		$exe2=mysqli_query($con,$query2);
		if(!$exe2 )
		{
			echo "did not execute ordertable";
		}
		else if(mysqli_num_rows($exe2)==0)
		{
			echo"<h1> NO orders yet</h1>";
		}
		
		
		else
		{
			while($result=mysqli_fetch_row($exe2))
			{	if(!in_array($result[0],$orderarr))
				{
				array_push($orderarr,$result[0]);
				array_push($tp,$result[2]);
				}
			}
			/* print_r($orderarr);
			echo "<br>";
			print_r($tp);  */
			
			for($i=0;$i<sizeof($orderarr);$i++)
			{
				$books=array();
				echo "<table align=\"center\" bgcolor=\"#F0FFF0\" cellpadding=\"5\" border=\"1\" width=\"75%\">";
				echo "<tr><td><b>Order-id:</b>$orderarr[$i]</td>";
				$exe3=mysqli_query($con,"SELECT paymentdate FROM payment WHERE email='$email[0]' AND orderid='$orderarr[$i]'");
				$res=mysqli_fetch_row($exe3);
				echo "<td><b>Ordered Date:</b>$res[0]</td>";
				echo "</tr>";
				
				$exe4=mysqli_query($con,"SELECT isbn FROM ordertable WHERE email='$email[0]' AND  orderid='$orderarr[$i]'");
				while($res1=mysqli_fetch_row($exe4))
				{
					$exe5=mysqli_query($con,"SELECT Name FROM book WHERE ISBN='$res1[0]'");
					while($res2=mysqli_fetch_row($exe5))
					{	//echo $res2[0];
						
						array_push($books,$res2[0]);
						//print_r($books);
					}
					
				}
				
				echo "<table align=\"center\",border=\"100\" width=\"75%\">";
				echo "<tr align=\"left\"><th>Books</th><th>Total Price</th><th>Action</th></tr>";
				echo "<tr><td>";
				for($x=0;$x<sizeof($books);$x++)
				{
					echo $books[$x];
					echo "<br>";
				}
				echo "</td>";
				echo "<td>";
				/* $exe6=mysqli_query($con,"SELECT totalprice FROM ordertable WHERE email='$email[0]' AND '$orderarr[$i]'");
				if(!$tprice=mysqli_fetch_row($exe6))
				{
					echo mysqli_error($tsprice);
					echo "error";
				} */
				echo $tp[$i];
				echo "</td>";
				echo "<td>";
				echo "<a href=\"remove.php?myvar='$orderarr[$i]'\">Cancel</a>";
				echo "</td>";
				echo"</table>";
				echo "</table>";
				//print_r($orderarr);
			}
		}
	}
}

?> 
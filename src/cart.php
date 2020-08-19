<?php
$con=mysqli_connect('localhost','root','','project2');
if(!$con)
{
	echo "connection not established";
}
else
{
	$retreving=mysqli_query($con,"SELECT * FROM addtocart");
	$info=mysqli_num_rows($retreving);
	
	if($info==0)
	{
		echo "<h3><font face=\"courier new\" size =\"10\" color=\"black\">No books in cart</font></h3>";
	}
	else
	{
		echo "<div>";
		echo "<table align=\"center\" width=\"70%\" border=\"1\"  bgcolor=\"#7FFFD4\">";
		echo "<tr>
		<th> Serial no</th>
		<th>Book's information</th>
		<th>Price</th>
		<th>Action</th>
		</tr>";
		$count=1;
		while($info=mysqli_fetch_assoc($retreving))
		{
			echo "<tr><td><b>";
			echo $count;
			echo "</b></td>";
			$count=$count+1;
			echo "<td><b>Book:</b>";
			echo $info['Name'];
			echo "<br>
			<b>Author:</b>";
			echo $info['Author'];
			echo "<br>
			<b>Publisher:</b>";
			echo $info['Publisher'];
			echo "<br></td>
			<td>";
			echo $info['price'];
			$isbn=$info['ISBN'];
			echo "</td>
			<td><a href=\"remove.php?myvar='$isbn'\" onclick=\"GET\" >Remove</a>
			</tr></div>";
			
			
		}
		echo"</table>";
		$pricefecth=mysqli_query($con,"SELECT SUM(price) FROM addtocart");
		$totalprice=mysqli_fetch_row($pricefecth);
		$price=number_format($totalprice[0],2);
		$edd=date("dS - F",strtotime("+7 days"));
		echo "<table align=\"center\" width=\"70%\"bgcolor=\"#7FFFD4\">";
		echo "<tr><td>Toatal price:$price</td></tr>";
		echo "<tr><td>Est Delivery date:$edd</td></tr>";
		echo "</table>";	
		
		
		echo "<form name=\"order\" action=\"payments.php\" method=\"POST\">";
		echo "<table align=\"center\" width=\"70%\"bgcolor=\"#7FFFD4\">";
		echo "<tr><td><span><b>Delivery Address:</b></span></td>";
		echo "<td><textarea rows=\"5\" cols=\"25\" name=\"address\"></textarea></td></tr>";
		echo "<tr><td><input type=\"submit\" value=\"checkout\"  </td></tr>";
		echo "</table>";
		echo "</form>";
		
				
		
		
		
		
	}
}		
?>
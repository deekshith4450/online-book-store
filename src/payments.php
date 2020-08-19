<?php
$con=mysqli_connect('localhost','root','','project2');
$add=$_POST['address'];
if(!$con)
{
	echo "could not connect";
}
else
{
		$pricefecth=mysqli_query($con,"SELECT SUM(price) FROM addtocart");
		$totalprice=mysqli_fetch_row($pricefecth);
		$price=number_format($totalprice[0],2);
		$edd=date("dS - F",strtotime("+7 days"));
		
		echo "<table align=\"center\" bgcolor=\"#99ccff\" width=\"30%\">";
		echo "<tr><td><h3>Payments</h3></td></tr>";
		echo "<tr><td><b>Total Price:</b>$$price</td></tr>";
		echo "<tr><td><b>Delivery date:</b>$edd</td></tr>";
		echo "<tr><td><b>Delivery Address:</b>$add</td></tr>";
		echo "<tr><td><h3>Select payment method</h3></td></tr>";
		echo "<form method=\"post\" action=\"lastpage.php?add=$add&price=$price&edd=$edd\">";
		echo "<tr><td><input type=\"radio\" name=\"payments\" value=\"Debit card\">Debit Card</td></tr>";
		echo	"<tr><td><input type=\"radio\" name=\"payments\" value=\"Credit Card\">Credit Card<br></td></tr>";
		echo	"<tr><td><input type=\"radio\" name=\"payments\" value=\"Pay on Delivery\">Pay on Delivery<br></td></tr>";
		echo	"<tr><td><b>Online Banking:</b><select name=\"bank\">";
		echo	"<option value=\"Select you Bank\" Selected=\"Selected\">Select You Bank</option>";
		echo	"<option value=\"Bank of America\" >Bank of America</option>";
		echo	"<option value=\"Wells Fargo\" >Wells Fargo</option>";
		echo	"<option value=\"Regions\" >Regions</option>";
		echo	"<option value=\"Chase\" >Chase</option>";
		echo	"</select></td></tr>";
		echo 	"<tr><td><input type=\"submit\" value=\"Pay\" ></td></tr>";
		echo    "</table>";
}


?>
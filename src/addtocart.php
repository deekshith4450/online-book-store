<?php
$id=$_GET['myvar'];
$back=$_SERVER['HTTP_REFERER'];
//echo $id;
//echo $back;
$con=mysqli_connect('localhost','root','','project2');
$query='SELECT * FROM login';
$result=mysqli_query($con,$query);
$rows=mysqli_num_rows($result);
if($rows != 1)
{
echo "<script>alert('please login and add books')</script>";
header("refresh:0; url='$back'");
}
else
{
	$query1=mysqli_query($con,"SELECT * FROM book WHERE ISBN='$id'");
	$book=mysqli_fetch_row($query1);
	$book_len=sizeof($book);
	$query2=mysqli_query($con,"INSERT INTO addtocart VALUES('$book[0]','$book[1]','$book[2]','$book[3]','$book[4]','$book[5]')");
	if(!$query2)
	{
		echo "not inserted";
	}
	else{
	header("refresh:0; url=$back");
	}
}
?>
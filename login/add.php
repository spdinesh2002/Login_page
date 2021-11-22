<?php
$un=$_POST['username'];
$pw=$_POST['pw'];
$n=$_POST['n'];
$id=$_POST['i'];
$conn=mysqli_connect("localhost","root","","login");
$query="insert into users values($id,$un,$pw,$n)";
$result=mysqli_query($conn,$query);
echo "Data Inserted Sucessfully";
?>

<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  mysqli_connect('localhost','root','','login');
  $select=mysqli_query("update user set password='$pass' where username='$email'");
}
?>
<?php
if(isset($_POST['submit']) && $_POST['username'])
{
  mysqli_connect('localhost','root','','login');
  $un=$_POST['email'];
  $select=mysqli_query("select username,password from user where username=$un");
    while($row=mysqli_fetch_array($select))
    {
      $email=$row['username'];
      $pass=$row['password'];
      $name=$row['name'];
    }
    $link="<a href='www.samplewebsite.com/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('phpmail/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = $email;
    // GMAIL password
    $mail->Password = $pass;
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From="dineshrs2002@gmail.com";
    $mail->FromName='Admin';
    $mail->AddAddress($email, $name);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
?>
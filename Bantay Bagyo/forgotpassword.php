<?php 
error_reporting(0);
if($_POST['submit']=='Send')
{
//keep it inside
$email=$_POST['email'];
$con=mysqli_connect("Localhost","root","","bantaybagyo");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$query = mysqli_query($con,"select * from users where email_address='$email'")
or die(mysqli_error($con)); 

 if (mysqli_num_rows ($query)==1) 
 {
$code=rand(100,999);
$message="You activation link is: http://bing.fun2pk.com/resetpass.php?email=$email&code=$code";
mail($email, "New Password", $message);
echo "<div style='text-align: center'>";
echo '<p style="color: white; font-size: 150%; text-align: center">
     Email Sent!
      </p>';
$query2 = mysqli_query($con,"update users set password='$code' where email_address='$email' ")
or die(mysqli_error($con)); 
}
else
{
echo "<div style='text-align: center'>";
echo '';
echo '<p style="color: white; font-size: 150%; text-align: center">
      No user exist with this email address!
      </p>';

}}

?>
<form action="forgotpassword.php" method="post">
<br><br><br><center style="font-size: 550%"><font color="White">Bantay Bagyo</font></center><br>
<body bgcolor="#116699"> 
<center style="font-size: 250%"><font color="White">Forgot Your Password?</center><br><br><br><br><br></font>
	
<font color="White"><center style="font-size: 150%">Enter your email address:</center> </font>
<input type="text" style="margin-left:auto;margin-right:auto;display:block;margin-top:3%;margin-bottom:0%" name="email"><br>
<input type="submit" style="height: 75; width: 100px; background-color:white;margin-left:auto;margin-right:auto;display:block;margin-top:3%;margin-bottom:30%" name="submit" value="Send">
</form>
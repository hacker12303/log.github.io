<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>

	<title>&#9762; Dragon WEP &#9760;</title>
	<style>
body {

	 /* background = "11.jpg";	  */
	background-image : url("hack.jpg") ; 
	background-size:cover; 
		 /* background-repeat:no-repeat; */
	

	 
	/* background-color: powderblue; */

     }

h1   {
	    color: #24D80F;
	    font-family: verdana;
        font-size: 100px;
		text-align:center;
		margin: 400px;
		
     
}
a    
	{
  
	color: red;
	border: 2px solid powderblue; 
	margin: 1px;
	font-size: 45px;
	float:right; 
	
	}
input
{
	font-size: 20px;
	float:right; 
}
	</style>

</head>
<body>

	<a href="logout.php">Log-out</a><br><br>
	
	<MARQUEE style="font-size: 120px;margin: 20px;color:#F99300;"ALIGN="middle"HEIGHT="150" WIDTH="90%">Welcome , Mr. <?php echo $user_data['user_name']; ?>	&#10084;&#9762;&#9829;</MARQUEE>
	<h1> successfull access <br>&#9760;  Mr <?php echo $user_data['user_name']; ?>  &#9760</h1>
	

	

	<input type="button" onclick="alert('your pass : ' + <?php echo $user_data['password']; ?>)" value="show your password ?">
</body>
</html>
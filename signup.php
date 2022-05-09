<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign-up &#9760;</title>
</head>
<body>

	<style type="text/css">
	body {

			
			background-image : url("bin.jpg") ; 
			background-size:cover; 
			
	    }
	#text{
		color:#10E9D2;
		font-size: 35px;
		height: 40px;
		border-radius: 50px;
		padding: 4px;
		/* border: solid thin #aaa; */
		width: 100%;
		border: 1px solid black;
		text-align:center;

  
	}

	#button{
		opacity: 0.9;
		padding: 15px;
		width: 100px;
		color: red;
		
		border: none;
		font-family:'Tajawal','sans-serif';
        font-weight:bold;
		font-size: 25px;
		background-color:#0EE649;
	    text-align:center; 
	}

	#box{
		background-image : url("kali.jpg") ; 
	    background-size:cover;

		margin: auto;
		width: 700px;
		padding: 150px;
	}
	a
	{
		font-size: 40px;
		
		float : center;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 130px;margin: 20px;color:#D7260E;text-align:center;font-family:Lucida Handwriting;">Sign-up</div><br><br>
			

			<label style ="color:#F9FC10;font-size: 40px;" >Your name</label><br>
			<input id="text" type="text" name="user_name"><br><br>
			<label style ="color:#F9FC10;font-size: 40px;" >Password</label><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Sign-up"><br><br>
			


			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
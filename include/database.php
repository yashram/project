<?php
	$con = mysql_connect("localhost","root","prince123");
	if(! $con) {
	die("connection error: ".mysql_error());
	}

	mysql_select_db("project",$con);

	if(isset($_POST['login'])) {
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$sq = "SELECT * FROM student WHERE email='$email' AND password='$pass'";
		$run = mysql_query($sq, $con);
		
		if($run != NULL) {
			header('location:../features.html');
		}
		else {
			echo "<script>alert('Incorrect email or password'); location.href='../index.html'; </script>";
		}
	}


	if(isset($_POST['signup'])) 
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$pass1 = $_POST['password1'];
		if ($pass != $pass1) 
		{

			echo "<script>alert('password not match'); location.href='../index.html'; </script>";
		}
		else
		{
				$sq = "INSERT INTO student (email,password) VALUES ('$email','$pass') ";
				$run = mysql_query($sq, $con);
		
			if($run)
			 {
					echo "<script>alert('successfully registered'); location.href='../index.html'; </script>";
			
		     }
		}
	}



	mysql_close($con);
?>       	

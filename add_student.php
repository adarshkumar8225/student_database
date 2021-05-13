<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>



<!DOCTYPE html>
<html>
<head>
    <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
	input {
            margin-right:30%;
	    border-radius:5px;
            width:200px;
        }
        select {
            margin-right:30%;
	    border-radius:5px;
	    width:200px;
        }
        button {
    	    margin-right:30%;
        }
</style>
</head>

<body>
    <div class="container-fluid">
	 <div class="row">
		<div style="height:12%;background-color:#4285f4;padding:0.3% 0;">
			<h1 style='text-align:center;color:white;font-family:Montserrat;'>  
An information system to keep track of the students’ project of an
University/College  </h1>
   	        </div>
	 </div>
 <div class="row">
 	<h2 style="text-align:center">STUDENT ADD SECTION </h2></br></br>

 </div>
    	 <div class="row" style="text-align:right;font-family:Montserrat;font-size:100%;">
                <div class="col-md-6 col-md-offset-3">
			<div style="min-height:300px;background-color:#7f8c8d;padding-top:15%;border-radius:5px;">

	<?php 
if(isset($_GET['flg']))
{
	if($_GET['flg']==="true")
	{
		echo("Successfully added ".$_GET['clgid']);
	}
}
?>

<form action = "add_student.php" method = "POST">
 <div class="form-group">
 	<label for="reg">Register Number:</label>
 	  <input type = "text" name ="reg" placeholder="name Register number"></br>

 	  	<label for="fname">First Name:</label>
 	  <input type = "text" name ="fname" placeholder="first name"></br>

 	  <label for="mname">Middle Name:</label>
 	  <input type = "text" name ="mname" placeholder="middle name"></br>
 	  <label for="lname">Last Name:</label>
 	  <input type = "text" name ="lname" placeholder="last name "></br>

 	   <label for="email">Email:</label>
  <input type = "email" name ="email" placeholder="abc@gmail.com"></br>

     <label for="cgpa">CGAP:</label>
  <input type = "text" name ="cgpa" placeholder="9.8"></br>


 	     <label for="grade">grade:</label>
  <input type = "text" name ="grade" placeholder="enter grade "></br>
    
  <label for="hour">Hours:</label>
  <input type = "text" name ="hour" placeholder="1"></br>

 

  <label for="scode">SCHOOL  CODE:</label>
  <select name ="scode">
						<option >SOS</option>
						<option >SOE</option>
						<option >SOSS</option>
				
		</select></br>
		<label for="dcode">DEPARTMENT CODE:</label>
         <select name ="dcode">
						<option >CIB</option>
						<option >CSE</option>
						<option >EIB</option>
					
		
				
		</select></br>


		<label for="pcode">PROGRAMME CODE:</label>
         <select name ="pcode">
						<option >BTECH</option>
						<option >MTECH</option>
						<option >MCA</option>
					
		
				
		</select></br>


  <label for="pid">Project ID:</label>
  <input type = "text" name ="pid" placeholder="1"></br>



<button type="submit" value="add student" class="btn btn-success">Submit</button>
 </div>
 <div id="footer"><a href="home.php" class="btn btn-primary" >HOME</a><br>
<a href="logout.php" class="btn btn-primary">LOG OUT</a></div>
</form>
</div>
</body>
</html>






<?php
if(isset($_POST['reg']) && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname'])&& isset($_POST['email']) && isset($_POST['cgpa']) &&isset($_POST['grade'])&&isset($_POST['hour'])&&isset($_POST['scode'])&&isset($_POST['dcode'])&&isset($_POST['pcode']) &&isset($_POST['pid'])){
	include('../connection.php');
	
	$reg = $_POST['reg'];
	$fname = $_POST['fname'];
	//$bdate = $_POST['bdate'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$email=$_POST['email'];
	$cgpa = $_POST['cgpa'];

	$grade = $_POST['grade'];
	$hour = $_POST['hour'];
	$scode = $_POST['scode'];
	$dcode = $_POST['dcode'];
	$pcode = $_POST['pcode'];
	$pid = $_POST['pid'];


	
	$sq1 = 'INSERT INTO `student` (`reg`, `fname`,`mname`, `lname` ,`email`,`cgpa`,`grade`,`hour`,`scode`,`dcode`,`pcode`,`pid`) VALUES ("'.$reg.'", "'.$fname.'","'.$mname.'", "'.$lname.'","'.$email.'","'.$cgpa.'","'.$grade.'","'.$hour.'","'.$scode.'","'.$dcode.'","'.$pcode.'","'.$pid.'")';


	mysqli_query($db,$sq1);
	$to=$email;
	//$subject="USERNAME & PASSWORD";
	//$message="YOUR USERNAME IS $clgid & PASSWORD IS $random_string";

	header('location:add_student.php?flg=true&clgid='.$clgid);
}
?>
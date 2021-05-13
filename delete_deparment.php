

<?php 
$ID=$_GET['d_code'];
	include("../connection.php");
	//$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
	//if($connection==null)
	//{
		//echo "Failed to obtain connection please try again";
		//die();
	//}
	//echo $ID;
    $sq1 = "DELETE FROM `department` WHERE `d_code` = '".$ID."'";
	//$query1=$connection->prepare($sq1);
	//$query1->execute();
	mysqli_query($db,$sq1);
	header("Location:editdelete_project.php?msg=DETAILS SUCCESSFULYY DELETED");
?>
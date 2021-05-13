
<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>

<?php
$clgid = $_GET['clgid'];
include('../connection.php');
$q = "DELETE FROM `studentdata1` WHERE `clgid` = '".$clgid."'";
echo($q);
mysqli_query($db,$q)
or die(mysql_error($db));
header("location:show_student.php?msg=true");


?>
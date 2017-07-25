<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
session_start();
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$date=date("Y-m-d H:i:s");
$user= $_SESSION['login'];
$cmt=$_POST['comment'];

$qtitle=$_SESSION['qestitle'];
$answer=$_POST['enter'];
if($answer==true){
		$sql2="SELECT user_id FROM user WHERE username='$user'";
	if($cmt==true){
		$result2=mysqli_query($db,$sql2);
        $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		  $iu1= $row2['user_id'];
		  $sql4="SELECT qes_id from questions where qes_title='$qtitle'";
		$result4=mysqli_query($db,$sql4);
        $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
		$ul2=$row4['qes_id'];
		$sql3="SELECT ans_id FROM answers WHERE ans='$answer'";
		$result3=mysqli_query($db,$sql3);
      $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
		$ul3=$row3['ans_id'];
		$insertincomment=mysqli_query($db,"INSERT INTO comments values('$iu1','$ul2','$ul3','$cmt','$date')");
	   mysqli_select_db($db,"webdata") or die("Couldn't find database"); }
	};
	header("location:main.php");


?>
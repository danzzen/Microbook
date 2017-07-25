<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
session_start();
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$register=$_POST['submit'];
$questiontitle=$_POST['title'];
$questiondes=$_POST['des'];
$tags=$_POST['taggs'];

	if($register==true){
		if($questiontitle==true){
			if($questiondes==true){
				$insert=mysqli_query($db,"INSERT INTO questions values(null,'$questiontitle','$questiondes','$tags')");
			
  $user= $_SESSION['login'];

  $sql1="SELECT user_id FROM user WHERE username='$user'";
  $result1=mysqli_query($db,$sql1);
  $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
  $sql = "SELECT qes_id FROM questions WHERE qes_title ='$questiontitle' and qes = '$questiondes' ";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $id1= $row1['user_id'];
  $id2=$row['qes_id'];
  $date=date("Y-m-d H:i:s");

  $insertinask=mysqli_query($db,"INSERT INTO ask values('$id1','$id2','$date')");
     mysqli_select_db($db,"webdata") or die("Couldn't find database"); 
      header("location: main.php");
			}
		}
	};
	
?>
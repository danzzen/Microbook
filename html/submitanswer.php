<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
 
session_start();
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$register=$_POST['submit'];
$ans=$_POST['Answer'];
$date=date("Y-m-d H:i:s");
$user= $_SESSION['login'];
$qtitle=$_SESSION['qestitle'];
 mysqli_select_db($db,"webdata") or die("Couldn't find database");
if($register==true){
			if($ans==true){
				$insert=mysqli_query($db,"INSERT INTO answers values(null,'$ans','$date')");
			
  $user= $_SESSION['login'];

  $sql1="SELECT user_id FROM user WHERE username='$user'";
  $result1=mysqli_query($db,$sql1);
  $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
  $sql4="SELECT qes_id FROM questions WHERE qes_title='$qtitle'";
  $result4=mysqli_query($db,$sql4);
  $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
  $sql = "SELECT ans_id FROM answers WHERE  ans='$ans'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $id1= $row1['user_id'];
  $id2=$row['ans_id'];
  $id3=$row4['qes_id'];
  echo $id1;
  echo $id2;
 echo $id3;  
  $insertinask=mysqli_query($db,"INSERT INTO give values($id1,$id3,$id2)"); 
    header("location:main.php");
  
			}
};

	


?>
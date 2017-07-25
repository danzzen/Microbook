<?php
 $hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
 $err="";
   session_start();
  $db = mysqli_connect('localhost','root','','webdata');

      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	
	  $db1 = mysqli_connect('localhost','root','','webdata');
	  $db2= mysqli_select_db($db1,"webdata");
      
	  
       
	$sql = "SELECT username FROM user WHERE username = '$myusername' and password = '$mypassword' ";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		   
         $_SESSION['login'] = $myusername;
           
		 
			 header("location: main.php");
		 $err="";
       
		 
      }else {
		  $err="Enter valid details";
        
      }
   
?>
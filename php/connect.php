<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$register=$_POST['register'];
$encrpassword=md5($password);
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
if($register==true){	

	if($fname==TRUE){
        if($lname==true){
		  
			if($username==true){
				
				if($email==true){
					
					if($password==true){
						
						if(strlen($username)<50||strlen($lname)<50||strlen($fname)<50){
							
							if(strlen($password)<50||strlen($password)>5){
								
								$insert=mysqli_query($db,"INSERT INTO user values(null,'$fname','$lname','$username','$email','$password')");
								
							}
							else
								echo "password length must b/w 5 to 50 charactetr";
							
						}
						else
							echo "Max length is 50 words";
						
					}
					else
						echo "please enter password";
					
				}
				else
					echo "please enter email";
			}
			else
				echo "please enter Username";
		}
		else
			echo "please enter last name";
    }
	else
		echo "please enter first name";
};



mysqli_select_db($db,"webdata") or die("Couldn't find database");
?>
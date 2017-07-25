<!Doctype HTML>
<html>
	<head>
		<title>Profile</title>
		<meta charset="utf-8" >
		<link rel="stylesheet" type="text/css" href="../css2/prof2.css" >
		<link rel="stylesheet" type="text/css" href="../css2/mainheader.css" >
	</head>
	
	<body>
		<div id="header1">
			<section>
				<nav id="headernav">
					<ul>
					<li><a>Contact us</a></li>
				
				</ul>
			</nav>
				<form id="form">
					<input type="text" name="search" id="search" placeholder="Search..">
				</form>
			</section>
		</div>
		
		<div id="belowheader">
		<section>
			<div id="img">
				<img src="../images/qa2.png" alt="logo"/>
			</div>
		<nav>
		<ul >
			<li><a href="main.php">Home</a></li> 
			<li><a href="">User</a></li>
		<ul >
			<li><a href="">Profile</a></li>
			<li><a href="">Questions</a></li>
			<li><a href="">Edit Profile</a></li>
		</ul>
			<li><a href="">Question</a></li>
			<li><a href="">Contact us</a></li>

		</ul>
		</nav>
		</section>
		</div>
		<?php session_start();
		$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
mysqli_select_db($db,"webdata") or die ("path gayi");
			 $myusername=  $_SESSION['login'];
			        $sql="SELECT * FROM user WHERE username='$myusername'";
					$result=mysqli_query($db,$sql);
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					?>
	<div id="table">
		<div id="row">
			<div id="info" >
				<div id="proinfo" >
				<img src="../images/profile.png"/>
				</div>
			
			<table id="detail">
				<tr class="det">
				<td id="desc">Name :</td>
					<td  > <?php echo $row['fname']." ".$row['lname']?></td>
				</tr>
				<tr class="det">
				<td id="desc">Username :</td>
					<td  ><?php echo $row['username']?></td>
				</tr>
				<tr class="det">
				<td id="desc">Email-id :</td>
					<td  ><?php echo $row['email']?></td>
				</tr>
			</table>
		</div>
		<div id="qa">
			<div id="q">
			<h2>Question:<h2>
			<div> </div>
			</div>
			<div id="a">
			<h2>Answer:</h2>
			</div>
		</div>
		</div>
	</div>
	</body>

</html>
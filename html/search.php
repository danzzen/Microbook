
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>
Question Me!
</title>
<link href="../css2/mainheader.css" rel='stylesheet' type='text/css'/ >
<link href="../css2/mainquestionbody.css" rel='stylesheet' type='text/css'/ >
<link href="../css2/loadmore.css" rel='stylesheet' type='text/css'/ >
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>
</head>
<body>
<?php 
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
mysqli_select_db($db,"webdata") or die("Couldn't find database"); 
$find=$_POST['search'];

$result=mysqli_query($db,"select qes_title from questions where qes_title like '%$find%'");
$counter=0;

if(!$result)
{
	die('could not get data:'.mysqlerror());
}




?>
<div id="wrapper">
<div id="header1">
	<section>
		<nav id="headernav">
		<ul>
			<li><a>Contact us</a></li>
			<li><a><?php 
			 session_start();
			 $myusername=  $_SESSION['login'];
			        echo $myusername;
			?></a></li>
		</ul>
		</nav>
		<form id="form" METHOD="POST" action="search.php">
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
<li><a href="question.php">Ask Question</a></li>
<li><a href="">User</a>
<ul >
<li><a href="">Profile</a></li>
<li><a href="">Questions</a></li>
<li><a href="">Edit Profile</a></li>
</ul>
			           
</li>
<li><a href="">Question</a></li>
<li><a href="">Contact us</a></li>

</ul>
</nav>
</section>
</div>
<div id="body">
<div id="questionbody">
<h1>Questions:</h1>
<article>
<?php

$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo"); 
while($here=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
 $is=$here['qes_title'];

 $qes_des=mysqli_query($db,"SELECT qes FROM questions where qes_title='$is'");
$row2=mysqli_fetch_array($qes_des,MYSQLI_ASSOC);
 $id2= $row2['qes'];

 $counter++;?>
 <div class="list_item"> <a href='answer.php?title=<?php echo $is?>'><h2><?php echo $is ?></h2></a>	
	<blockquote><p><?php echo $id2?></p><hr/></blockquote><br /></div>
<?php 
}
if($counter==0)
echo "<br>OOPS! No result found";



?>
</article>
</div>
</div>
</div>
</body>
</html>
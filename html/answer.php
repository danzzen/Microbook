<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>
Question Me!
</title>
<link href="../css2/mainheader.css" rel='stylesheet' type='text/css'/ >
<link href="../css2/question.css" rel='stylesheet' type='text/css'/ >
<link href="../css2/answer.css" rel='stylesheet' type='text/css'/ >

<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'/>
	

</head>
<body>
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
			?></a>
			       <a href="logout.php">Sign out</a></li>
		</ul>
		</nav>
		<form id="form" action="search.php" method="POST">
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
<li><a href="question.php"><?php 	$usenameforask=$_SESSION['login'];
?> Ask Question</a></li>
<li><a href="">User</a>
<ul >
<li><a href="">Profile</a></li>
<li><a href="">Questions</a></li>
<li><a href="">Edit Profile</a></li>
</ul>
			           
</li>

<li><a href="">Contact us</a></li>

</ul>
</nav>
</section>
</div>
</div>
<div id="body">
<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
mysqli_select_db($db,"webdata") or die ("path gayi");

$title=$_GET['title'];


$_SESSION['qestitle']=$title;
	$sql = "SELECT qes,qes_id FROM questions WHERE qes_title='$title'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


?>
  <div id="homebody">
	<div id="homebodyrow">
		<div id="col1">
		<div id="container" >
		<div id="ask" >
				<span id="heading"><h2 align="center"><b><?php echo $title;?></b></h2></span>
				
		</div>
	<blockquote><?php echo $row['qes'];?>
<br/><br/>
<hr/>
<h2>Answeres:</h2>	
<?php
$qesid=$row['qes_id'];

$sql1="SELECT ans_id from give where qes_id='$qesid'";
$recieve1=mysqli_query($db,$sql1);
while($row2=mysqli_fetch_array($recieve1,MYSQLI_ASSOC)){
$ansid=$row2['ans_id'];
$sql="SELECT ans FROM answers where ans_id='$ansid'";
$recieve=mysqli_query($db,$sql);

while($row3=mysqli_fetch_array($recieve,MYSQLI_ASSOC))
{   $is=$row3['ans'];
   
	echo "<blockquote><p>{$row3['ans']}</p></blockquote>";
	echo '<button onclick="myfunc2()">Add Comment</button>';
	
	echo '<form  action="comment.php" method="POST"  id="count" style="display:none" class="hide" >
	 <textarea rows="7" cols="25" name="comment" ></textarea><script>
function myfunc2(e) {

   var e = window.event,
       btn = e.target || e.srcElement;
 var selectedobj=btn.id;
var c = selectedobj.childNodes;
  if(c.className=="hide"){  //check if classname is hide 
    c.style.display = "block";
  
   c.className ="show";
  }else{
   c.style.display = "none";
   c.className ="hide";
 }
}
</script>
	<button type="submit" name="enter" value="' . $row3['ans']. '">Comment</button><br/>​ </form>';
	 $sql="SELECT comment from comments where ans_id='$ansid'";

$recieve2=mysqli_query($db,$sql);
while($row1=mysqli_fetch_array($recieve2,MYSQLI_ASSOC))
{  $is1=$row1['comment'];
  
	echo "<blockquote><p>$is1</p></blockquote><hr style='border-top: dotted 1px;'/>";	 
}
echo "<hr />";
}

}

?>
</div>
		</div>
		<div id="col2">
		<div id="col21">
		<h1>Your Answer:</h1>
		<form method="post" action="submitanswer.php"><?php  
			 $usernameForenterquestion =  $_SESSION['login']; ?>
		<textarea name="Answer" cols="50" rows="10"></textarea>
		
	
					<input type="submit" value="Submit" name="submit"  id="submit" class="submit" />
		</form>
		</div>
		<div id="col22">
		<h1>Related Links</h1>
		<ul>
		<li><a href="stackoverflow.com">Stack overflow</a></li>
		<li><a href="">Quora</a></li>
		<li><a href="">Stach Exchange</a></li>
		</ul>
		</div>
	</div>
  </div>
  </div>



</div>

</body>
</html>
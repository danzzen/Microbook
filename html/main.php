
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'ajax_more.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.tutorial_list').append(html);
            }
        }); 
    });
});
</script>
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
			       </li>
		</ul>
		</nav>
		<form id="form" action="search.php" method="POST">
             <input type="text" name="search" id="search" placeholder="Search..">
			 <a href="logout.php">Sign out</a>
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
<li><a href="profile.php">Profile</a></li>
<li><a href="">Questions</a></li>
<li><a href="">Edit Profile</a></li>
</ul>
			           
</li>

<li><a href="">Contact us</a></li>

</ul>
</nav>
</section>
</div>
<div id="body">
<div id="questionbody">
<h1>Questions:</h1>
<div class="tutorial_list">
<?php
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");
$sql="SELECT qes_title,qes,qes_id FROM questions  ORDER BY qes_id DESC LIMIT 4";
mysqli_select_db($db,"webdata") or die ("path gayi");
$recieve=mysqli_query($db,$sql);
$count = mysqli_num_rows($recieve);

while($row=mysqli_fetch_array($recieve,MYSQLI_ASSOC))
{   $is=$row['qes_title'];
$tutorial_id=$row['qes_id'];
?>
	<div class="list_item"> <a href='answer.php?title=<?php echo $is?>'><h2><?php echo $is ?></h2></a>	
	<blockquote><p><?php echo $row['qes']?></p><hr/></blockquote><br /></div>

	
<?php }
?>
<div class="show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
        <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading....</span></span>
    </div>

</div>
</div>
</div>
</div>
<?php include 'footer.php';
?>
</body>
</html>
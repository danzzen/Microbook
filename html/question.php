
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css2/question.css" type="text/css" >
		<link rel="stylesheet" type="text/css" href="../css2/mainheader.css" >
		<script>
		function show_tags(){
		document.getElementById('tags').style.display="block";
		}
		
		function close_tags(){
		document.getElementById('tags').style.display="none";
		}
				
		</script>
	</head>

	<body>
	<div id="besidestag" >
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
		<div id="container" >
			<div id="ask" >
				<span id="heading"><h2><b>Ask Question</b></h2></span>
				<hr>
				<p style="color:white;" >Ask your question here and the people familiar with the answer will help you out</p>
			</div>

		<form method="post"action="enterquestion.php"><?php  
			 $usernameForenterquestion =  $_SESSION['login']; ?>
				<table>	
					<tr id="tr">
						<td id="desc"> Title</td>
						<td id="input"> <textarea style="resize:none; height:2em; " rows="1" cols="90" name="title" placeholder="Enter short description of your question...." maxlength="75"> </textarea></td>
					</tr>

					<tr id="tr">
						<td id="desc"> Description </td>
						<td id="input"> <textarea required style="resize:none; "rows="6" cols="90" name="des" placeholder="Enter your question here..." > </textarea></td>
					</tr>
					<tr> 
						<td id="desc"> Tags </td>
						<td id="inputs" > <textarea id="tagsarea" name="taggs" readonly style="resize:none; height:2em; "rows="1" cols="90" ></textarea>
				</table>
				<br><br>
				<div id="button" >
					<input type="submit" value="Submit" name="submit"  id="submit" class="submit" />
					<input type="button" value="Tags" name="tags" onclick="show_tags()" id="tagsbutton" class="tagsbutton"/>
				</div>
		</form>
		</div>

		<div id="sidebar1">
			<span id="heading" ><h2><b>Stats </h2></b></span><hr>
		</div>
		
		</div>




<!--_____________________________________________________________________________________________________________________________________________________________________________________-->
		  <div id="tags" display="none" >
	  <img src="../images/close.png" id="closetags" onclick="close_tags()"/>
  <a href="#" id="tag" value="CS" onclick="inset_tags(this.id)" >CS<br/></a>
  <a href="#" id="tag" value="Fest" onclick="inset_tags(this.id)">Fest<br/></a>
  <a href="#" id="tag" value="Literature" onclick="inset_tags(this.id)" >Literature<br/></a>
  <a href="#" id="tag" value="C++" onclick="inset_tags(this.id)" >C++<br/></a>
  <a href="#" id="tag" value="Java" onclick="inset_tags(this.id)" >Java<br/></a>
  <a href="#" id="tag" value="Python"onclick="inset_tags(this.id)" >Python<br/></a>
  <a href="#" id="tag" value="Hadoop"onclick="inset_tags(this.id)" >Hadoop<br/></a>
  <a href="#" id="tag" value="MindF**k"onclick="inset_tags(this.id)" >MindF**k<br/></a>
  <a href="#" id="tag" value="Javascript"onclick="inset_tags(this.id)" >Javascript<br/></a>
  <a href="#" id="tag" value="CSS" onclick="inset_tags(this.id)" >CSS<br/></a>
  <a href="#" id="tag" value="PHP" onclick="inset_tags(this.id)" >PHP<br/></a>
  <a href="#" id="tag" value="BootStrap" onclick="inset_tags(this.id)" >BootStrap<br/></a>
  </div>
	</body>
</html>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<link href="../css/signup.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>


 


<div class="main">
	<div class="social-icons">
		 <div class="col_1_of_f span_1_of_f"><a href="#">
		    <ul class='facebook'>
		    	<i class="fb"> </i>
		    	<li>Connect with Facebook</li>
		    	<div class='clear'> </div>
		    </ul>
		    </a>
		 </div>	
		 <div class="col_1_of_f span_1_of_f"><a href="#">
		    <ul class='google'>
		      <i class="gl"> </i>
		      <li>Connect to Google</li>
		      <div class='clear'> </div>
		    </ul>
		    </a>
		</div>
		<div class="clear"> </div>	
      </div>
      <h2>Or Signup with</h2>
		<form method="POST" action="../php/connect.php">
		   <div class="lable">
		        <div class="col_1_of_2 span_1_of_2">	<input type="text" class="text" onfocus="this.value = '';" value="First name" required name="fname" id="active">
				
				</div>
                <div class="col_1_of_2 span_1_of_2"><input type="text" class="text" onfocus="this.value = '';" value="Last name"  name="lname" required >
				
				</div>
                <div class="clear"> </div>
		   </div>
		   <div class="lable-2">
		        <input type="text" class="text" value="username " name="username" onfocus="this.value = '';" required>
			
		        <input type="text" class="text" value="your@email.com " name="email" onfocus="this.value = '';"  required>
				
		        <input type="password" class="text" value="Password " name="password" onfocus="this.value = '';" required>
		   </div>
		   <b><h3 id="termh">By creating an account, you agree to our <span class="term"><a href="index.html" target="_blank">Terms & Conditions</a></span></h3></B>
		   <div class="submit">
			  <input type="submit" onclick="myFunction()" value="Create account" name="register" href="main.html" >
		   </div>
		   <div class="clear"> </div>
		</form>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   		
</body>
</html>
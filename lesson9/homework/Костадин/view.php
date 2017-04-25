<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<button id="buttonLogIn" onclick="logIn()">LOGIN</button>
<button id="buttonSignIn" onclick="signIn()">SIGN IN</button>
<div id="window">
	<form id='form' method="post">
		<div id="header">
			
		</div>
		<div>
			<b>Username:</b><br>
			<input style="text-align: center;" type="text" name="username" placeholder="Username"><br>
			<b>Password:</b><br>
			<input style="text-align: center;" type="Password" name="password" placeholder="Password"><br>
			<b>Submit:</b><br>
			<input type="submit" name="Submit">
		</div>
	</form>
</div>
    
<div id="windowSign">
	<form id='form' method="post">
		<div id="header">
			
		</div>
		<div>
			<b>Username:</b><br>
			<input style="text-align: center;" type="text" name="usernameSign" placeholder="Username"><br>
			<b>Password:</b><br>
			<input style="text-align: center;" type="Password" name="passwordSign" placeholder="Password"><br>
			<b>Submit:</b><br>
			<input type="submit" name="Submit">
		</div>
	</form>
</div>

<footer class="footer">Footer</footer>
<script>
function logIn()
{
	document.getElementById('window').style.display='block';
}

function signIn()
{
	document.getElementById('windowSign').style.display='block';
}

var modal = document.getElementById('window');
var modalSign = document.getElementById('windowSign');

window.onclick = function(event) {
    if (event.target == modal || event.target == modalSign) {
        modal.style.display = "none";
        modalSign.style.display = "none";
    }
}

</script>

</body>
</html>
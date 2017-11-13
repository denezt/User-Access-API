<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Confirmation</title>
		<script src="check.js" defer></script>
		<style rel="stylesheet">
			.container{
				border: 1px solid gray;
				background: lightgray;
			}
			.userinfo {
				padding:5%;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<form id="userinfo" class="userinfo" method="post" action="usernamecheck.php">
				<fieldset>
					<legend>User Access API</legend>
         				<label for="username">Username</label>
         				<!-- input id="username" name="username" pattern="^[a-z0-9]{4,20}$" -->
         				<input id="username" name="username">
					<p>The Username must have lowercase or digits (0-9) and 4-20 symbols long.</p>
         				<!-- button>Submit</button -->
					<input type="submit">
				</fieldset>
      			</form>
		</div>
		<div id="msg-block">
			<p id="msg_status"></p>
		</div>
	</body>
</html>


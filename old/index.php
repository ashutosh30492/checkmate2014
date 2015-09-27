<html>
<head>
	<title>Checkmate 2014</title>
  	<link rel="stylesheet" type="text/css" media="screen" href="css/special.css" />
  	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
</head>
<body>
<div>


		
			
			<form class="form-signin" >
			<!--<h2 class="form-signin-heading">Please sign in</h2>
			<input type="text" class="input-block-level" placeholder="Email address" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
        <input type="password" class="input-block-level" placeholder="Password"name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-large btn-primary" type="submit" value="Sign In" />-->
			<h2 class="form-signin-heading">Please sign in</h2>
				<input type="text" style="width: 200px; height: 30px;" placeholder="Username" id="team_name" maxlength="30" value="" /></td>
				
				
					
					<input type="password" style="width: 200px; height: 30px;" placeholder="Password" id="pass" maxlength="30" value="" /></td>
				
				<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
				<input type="submit" class="btn btn-large btn-primary sub" value="Login" />
				
			
			</form>
			<center>
				<h3>If not Registered,</h3><br />
				<a href="register.php">
				<div class="btn btn-primary reg">
					Register Here
				</div></a>
			</center>
			
		<script type="text/javascript">
			$('.sub').click(function(e){
				e.preventDefault();
				var username = $('#team_name').val();
				var pass = $('#pass').val();
				// alert(username+" "+pass);
				$.ajax({
					url : 'login.php',
					method : 'GET',
					data : ({ team_name:username,pass:pass }),
					datatype: 'json',
					success: function(data){
						var dparse = $.parseJSON(data)
						if((dparse.user_id)===null){
							alert("invalid user")
							$(location).attr('href', 'index.php');
						}
						else {
							$(location).attr('href', 'game.php');
						
						}
						

					}
				})

			});

		</script>
</div>
</body>
</html>
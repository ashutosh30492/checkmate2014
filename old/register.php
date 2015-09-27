<html>
<head>
	<title>Checkmate 2014</title>
  	<link rel="stylesheet" type="text/css" media="screen" href="css/special.css" />
  	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
</head>
<body>
<div>


		
			
			<form class="form-signin" action="" method="POST">
			
			<h2 class="form-signin-heading">Register here</h2>
				Team Name:<input type="text" style="width: 200px; height: 30px;" placeholder="Team Name" id="team_name" maxlength="30" value="" /></td><br />
				Name 1:<input type="text" style="width: 200px; height: 30px;" placeholder="Name1" id="name1" maxlength="30" value="" /></td><br />
				Name 2:<input type="text" style="width: 200px; height: 30px;" placeholder="Name2" id="name2" maxlength="30" value="" /></td><br />
				e-mail 1:<input type="text" style="width: 200px; height: 30px;" placeholder="e-mail1" id="email1" maxlength="30" value="" /></td><br />
				e-mail 2:<input type="text" style="width: 200px; height: 30px;" placeholder="e-mail2" id="email2" maxlength="30" value="" /></td><br />
				Phone 1:<input type="text" style="width: 200px; height: 30px;" placeholder="Phone1" id="phone1" maxlength="30" value="" /></td><br />
				Phone 2:<input type="text" style="width: 200px; height: 30px;" placeholder="Phone2" id="phone2" maxlength="30" value="" /></td><br />
				Password:<input type="password" style="width: 200px; height: 30px;" placeholder="Password" id="pass" maxlength="30" value="" /></td><br />
				Confirm Password:<input type="password" style="width: 200px; height: 30px;" placeholder="Confirm Password" id="pass" maxlength="30" value="" /></td>
				
				<input type="submit" class="btn btn-large btn-primary sub" value="Register" />
				
			
			</form>

			
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
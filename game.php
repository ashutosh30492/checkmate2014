<!DOCTYPE html>

<?php

$i=session_start();
if(!$i)
	echo 'error in session contact admin'.'<br/>';
?>

<?php
require_once 'connect.php';
require_once 'input_verification.php';
connect();
?>

<?php
	if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
		redirect_to('./index.php?q=3');
	}

?>

<html>
<head>
	<title> Checkmate 2014</title>
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src = "js/gamefetch.js"></script>
</head>
<body>

	<div class="row" style="margin-right: 15px; margin-left: 30px;">
		<div class="col-md-10">
			<div class="header">
				
				<div class="row">
					<div class="col-md-2"><img src="images/logo.png" width="50%" height="60px" /></div>
					<div class="col-md-10"><img src="images/cm2.png" width="100%" height="60px" /></div>
				</div>
				<!-- <img src="images/cm2.png" width="100%" /> -->
			</div>		
		</div>
		<div class="col-md-2">
			<div class="stat"></div>		
		</div>

		
	</div>
	
	<div class="row navbar">
		<div class="col-md-5 navbar-left">
			<!-- <h4>Hi Abhinav!! Enjoy Checkmate</h4> -->
		</div>
		<div class="col-md-3 nav-menu" id="score">
			<!-- <h4>Your Score: 0 :P</h4> -->
		</div>
		<div class="col-md-2 nav-menu" id="rulebook">
			<h4><a href="Checkmate2014rulebook.pdf" target="_blank">Rulebook</a></h4>
		</div>
		<div class="col-md-2 nav-menu" id="logout">
			<h4><a href="logout.php" style="color: #fff;text-decoration: none;">Logout</a></h4>
		</div>
	</div>
	
	<div class="row contain">
		<div class="col-md-7 cont">
			<div class="q_content">
				<center>
					<b>
						<h3>
							Steps to be followed:-
						</h3>
					</b>
				</center>
				<br />
				<ul>
					<li>
						<b>
							<h4>
								Select a Question tile.			
							</h4>
						</b>						
					</li>
					<li>
						<b>
							<h4>
								Bid on the Question based on the data given on the tile.			
							</h4>
						</b>
					</li>
					<li>
						<b>
							<h4>
								Then, you get to see the question.			
							</h4>
						</b>
					</li>
				</ul>
			</div>
			<div class="ans">
				<!-- <form role="form">
				  <div class="form-group">
				    <label for="answer">Answer:</label>
				    <input type="text" class="form-control" id="ansval" placeholder="Enter Your Answer">
				  </div>
				
				</form> -->
				<form role="form">
				  <div class="form-group">
				    <label for="answer">Answer:</label>
				    <div class="row">
				    	<div class="col-sm-8">
					      <input type="text" class="form-control" id="ansval" placeholder="Enter Answer" disabled="true">
					    </div>
					    <div class="col-md-2">
					    	<input type="submit" class="btn btn-primary" id="ans_submit" />
					    </div>
					    <div class="col-sm-1 col-md-1 col-xs-1 tick" style="padding-top: 6px; margin-right: -15px;">
					    	<!-- <span class="glyphicon glyphicon-ok form-control-feedback"></span> -->
					    </div>	
				    </div>
				    
				  </div>
				</form>

			</div>

		</div>
		<div class="col-md-1 bid">
			<input type="radio" id="rd1" name="xbid" disabled="true">&nbsp;2 X</input><br /><br />
			<input type="radio" id="rd2" name="xbid" disabled="true">&nbsp;3 X</input><br /><br />
			<input type="radio" id="rd3" name="xbid" disabled="true">&nbsp;4 X</input><br /><br />
			<input type="radio" id="rd4" name="xbid" disabled="true">&nbsp;5 X</input><br /><br />
			
			<input type="button" class="btn btn-primary" id="bid_submit" value="Bid">
		</div>
		<div class="col-md-3 question">
		<?php
			$a = 1;
			for($a=1;$a<=40;$a++) {
				echo "<div class='q_tile q qn".$a."' id='".$a."'><br /><center><h3>Q. ".$a."</h3></center><div class='row'><div class='col-md-6'><center><h4>14 slots left</h4></center></div><div class='col-md-6'><center><h4>14% suceeded</h4></center></div></div></div>";
			}
			
		?>
		</div>

	</div>
	<div class="footer">
		<p>&copy; Copyright BITS ACM</p>
	</div>
	<script type="text/javascript">
		
	</script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/basejs.js"></script>
</body>
</html>
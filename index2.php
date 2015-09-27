<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <title>The BITS Alchemist</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <!--<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>-->
		
  	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
               <!-- <span> <font style="algerian"><span>The BITSian Alchemist</span></font></span> -->
               <br />
               <div class="row">
                   <div class="col-md-2"><img src="images/logo.png" width="50%" height=""></div>
                   <div class="col-md-9"><img src="images/cm.png" width="100%"></div>
                   <!-- <div class="col-md-3"><img src="images/gdg.png" width="100%"></div> -->
               </div> 
               <br />
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <!-- <form  action="php/login.php" autocomplete="on" method="get">  -->
                            <form autocomplete="on">
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="Username" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="Password" required="required" type="password" placeholder="eg. X8df!90EO"  /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" class="sub" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register reg">Join us</a>
								</p>
                            </form>
                        </div>
                        <div id="register" class="animate form " >
                            <form  action="reg_submit.php" autocomplete="on" method="get"> 
                                <h1> Sign up </h1>
                                <div class="row" style="margin-left: 0px;">
                                    <div class="col-md-6">     
                                        <p> 
                                            <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                            <input id="usernamesignup" name="team_name" required="required" type="text" placeholder="mysuperusername690" />
                                        </p>
                                        <p> 
                                            <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                            <input id="passwordsignup" name="pass" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                        </p>
                                        <p> 
                                            <label for="usernamesignup" class="uname" data-icon="u">Member 1</label>
                                            <input id="member1" name="name1" required="required" type="text" placeholder="mysupername" />
                                        </p>
                                        <p> 
                                            <label for="usernamesignup" class="uname" data-icon="u">Phone no. Member 1</label>
                                            <input id="phone1" name="phone1" required="required" type="text" placeholder="9999999999" />
                                        </p>  
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <p> 
                                            <label for="emailsignup" class="youmail" data-icon="e" >Email Member 1</label>
                                            <input id="email1" name="email1" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                        </p>
                                        <p> 
                                            <label for="usernamesignup" class="uname" data-icon="u">Member 2</label>
                                            <input id="member2" name="name2" type="text" placeholder="mysupername" />
                                        </p>
                                        <p> 
                                            <label for="usernamesignup" class="uname" data-icon="u">Phone no. Member 2</label>
                                            <input id="phone2" name="phone2" type="text" placeholder="9999999999" />
                                        </p>
                                        <p> 
                                            <label for="emailsignup" class="youmail" data-icon="e" >Email Member 2</label>
                                            <input id="email2" name="email2" type="email" placeholder="mysupermail@mail.com"/> 
                                        </p>
                                        
                                        <p class="signin button"> 
                                            <input type="submit" value="Sign up"/> 
                                        </p>
                                        <p class="change_link">  
                                            Already a member ?
                                            <a href="#tologin" class="to_register log"> Go and log in </a>
                                        </p>  
                                         
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <div>
                <img class="apogee_f" src="images/apogee-footer.png" width="100%">
            </div>  
            </section>
           
        </div>
        <script type="text/javascript">
            $('.to_register').click(function(){
                $('#wrapper').css('min-width','1100px');
                $('.apogee_f').css('display','none');
            });
            $('.log').click(function(){
                $('#wrapper').css('min-width','0px');
                $('.apogee_f').css('display','block');
            });
            </script>
            <script type="text/javascript">
            $('.sub').click(function(e){
                e.preventDefault();
                var username = $('#username').val();
                var pass = $('#password').val();
                
                $.ajax({
                    url : 'login.php',
                    method : 'GET',
                    data : ({ team_name:username,pass:pass }),
                    datatype: 'json',
                    success: function(data){
                        var dparse = $.parseJSON(data);
                        // alert(dparse);
                        if(dparse==2){
                            alert("invalid user")
                            $(location).attr('href', 'index.php');
                        }
                        if(dparse==1){
                            $(location).attr('href', 'game.php');
                        
                        }
                        if(dparse==5){
                            alert("input is not in the proper format.Re-enter the values");
                        }
                        

                    }
                })

            });

        </script>
        </script>
    </body>
	
</html>
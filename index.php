<?php include ('head.php');?>
<body>
    <div class="container">
        <div class="row">
		
		<center><h3>CESA Voting Sytem</h3></center>
        <center> <img src="./images/logo.jpg" alt="Logo" width="150px" style="border-radius: 15px;margin-bottom:-10px;"/></center>
            <div class="col-md-4 col-md-offset-4">			
                <div class="login-panel panel panel-default">
				
                    <div class="panel-heading">
                        <center><h3 class="panel-title"> Log In</h3></center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method = "post" enctype = "multipart/form-data">
                            <fieldset>
							
                                <div class="form-group">
									<label for = "username" >Matricule</label>
										<input class="form-control" placeholder="Please Enter Voter's ID Number" name="idno" type="text" required = "required" autofocus>
                                </div>
								
                                <div class="form-group">
									<label for = "username" >Mot de Passe</label>
										<input class="form-control" placeholder="Password" name="password" type="password" required = "required">
                                </div>
                             
                              
                                <button class="btn btn-lg btn-success btn-block " name = "login">Login</a>
								
								
                            </fieldset>
							
									<?php include ('login_query.php');?>
                        </form>
                        <h4><b>Note:</b> <i>One voter can only vote one time!!</i> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <?php include ('script.php');?>

</body>

</html>

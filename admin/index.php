<?php
 include "inc/header.php";

if (!file_exists('../inc/config/db.inc.config.php'))
 {
      header("location:../install/start.php");
      exit();
}
?>
<?php

// Check if the user is already logged in, if yes then redirect him to MYPROFILE page
if(isset($_SESSION["admin"])){
   header("location: dashboard.php");
   exit();
}else
{
?>

  <body style="background-image: url('../img/admin/bg1.jpg');">
    <div class="container-fluid"> 

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">   
                       
            
            <div class="panel panel-info" >
               
                    <div class="panel-heading">
                        <div class="panel-title">Adminstrator login</div>
                       
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                        <form id="login_submit" class="form-horizontal" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="username" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password"  placeholder="password">
                                    </div>

                                  
                         <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                        <select class="form-control"  name="password_encryption" id="password_encryption">

                                                <option  value="TXT">TXT</option>   
                                                <option  value="MD5">MD5</option>
                                                <option  value="AES">AES</option>
                                                
                                      </select>


                                    </div>
                                    


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                     
                                    <div class="col-sm-12 controls">
									  <p id="login_response"  class="pull-left"></p> 
                                      <button id="login_btn"  class="btn btn-success pull-right">Login</button>
                                      

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
											
                                         	Developed by
											<a href="http://navbro.online" target="_blank">
												 ( Navbro
											</a>|
											 <a href="mailto:web.dev.nav@gmail.com">
												 Mail )
											</a>
											
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script type="text/javascript" src="inc/extra/login.js"></script>
    </body>
    <?php
}?>

	<p id="msg-display"></p>
	<p id="timer-msg-display"></p>
	<p id="smtp-msg-display"></p>

	

<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		              <div class="row">
		                <div class="col-md-12">
		                    <h2><strong><i class="fas fa-user" ></i> Update username & password</strong></h2>
		                    <hr>
		                </div>
		            </div>
					<br/><br/>
					
					<?php
					   $sql="SELECT username,password from admin_login";
					   $dquery=$conn->query($sql);
                       $row=$dquery->fetch_array();
					?>
					
		            <div class="row">
		                <div class="col-md-12 col-md-offset-2">
		                    <form id="up_user_pass_form" method="post">
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Username</label> 
                                <div class="col-md-12">
                                  
								<input id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>"  class="form-control here" required="required" type="text">
									
									<small>By updating this field you can use it as for login.</small>
                                </div>
                              </div>
                          
                             
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                <div class="col-md-12">
                                  <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="text">
									
                                </div>
                              </div> 
								
						  
								
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="update" type="submit" class="btn btn-primary pull-right"><i class="fas fa-pen-square"></i> Update</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
					
					
				 <br/><br/>
					 
					
		            
		        </div>
		    </div>
		</div>

<div class="col-md-9">

	<?php
					  $stmt = $conn->prepare("SELECT mins,secs FROM admin_login");
                        $stmt->execute();
                        $stmt->store_result(); 
                        $stmt->bind_result($mins,$secs);   
		                   $stmt->fetch();
		                   $arr = array('mins' =>$mins,'secs' =>$secs);
						 $stmt->close();
					?>
		    <div class="card">
		        <div class="card-body">
		              <div class="row">
		                <div class="col-md-12">
		                    <h2><strong><i class="fas fa-user-clock" ></i> Order delay</strong></h2>
		                    <hr>
		                </div><br/><br/>
		                  <div class="col-md-6">
		                    <strong>Currently delay applied: <?php if(isset($arr['mins'],$arr['secs'])){ echo $arr['mins'].'mins'.':'.$arr['secs'].'secs';} ?></strong>  
		                    
		                </div>
		            </div>
					<br/><br/>

		            <div class="row">
		                <div class="col-md-12 col-md-offset-2">
		                    <form  method="post">
                              <div class=" row">
                              
                                <div class="col-md-6">
                                    <label for="minutes" >Min</label> 
								<select id="minutes" name="minutes" class="form-control here" required="required">
									<?php for($i=0;$i<=59;$i++)
											{
												?>

												<option value="<?php echo $i; ?>" <?php if($arr['mins'] == $i){ echo "selected";} ?> ><?php echo $i; ?></option>
										<?php		
											}

									?>
									
								</select>
									<small>By updating this field users will face order delay in Min.</small>
                                </div>

                                 <div class="col-md-6">
                                    <label for="seconds" >Sec</label> 
								<select id="seconds" name="seconds" class="form-control here" required="required">
									<?php for($j=0;$j<=59;$j++)
											{
												?>

												<option value="<?php echo $j; ?>"  <?php if($arr['secs'] == $j){ echo "selected";} ?>  ><?php echo $j; ?></option>
										<?php		
											}

									?>
									
								</select>
									<small>By updating this field users will face order delay in Sec.</small>
                                </div>




                              </div>	
						  
								
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button type="submit" id="update_timer"  class="btn btn-primary pull-right"><i class="fas fa-pen-square"></i> Update</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
					
					
				 <br/><br/>
					 
					
		            
		        </div>
		    </div>
		</div>


		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		              <div class="row">
		                <div class="col-md-12">
		                    <h2><strong><i class="fas fa-envelope-open-text" ></i> Email Settings for Smtp</strong></h2>
		                    <hr>
		                </div>
		            </div>
					<br/><br/>
					
					<?php
					   $sql="SELECT * from mailing";
					   $dquery=$conn->query($sql);
                       $row=$dquery->fetch_array();
					?>
					
		            <div class="row">
		                <div class="col-md-12 col-md-offset-2">
		                    <form id="up_user_pass_form" method="post">


  							<div class="form-group row">
  								 <div class="col-md-12">
	                                  <label for="username" class="col-4 col-form-label">Email activation</label> </br>
										<!--https://www.bootstraptoggle.com/-->	
										<input type="checkbox"  <?php if(isset($row['status']) && $row['status']=='ON'){ echo 'checked'; }else{ echo '';}?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger"  id="h_activate" name="h_activate" >
										<p id="just"></p>
	                                </div>
  							</div>


                              <div class="form-group row">

	                                <div class="col-md-12">
	                                  <label for="username" class="col-4 col-form-label">Host</label> 
											<input id="host" name="host" placeholder="Domain.com" value="<?php echo $row['host']; ?>" class="form-control here" required="required" type="text">
										
										<small>Enter your mailing smtp domain host.</small>
	                                </div>

	                                

                              </div>


                               <div class="form-group row">

	                               
	                                <div class="col-md-6">
	                                  <label for="username" class="col-4 col-form-label">Username</label> 
											<input id="h_username" name="h_username" placeholder="Username" value="<?php echo $row['user_name']; ?>" class="form-control here" required="required" type="text">
										
										<small>Enter your email username.</small>
	                                </div>

	                                  <div class="col-md-6">
	                                  <label for="username" class="col-4 col-form-label">Password</label> 
											<input id="h_pass" name="h_pass" placeholder="Password" value="<?php echo $row['pass_word']; ?>" class="form-control here" required="required" type="password">
										
										<small>Enter your email password.</small>
	                                </div>

                              </div>
                          
                             <div class="form-group row">

	                                <div class="col-md-6">
	                                  <label for="username" class="col-4 col-form-label">Mail sending from</label> 
											<input id="s_mail" name="s_mail" placeholder="email@domain.com" value="<?php echo $row['setFrom']; ?>" class="form-control here" required="required" type="text">
										
										<small>Enter your email from which mail will be send.</small>
	                                </div>

	                               <div class="col-md-6">
	                                  <label for="username" class="col-4 col-form-label">Mail receving on</label> 
											<input id="r_mail" name="r_mail" placeholder="email@domain.com" value="<?php echo $row['addAddress']; ?>" class="form-control here" required="required" type="text">
										
										<small>Enter your email where you can receive email notifications.</small>
	                                </div>

                              </div>

								
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button  type="submit" id="update_smtp" class="btn btn-primary pull-right"><i class="fas fa-pen-square"></i> Update</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
					
					
				 <br/><br/>
					 
					
		            
		        </div>
		    </div>
		</div>
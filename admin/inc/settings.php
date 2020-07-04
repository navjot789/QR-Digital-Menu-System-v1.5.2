<p id="msg-display"></p>

<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		              <div class="row">
		                <div class="col-md-12">
		                    <h2>Update username & password</h2>
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
                                <div class="col-8">
                                  
								<input id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>" 		                                  class="form-control here" required="required" type="text">
									
									<small>By updating this field you can use it as for login.</small>
                                </div>
                              </div>
                          
                             
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                <div class="col-8">
                                  <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="text">
									
                                </div>
                              </div> 
								
						  
								
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="update"type="submit" class="btn btn-primary pull-right"><i class="fas fa-pen-square"></i> Update</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
					
					
				 <br/><br/>
					 
					
		            
		        </div>
		    </div>
		</div>
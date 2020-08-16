<!-- Edit Product -->
<div class="modal fade" id="editproduct<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit product</h4></center>
            </div>
			
			
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="inc/curd/editproduct.php?product=<?php echo $row['productid']; ?>" enctype="multipart/form-data">
                    
                     <div class="row" style="margin-top:10px;">
                            <div class="form-group" >
                            <div class="col-md-12">
								<label class="control-label">Item:</label>
                                <input type="text" class="form-control" value="<?php echo $row['productname']; ?>" name="pname" required>
                            </div>
                        </div>
                    </div>
						
                
                        <div class="row" style="margin-top:10px;">
                               <div class="form-group">
								<div class="col-md-12">
									<label class="control-label">Category:</label>
									<select class="form-control" name="category">
										<option value="<?php echo $row['categoryid']; ?>"><?php echo $row['catname']; ?></option>
										<?php
											$sql="select * from category where categoryid != '".$row['categoryid']."'";
											$cquery=$conn->query($sql);

											while($crow=$cquery->fetch_array()){
												?>
												<option value="<?php echo $crow['categoryid']; ?>"><?php echo $crow['catname']; ?></option>
												<?php
											}
										?>
									</select>
								</div>
							
                        </div>
                    </div>
                     <!--<div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Old price:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['old_price']; ?>" name="old_price" required>
                            </div>
                        </div>
                    </div>-->


                        <div class="row" style="margin-top:10px;"> 
							<div class="form-group">
                            
                            <div class="col-md-12">
								<label class="control-label">Price:</label>
                                <input type="text" class="form-control" value="<?php echo $row['price']; ?>" name="price" required>
                            </div>
                        </div>
                    </div>
						
                   
                        <div class="row" style="margin-top:10px;">
							<div class="form-group">
                            
                            <div class="col-md-12"> 
								<label class="control-label">Photo:</label>
                                <input type="file" name="photo">
                            </div>
                        </div>
                    </div>

                   
                        <div class="row" style="margin-top:10px;">
							<div class="form-group">
                           
                            <div class="col-md-12">
								<label class="control-label">Desc:</label>
                            <textarea class = "form-control" rows = "3" cols = "50" placeholder = "Description" name="desc" ><?php echo $row['description']; ?></textarea>
                             </div>
                            </div>
                        </div>

                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Product -->
<div class="modal fade" id="deleteproduct<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete product</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['productname']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                <a href="inc/curd/delete_product.php?product=<?php echo $row['productid']; ?>&pic=<?php echo $row['photo']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Confirm</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
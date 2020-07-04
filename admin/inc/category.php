
<div class="row">
		<div class="col-md-12">
			<a href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</a>
		</div>
	</div>
									<div class="table-responsive" style="margin-top:10px;">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
												<th>Category Name</th>
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$sql="select * from category order by categoryid asc";
													$query=$conn->query($sql);
													while($row=$query->fetch_array()){
														?>
														<tr>
															<td><?php echo $row['catname']; ?></td>
															<td>
																<a href="#editcategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a> || <a href="#deletecategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
																<?php include('inc/category_modal.php'); ?>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
											<tfoot>
												<tr>
												<th>Category Name</th>
												<th>Action</th>
												</tr>
											</tfoot>
										</table>
										
										
										
									</div>




		
	
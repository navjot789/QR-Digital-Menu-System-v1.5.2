
									<div class="row">
										<div class="col-md-12">
											<select id="catList" class="btn btn-default">
											<option value="0">All Category</option>
											<?php
												$sql="select * from category";
												$catquery=$conn->query($sql);
												while($catrow=$catquery->fetch_array()){
													$catid = isset($_GET['category']) ? $_GET['category'] : 0;
													$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
													echo "<option $selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
												}
											?>
											</select>
											<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</a>
										</div>
									</div>
									<div class="table-responsive" style="margin-top:10px;">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
												<th>Photo</th>
												<th>Item</th>
												<th>Description</th>
												<th>Price</th>
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
													$where = "";
													if(isset($_GET['category']))
													{
														$catid=$_GET['category'];
														$where = " WHERE product.categoryid = $catid";
													}
													$sql="select * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, productname asc";
													$query=$conn->query($sql);
													while($row=$query->fetch_array()){
														?>
														<tr>
															<td><a href="<?php if(empty($row['photo']))
																				 {echo "../upload/noimage.jpg";}
																				 else{ echo "../upload/".$row['photo']; } ?>">

																	<img src="<?php if(empty($row['photo']))
																					{echo "../upload/noimage.jpg";}
																					 else{echo "../upload/".$row['photo'];} ?>" height="30px" width="40px">
																</a></td>

															<td><?php echo $row['productname']; ?></td>
															<td><?php 

																	// strip tags to avoid breaking any html
																	$string = strip_tags($row['description']);
																	if (strlen($string) > 50) {

																	    // truncate string
																	    $stringCut = substr($string, 0, 50);
																	    $endPoint = strrpos($stringCut, ' ');

																	    //if the string doesn't contain any space then it will cut without word basis.
																	    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
																	    $string .= '...';
																	}
																	echo $string;

															 ?></td>
															
															<td>&euro; <?php echo number_format($row['price'], 2); ?></td>
															<td style="min-width: 100px;">
															  <a href="#editproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a> || <a href="#deleteproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
																<?php include('inc/product_modal.php'); ?>
																
															</td>
														</tr>
														<?php
													}
												?>

											</tbody>
											<tfoot>
												<tr>
												<th>Photo</th>
												<th>Item</th>
												<th>Description</th>
												<th>Price</th>
												<th>Action</th>
												</tr>
											</tfoot>
										</table>
										
										
										
									</div>

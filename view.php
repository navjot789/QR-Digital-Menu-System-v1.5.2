<?php include('inc/header.php'); ?>
<body>
<?php include('inc/navbar.php'); ?>
<style type="text/css">
		
		.product{
			border: 1px solid #dddddd;
			height: 321px;
		}

		.product>img{
			max-width: 230px;
		}

		.product-rating{
			font-size: 20px;
			margin-bottom: 25px;
		}

		.product-title{
			font-size: 20px;
		}

		.product-desc{
			font-size: 14px;
		}

		.product-price{
			font-size: 22px;
		}

		.product-stock{
			color: #74DF00;
			font-size: 20px;
			margin-top: 10px;
		}

		.product-info{
				margin-top: 50px;
		}

		/*********************************************
							VIEW
		*********************************************/

		.content-wrapper {
			max-width: 1140px;
			background: #fff;
			margin: 0 auto;
			margin-top: 25px;
			margin-bottom: 10px;
			border: 0px;
			border-radius: 0px;
		}

		.container-fluid{
			max-width: 1140px;
			margin: 0 auto;
		}

		.view-wrapper {
			float: right;
			max-width: 70%;
			margin-top: 25px;
		}

		.container {
			padding-left: 0px;
			padding-right: 0px;
			max-width: 100%;
		}

		/*********************************************
						ITEM 
		*********************************************/

		.service1-items {
			padding: 0px 0 0px 0;
			float: left;
			position: relative;
			overflow: hidden;
			max-width: 100%;
			height: 321px;
			width: 130px;
		}

		.service1-item {
			height: 107px;
			width: 120px;
			display: block;
			float: left;
			position: relative;
			padding-right: 20px;
			border-right: 1px solid #DDD;
			border-top: 1px solid #DDD;
			border-bottom: 1px solid #DDD;
		}

		.service1-item > img {
			max-height: 110px;
			max-width: 110px;
			opacity: 0.6;
			transition: all .2s ease-in;
			-o-transition: all .2s ease-in;
			-moz-transition: all .2s ease-in;
			-webkit-transition: all .2s ease-in;
		}

		.service1-item > img:hover {
			cursor: pointer;
			opacity: 1;
		}

		.service-image-left {
			padding-right: 50px;
		}

		.service-image-right {
			padding-left: 50px;
		}

		.service-image-left > center > img,.service-image-right > center > img{
			max-height: 155px;
		}
</style>

<?php 
if(!empty($_GET['p_id']))
  {

 ?>

<div class="container-fluid">

	<!---cart item here------->	
	<?php include('inc/cart_display.php'); ?>
	<!---cart item here------->	

		<div class="row">
					<div class="col-md-12">
						<a href="index.php" class="btn btn-default"><i class="fas fa-arrow-circle-left" ></i> Back to home</a>
					</div>
				</div>

    <div class="content-wrapper">	
		<div class="item-container" >	
			<div class="container">	

			

				<div class="col-md-4" style="margin-top: 20px;">

					<?php

						$sql="select * from product where productid='".$_GET['p_id']."'";
						$query=$conn->query($sql);
						$row=$query->fetch_array();

						?>
					<div class=" col-md-12">
                   
						<?php if(empty($row['photo']))
							{
						?>
						<center>
							<img id="item-display" class= "product img-responsive img-thumbnail" src=" https://denieuwehoreca.nl/smaak/upload/noimage.jpg"  alt="">
						</center>
						
						<?php }else{?>
						<center>
							<img id="item-display" class= "product img-responsive img-thumbnail" src="<?php echo 'upload/'.$row['photo'];?>"  alt="">
						</center>
						<?php }?>
						
					</div>
				
				</div>
			
				<div class="col-md-6 " style="margin-top: 20px;">
					<p class="product-title"><h2 class="text-muted"><?php echo $row['productname'];?></h2></p>
					<?php
						$sql="select * from category where categoryid='".$row['categoryid']."'";
						$query=$conn->query($sql);
						$crow=$query->fetch_array();

						?>
					<small class="product-desc"><?php echo $crow['catname'];?></small>
					
					<hr>
					

					<div class="row">
						 <div class="col-md-4 col-xs-6">	<div class="product-price">Price: &euro; <?php echo number_format($row['price'], 2)?></div></div>
                       			 <div class="col-md-4 col-xs-6">
                                     

										    <div class="input-group">
										        <span class="input-group-btn">
										        	<button class="btn btn-default value-control" data-action="minus" data-target="quantity<?php echo $row["productid"];?>">
										        		<span class="glyphicon glyphicon-minus"></span>
										        	</button>
										        </span>
										        <input type="text" value="1" class="form-control" name="quantity" id="quantity<?php echo $row["productid"];?>">

										        <span class="input-group-btn">
													<button class="btn btn-default value-control" data-action="plus" data-target="quantity<?php echo $row["productid"];?>">
										        	<span class="glyphicon glyphicon-plus"></span>
										        </button>
										    	</span>

										    </div>
										
			                        </div>
						</div>

					<!--hidden values -->	
				    <input type="hidden" name="hidden_name" id="name<?php echo $row["productid"];?>" value="<?php echo $row["productname"];?>" />
					<input type="hidden" name="hidden_price" id="price<?php echo $row["productid"];?>" value="<?php echo $row["price"];?>" />

					<hr>
					<div class="btn-group cart">
						<button type="button" class="btn btn-success add_to_cart"  name="add_to_cart" id="<?php echo $row['productid'];?>">
							<span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</button>
						
					</div>

				
				</div>
			</div> 
		</div>

		<div class="container-fluid">		
			<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">Description</a></li>
						
						<!--<li><a href="#service-three" data-toggle="tab">REVIEWS <span class="label label-info">78</span></a></li>-->
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
								<?php 
	
									if(empty($row["description"]))
									{
										echo '<div class="alert alert-info">
											  <strong>404!</strong> No description found about this product.
											</div>';
									}
									else
									{
										
										echo '<div class="container">
									
												  <blockquote>
													<p>'.$row["description"].'</p>
												  </blockquote>
											</div>';
									}
								?>
							</section>
										  
						</div>
				
					<!--<div class="tab-pane fade" id="service-three">
							
								<div class="container-fluid">
								    <div class="row">


	   								 <div class="panel panel-default widget">
									            <div class="panel-heading">
								               
								               <form>
											      <div class="form-group">
											        <label for="comment">Your Comment</label>
											        <textarea name="comment" class="form-control" rows="3"></textarea>
											      </div>
											      <button type="submit" class="btn btn-default">Send</button>
											    </form>
								                
								            </div>
								        </div>



								        <div class="panel panel-default widget">
								            <div class="panel-heading">
								               
								                <h3 class="panel-title"> <span class="glyphicon glyphicon-comment"></span> Recent Comments <span class="label label-info">78</span></h3>
								                
								            </div>
								            
								            <div class="panel-body">
								                <ul class="list-group">
								                    <li class="list-group-item">
								                        <div class="row">
								                            <div class="col-xs-2 col-md-1">
								                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
								                            <div class="col-xs-10 col-md-11">
								                                <div>
								                                    <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
								                                        Google Style Login Page Design Using Bootstrap</a>
								                                    <div class="mic-info">
								                                        By: <a href="#">Bhaumik Patel</a> on 2 Aug 2013
								                                    </div>
								                                </div>
								                                <div class="comment-text">
								                                    Awesome design
								                                </div>
								                                <div class="action">
								                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
								                                        <span class="glyphicon glyphicon-pencil"></span>
								                                    </button>
								                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
								                                        <span class="glyphicon glyphicon-ok"></span>
								                                    </button>
								                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
								                                        <span class="glyphicon glyphicon-trash"></span>
								                                    </button>
								                                </div>
								                            </div>
								                        </div>
								                    </li>
								                    <li class="list-group-item">
								                        <div class="row">
								                            <div class="col-xs-2 col-md-1">
								                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
								                            <div class="col-xs-10 col-md-11">
								                                <div>
								                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/Obgj">Admin Panel Quick Shortcuts</a>
								                                    <div class="mic-info">
								                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
								                                    </div>
								                                </div>
								                                <div class="comment-text">
								                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
								                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
								                                </div>
								                                <div class="action">
								                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
								                                        <span class="glyphicon glyphicon-pencil"></span>
								                                    </button>
								                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
								                                        <span class="glyphicon glyphicon-ok"></span>
								                                    </button>
								                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
								                                        <span class="glyphicon glyphicon-trash"></span>
								                                    </button>
								                                </div>
								                            </div>
								                        </div>
								                    </li>
								                    <li class="list-group-item">
								                        <div class="row">
								                            <div class="col-xs-2 col-md-1">
								                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
								                            <div class="col-xs-10 col-md-11">
								                                <div>
								                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">Cool Sign Up</a>
								                                    <div class="mic-info">
								                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
								                                    </div>
								                                </div>
								                                <div class="comment-text">
								                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
								                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
								                                </div>
								                                <div class="action">
								                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
								                                        <span class="glyphicon glyphicon-pencil"></span>
								                                    </button>
								                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
								                                        <span class="glyphicon glyphicon-ok"></span>
								                                    </button>
								                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
								                                        <span class="glyphicon glyphicon-trash"></span>
								                                    </button>
								                                </div>
								                            </div>
								                        </div>
								                    </li>
								                </ul>
								                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
								            </div>
								        </div>
								    </div>
								</div>
										
					</div>

				</div>-->
				<hr>
			</div>
		</div>
	</div>
</div>
<?php
}else
{
?>
<div class="container-fluid">
	
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, er is een fout opgetreden, de opgevraagde pagina bestaat niet!
                </div>
                <div class="error-actions">
                    <a href="index.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>Terug naar begin pagina</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php include "inc/jquery.php";?>
</body>

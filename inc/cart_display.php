<div class="row">
			<div class="col-md-6"></div>
				<div class="col-md-6">
					<a id="cart-popover" class="btn pull-right" data-placement="bottom" title="Shopping Cart" style="position: fixed;
																													 right: 0;
																													 top: 15%;
																													 margin: -2.5em 0 0 0;
																													 z-index: 5;
																													 background: hsla(80, 90%, 40%, 0.7);
																													 color: white;
																													 font-weight: bold;
																													 text-align: left;
																													 border: solid hsla(80, 90%, 40%, 0.5);
																													 border-right: none;
																													 
																													 box-shadow: 0 1px 3px black;
																													 border-radius: 3em 0.5em 0.5em 3em;">
																													 
	                  <span class="glyphicon glyphicon-shopping-cart"></span>
	                  <span class="badge" style="background: #e41d1d;"></span>
					  <i class="fas fa-euro-sign"></i> <span class="total_price">0.00</span>
	                
	                </a>
				</div>
		</div>

                <!---cart item here------->
			    <div id="popover_content_wrapper" style="display: none;">
			        <span id="cart_details"></span>
			        
			        <div align="right">
			          <a href="inc/check_out_process.php" class="btn btn-primary" id="check_out_cart" >
			          <span class="glyphicon glyphicon-shopping-cart"></span> Checkout</a>
			          <button class="btn btn-default" id="clear_cart">
			          <span class="glyphicon glyphicon-trash"></span> Remove all</button>
			        </div>
			      </div>
				<!---cart item here------->
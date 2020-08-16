
<nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container">

    <div class="col-md-12">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
        <span class="sr-only">Toggle navigatie</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a  href="index.php" >
        <img src="img/clogo.png" style="width: 175px;height:50px;margin:5px;">
      </a>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="overflow-y: unset;">

   <ul class="nav navbar-nav">
          <li>
          <a href="#">ID: <?php if(isset($_SESSION['CODE'])) 
								{
									echo $_SESSION['CODE'];
								}
								else if(isset($_COOKIE['CODE'])) 
								{
									  echo $_COOKIE['CODE'];
								 }
                                 else
                                 {
                                        echo 'Null';
                                 }
                                              ?></a>
        
      </li>

            <li><a href="#"> <i class="fas fa-table" ></i> Table No. <?php
                                                                      if(isset($_COOKIE['TABLE_NO'])) 
                                                                      {
                                                                        echo $_COOKIE['TABLE_NO'];
                                                                      }
                                                                      else if(isset($_SESSION['TABLE_NO'])) 
                                                                      {
                                                                        echo $_SESSION['TABLE_NO'];
                                                                      }else
                                                                      {
                                                                        echo 'Null';
                                                                      }
                                              ?>
                                                                    
          </a></li>

      


      
        </ul>

    <ul class="nav navbar-nav navbar-right">


      <li>
        <form class="navbar-form navbar-left" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search " name="search_text" id="search_text">
        </div>
        <button type="submit" id="search_product" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
     </li>
      <li><a href="#" id="my_prod"><i class="fas fa-utensils" ></i> My Orders</a></li>
      <li><a href="inc/distroy_session.php"><i class="fas fa-sign-out-alt" ></i> New table booking?</a></li>

    </ul>
    </div><!-- /.navbar-collapse -->
  </div>
  </div><!-- /.container-fluid -->
</nav>


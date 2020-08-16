<?php
include('config/config.php');

$output = '';
//var_dump($_POST);

          if(isset($_POST["query"]) && !empty($_POST["query"]))
          {
             $search = mysqli_real_escape_string($conn, $_POST["query"]);
             $query = "SELECT * FROM product 
                       WHERE productname LIKE '%".$search."%'";

              $result = mysqli_query($conn, $query);

           if($total=mysqli_num_rows($result) > 0)
              {
               $output .= '<div class="col-md-12" style="">
                                
                                <hgroup class="mb20">
                                <h1>Search Results</h1>
                                <h2 class="lead"><strong class="text-danger">'.$total.'</strong> results were found for the search for <strong class="text-danger">'.$search.'</strong></h2>               
                              </hgroup>

                                <section class="col-xs-12 col-sm-6 col-md-12">';

                               
                 
                    while($row = mysqli_fetch_array($result))
                           {
                                     $sql = "SELECT catname FROM category WHERE categoryid='".$row["categoryid"]."'";
                                     $res = mysqli_query($conn, $sql);
                                    $category = mysqli_fetch_array($res);     

                             $output .= '<article class="search-result row" style="padding:20px;">
                                            <div class="col-xs-12 col-sm-12 col-md-3" >
                                              
                                        <a href="view?p_id='.$row["productid"].'" title="'.$row["productname"].'" class="thumbnail">';
                                              if($row["photo"] !== '' )
                                              {
                                                $output .= '<img src="upload/'.$row["photo"].'" alt='.$row["productname"].'" style="width:230px;height:172px;"/>';
                                              }else
                                              {
                                                $output .= '<img src="upload/noimage.jpg" alt='.$row["productname"].'" />';
                                              }
                                             
                             $output .= '</a>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2">
                                              <ul class="meta-search">
                                                <li ><i class="fas fa-euro-sign" ></i> <span>'.$row["price"].'</span></li>
                                                <li><i class="glyphicon glyphicon-tags"></i> <span>'.$category['catname'].'</span></li>
                                              </ul>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                                              <h3><a href="view?p_id='.$row["productid"].'" title="">'.$row["productname"].'</a></h3>
                                             
                                              <p>'.$row["description"].'</p>

                                                      
                                        <!--hidden values --> 
                                        <input type="hidden" name="hidden_name" id="name'.$row["productid"].'" value="'.$row["productname"].'" />
                                        <input type="hidden" name="hidden_price" id="price'.$row["productid"].'" value="'.$row["price"].'" />
                                          <input type="hidden" value="1" class="form-control" name="quantity" id="quantity'.$row["productid"].'">

                                      <span class="plus"><a href="#" class="btn add_to_cart" style="color:#fff;" name="add_to_cart" id="'.$row["productid"].'"><i class="glyphicon glyphicon-plus"></i> Add to cart</a></span>
                                            </div>
                                            <span class="clearfix borda"></span>
                                          </article>';

                            }  

                             $output .= '</section>
                                        </div>';
                                echo $output;         
               }
              else
              {
               echo '<hgroup class="mb20">
                        <h1>Search Results</h1>
                        <h2 class="lead"><strong class="text-danger">0</strong> results were found for the search for <strong class="text-danger">'.$search.'</strong></h2>               
                      </hgroup>';
              }

            }
            else
            {
              //header('location:../index.php');
              echo '<pre style="margin-top:20px;color:red;">';
              exit('404 Bad Gateway. No Result Found or field empty.');
               echo '</pre>';
            }

       

?>
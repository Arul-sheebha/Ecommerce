<?php

//getipaddress
function getIPAddress()
{
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
//$ip=getIPAddress();
//echo 'User Real IP Address-:'.$ip;








//getproducts
function getproducts()
{
    global $con;
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
                $select_product="select * from `products` order by rand() LIMIT 0,9";
				$result_product=mysqli_query($con,$select_product);
				while($row_product=mysqli_fetch_assoc($result_product))
				{
					$product_id=$row_product['product_id'];
					$product_title=$row_product['product_title'];
					$product_description=$row_product['product_description'];
					$product_image1=$row_product['product_image1'];
					$product_price=$row_product['product_price'];
					$category_id=$row_product['category_id'];
					$brand_id=$row_product['brand_id'];
					
					echo "<div class='col-md-4 mb-4'>
					<div class='card'>
					<img src='./admin_area/product_images/$product_image1' class='card_img_top'
					alt='$product_title' style='width:100%; height:200px; object_fit:contain;'>
					
					<div class='card-body'>
					<h5 class='card_title'>$product_title</h5>
					<p class='card_text'>$product_description<br>
					<br>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					</div>
					</div>
					</div>";
				}
        }
    }
    
}


//search products
function search_products()
{
    global $con;
    if(isset($_GET['search_data_product']))
    {
        $search_data=$_GET['search_data'];
        $search_product="select * from `products` where product_keywords like '%$search_data%'";
        $result_product=mysqli_query($con,$search_product);
        $row_search=mysqli_num_rows($result_product);
        if($row_search==0)
        {
            echo "<h2 class='text-center text-danger'>No Results Found on Your Search Category</h2>";
        }
    }
    
               
				while($row_product=mysqli_fetch_assoc($result_product))
				{
					$product_id=$row_product['product_id'];
					$product_title=$row_product['product_title'];
					$product_description=$row_product['product_description'];
					$product_image1=$row_product['product_image1'];
					$product_price=$row_product['product_price'];
					$category_id=$row_product['category_id'];
					$brand_id=$row_product['brand_id'];
					
					echo "<div class='col-md-4 mb-4'>
					<div class='card'>
					<img src='./admin_area/product_images/$product_image1' class='card_img_top'
					alt='$product_title' style='width:100%; height:200px; object_fit:contain;'>
					
					<div class='card-body'>
					<h5 class='card_title'>$product_title</h5>
					<p class='card_text'>$product_description<br>
					<br>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					</div>
					</div>
					</div>";
				}
        
}


//get_all_products()
function get_all_products()
{
    global $con;
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
                $select_product="select * from `products` order by rand()";
				$result_product=mysqli_query($con,$select_product);
				while($row_product=mysqli_fetch_assoc($result_product))
				{
					$product_id=$row_product['product_id'];
					$product_title=$row_product['product_title'];
					$product_description=$row_product['product_description'];
					$product_image1=$row_product['product_image1'];
					$product_price=$row_product['product_price'];
					$category_id=$row_product['category_id'];
					$brand_id=$row_product['brand_id'];
					
					echo "<div class='col-md-4 mb-4'>
					<div class='card'>
					<img src='./admin_area/product_images/$product_image1' class='card_img_top'
					alt='$product_title' style='width:100%; height:200px; object_fit:contain;'>
					
					<div class='card-body'>
					<h5 class='card_title'>$product_title</h5>
					<p class='card_text'>$product_description<br>
					<br>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					</div>
					</div>
					</div>";
				}
        }
    }
}


//getcategories to display sidenavbar
function getcategories()
{
    global $con;
    $select_category="select * from `categories`";
					$result_category=mysqli_query($con,$select_category);
					while($row_category=mysqli_fetch_assoc($result_category))
					{
						$category_id=$row_category['category_id'];
						$category_title=$row_category['category_title'];
						echo "<li class='nav-item'>
						<a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
						</li>";
					}
}

//getbrands to display sidenavbar
function getbrand()
{
    global $con;
    $select_brand="select * from `brand`";
					$result_brand=mysqli_query($con,$select_brand);
					while($row=mysqli_fetch_assoc($result_brand))
					{
						$brand_id=$row['brand_id'];
						$brand_title=$row['brand_title'];
						echo "<li class='nav-item'>
						<a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
						</li>";
					}
}


//getting unique categories
function get_unique_categories()
{
    global $con;
    if(isset($_GET['category']))
    {
        $category_id=$_GET['category'];
        $select_product="select * from `products` where category_id=$category_id";
        $result_product=mysqli_query($con,$select_product);
        $row_category=mysqli_num_rows($result_product);
        if($row_category==0)
        {
            echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
        }
        while($row_product=mysqli_fetch_assoc($result_product))
				{
					$product_id=$row_product['product_id'];
					$product_title=$row_product['product_title'];
					$product_description=$row_product['product_description'];
					$product_image1=$row_product['product_image1'];
					$product_price=$row_product['product_price'];
					$category_id=$row_product['category_id'];
					$brand_id=$row_product['brand_id'];
					
					echo "<div class='col-md-4 mb-4'>
					<div class='card'>
					<img src='./admin_area/product_images/$product_image1' class='card_img_top'
					alt='$product_title' style='width:100%; height:200px; object_fit:contain;'>
					
					<div class='card-body'>
					<h5 class='card_title'>$product_title</h5>
					<p class='card_text'>$product_description<br>
					<br>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					</div>
					</div>
					</div>";
                }
    }
}



//getting unique brands
function get_unique_brands()
{
    global $con;
    if(isset($_GET['brand']))
    {
        $brand_id=$_GET['brand'];
        $select_product="select * from `products` where brand_id=$brand_id";
        $result_product=mysqli_query($con,$select_product);
        $row_brand=mysqli_num_rows($result_product);
        if($row_brand==0)
        {
            echo "<h2 class='text-center text-danger'>This Brand is not Available for Services</h2>";
        }
        while($row_product=mysqli_fetch_assoc($result_product))
				{
					$product_id=$row_product['product_id'];
					$product_title=$row_product['product_title'];
					$product_description=$row_product['product_description'];
					$product_image1=$row_product['product_image1'];
					$product_price=$row_product['product_price'];
					$category_id=$row_product['category_id'];
					$brand_id=$row_product['brand_id'];
					
					echo "<div class='col-md-4 mb-4'>
					<div class='card'>
					<img src='./admin_area/product_images/$product_image1' class='card_img_top'
					alt='$product_title' style='width:100%; height:200px; object_fit:contain;'>
					
					<div class='card-body'>
					<h5 class='card_title'>$product_title</h5>
					<p class='card_text'>$product_description<br>
					<br>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					</div>
					</div>
					</div>";
                }
    }
}



//view_more_button_details
function view_details()
{
	global $con;
	if(isset($_GET['product_id']))
	{
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
			$product_id=$_GET['product_id'];
                $select_product="select * from `products` where product_id=$product_id";
				$result_product=mysqli_query($con,$select_product);
				while($row_product=mysqli_fetch_assoc($result_product))
				{
					$product_id=$row_product['product_id'];
					$product_title=$row_product['product_title'];
					$product_description=$row_product['product_description'];
					$product_image1=$row_product['product_image1'];
					$product_image2=$row_product['product_image2'];
					$product_image3=$row_product['product_image3'];
					$product_price=$row_product['product_price'];
					$category_id=$row_product['category_id'];
					$brand_id=$row_product['brand_id'];
					
					echo "<div class='col-md-4 mb-4'>
					<div class='card'>
					<img src='./admin_area/product_images/$product_image1' class='card_img_top'
					alt='$product_title' style='width:100%; height:200px; object_fit:contain;'>
					
					<div class='card-body'>
					<h5 class='card_title'>$product_title</h5>
					<p class='card_text'>$product_description<br>
					<br>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					</div>
					</div>
					</div>
					
					
					<div class='col-md-8'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-5'>Related Products</h4>
                        </div>
                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image2' class='card-img-top' 
                            alt='$product_title' style='width:100%; height: 200px; object-fit:contain;'>
                        </div>
                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image3' class='card-img-top' 
                            alt='$product_title' style='width:100%; height: 200px; object-fit:contain;'>
                        </div>
                    </div>
                </div>";
				}
        }
    }	
}
}



//cart
mysqli_report(MYSQLI_REPORT_ERROR);
try{
function cart()
{
	global $con;
	if(isset($_GET['add_to_cart']))
	{
		$ip_address=getIPAddress();
		$product_id=$_GET['add_to_cart'];
		$select_query="select * from `cart_details` where ip_address='$ip_address' and product_id=$product_id";
		$result_query=mysqli_query($con,$select_query);
		$num=mysqli_num_rows($result_query);
		if($num>0)
		{
			echo "<script>alert('this item already inserted to the cart')</script>";
			echo "<script>window.open('./index.php','_self')</script>";
		}
		else
		{
			$insert_query="insert into `cart_details` (product_id,ip_address,quantity)
			 values($product_id,'$ip_address',1)";
			 $result_query=mysqli_query($con,$insert_query);
			 echo "<script>alert('item is inserted to your cart')</script>";
			 echo "<script>window.open('./index.php','_self')</script>";
		}
	}
}
}
catch(mysqli_sql_exception $e)
{
	error_log($e->_toString);
}





//counting cart item
function cart_item()
{
	global $con;
	if(isset($_GET['add_to_cart']))
	{
		$ip_address=getIPAddress();
		$select_query="select * from `cart_details` where ip_address='$ip_address'";
		$result_query=mysqli_query($con,$select_query);
		$count_cart_item=mysqli_num_rows($result_query);
	}
	else
	{
		$ip_address=getIPAddress();
		$select_query="select * from `cart_details` where ip_address='$ip_address'";
		$result_query=mysqli_query($con,$select_query);
		$count_cart_item=mysqli_num_rows($result_query);
	}
	echo $count_cart_item;
}




//total cart price
function total_cart_price()
{
	global $con;
	$ip_address=getIPAddress();
	$total_price=0;
	$select="select * from `cart_details` where ip_address='$ip_address'";
	$result=mysqli_query($con,$select);
	while($row=mysqli_fetch_array($result))
	{
		$product_id=$row['product_id'];
		$select_price="select * from `products` where product_id=$product_id";
		$result_price=mysqli_query($con,$select_price);
		while($row_price=mysqli_fetch_array($result_price))
		{
			$product_price=array($row_price['product_price']);
			$product_value=array_sum($product_price);
			$total_price+=$product_value;
		}
	}
	echo $total_price;
}




//get_user_order_details()
mysqli_report(MYSQLI_REPORT_ERROR);
try{
    function get_user_order_details()
    {
        global $con;
        $username=$_SESSION['username'];
        $select_order="select * from `user_table` where username='$username'";
        $result_order=mysqli_query($con,$select_order);
        while($row_order=mysqli_fetch_array($result_order))
        {
            $user_id=$row_order['user_id'];
            if(!isset($_GET['edit_account']))
            {
                if(!isset($_GET['my_orders']))
                {
                    if(!isset($_GET['delete']))
                    {
                        $select_user="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                        $result_user=mysqli_query($con,$select_user);
                        $row_user=mysqli_num_rows($result_user);
                        if($row_user>0)
                        {
                            echo "<h4 class='text-center text-success p-3'>You have <span class='text-danger'>
                            $row_user</span> pending Orders</h4>
                            <p class='text-center'><a class='text-center text-dark' 
                            href='profile.php?my_orders'>Order Details</a></p>";
                        }
                        else
                        {
                            echo "<h3 class='p-3 text-center text-success'>You have Zero Pending Orders</h3>
                            <p class='text-center'><a class='text-center text-dark' 
                            href='../index.php'>Explore Products</a></p>";
                        }
                    }
                }
            }
        }
    }
}
catch(mysqli_sql_exception $e)
{
    error_log($e->_toString());
}

?>
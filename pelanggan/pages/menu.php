<!-- Theme color selector -->
  <div id="pm_theme_color_selector">
        <a class="pm_theme_color_selector_btn"><i class="typcn typcn-cog"></i></a>
        <p class="pm_theme_color_selector_title">Style Sampler</p>

        <div class="pm_theme_color_selector_container">
        	<p>Layout Style</p>
        	<select name="pm_theme_color_selector_mode" id="pm_theme_color_selector_mode">
        	  <option value="pm-full-mode" selected>Fullscreen</option>
              <option value="pm-boxed-mode">Boxed Mode</option>
        	</select>
        </div>
        <div class="pm_theme_color_selector_container">
        	<p>Patterns for Boxed Mode</p>
        	<ul class="pm_theme_img_selector" id="pm_theme_pattern_selector">
                <li><a href="#" id="pattern1"><img src="img/boxed-patterns/pattern1.png" alt="pattern1"></a></li>
                <li><a href="#" id="pattern2"><img src="img/boxed-patterns/pattern2.png" alt="pattern2"></a></li>
                <li><a href="#" id="pattern3"><img src="img/boxed-patterns/pattern3.png" alt="pattern3"></a></li>
                <li><a href="#" id="pattern4"><img src="img/boxed-patterns/pattern4.png" alt="pattern4"></a></li>
                <li><a href="#" id="pattern5"><img src="img/boxed-patterns/pattern5.png" alt="pattern5"></a></li>
                <li><a href="#" id="pattern6"><img src="img/boxed-patterns/pattern6.png" alt="pattern6"></a></li>
            </ul>
        </div>
        
        <div class="pm_theme_color_selector_container">
        	<p>Backgrounds for Boxed Mode</p>
        	<ul class="pm_theme_img_selector" id="pm_theme_background_selector">
                <li><a href="#" id="1a"><img src="img/boxed-bgs/1.jpg" alt="bg1"></a></li>
                <li><a href="#" id="2a"><img src="img/boxed-bgs/2.jpg" alt="bg2"></a></li>
                <li><a href="#" id="3a"><img src="img/boxed-bgs/3.jpg" alt="bg3"></a></li>
                <li><a href="#" id="4a"><img src="img/boxed-bgs/4.jpg" alt="bg4"></a></li>
                <li><a href="#" id="5a"><img src="img/boxed-bgs/5.jpg" alt="bg5"></a></li>
            </ul>
        </div>
   
    </div>
    <!-- Theme color selector -->
    

	<div id="pm_layout_wrapper" class="pm-full-mode"><!-- Use wrapper for wide or boxed mode -->
    
    	<!-- Search overlay -->
        <div class="pm-search-container" id="pm-search-container">
        	
            <div class="container">
            	<div class="row">
                	
                    <div class="col-lg-10 col-md-10 col-sm-10">
                    	<form action="#" method="post">
                        	<input name="pm_search_field" type="text" class="pm-search-field-header" placeholder="Type Keywords...">
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                    	<ul class="pm-search-controls">
                        	<li><a href="#"><i class="fa fa-search"></i></a></li>
                            <li><a href="#" id="pm-search-collapse"><i class="fa fa-times"></i></a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <!-- Search overlay end -->
    
    	<!-- Sub-header -->
    	<div class="pm-sub-menu-container">
        
        	<div class="container">
            
            	<div class="row">
                	
                    <div class="col-lg-5 col-md-5 col-sm-6">
                    	
                        <div class="pm-sub-menu-info">
                        	<p class="pm-address"><i class="fa fa-map-marker"></i> Jl. Lubuk Begalung</p>
                            <p class="pm-contact"><i class="fa fa-mobile-phone"></i> 1-(62)-877-4121-4105</p>
                        </div>
                                                
                    </div>
                    
                    <div class="col-lg-2 col-md-2 col-sm-6 visible-lg visible-md pm-book-event">
                    </div>
                    
                    <div class="col-lg-5 col-md-5 col-sm-6">
                    	<ul class="pm-sub-navigation">
                            <li class="pm-cart-btn-li"><a href="cart" class="pm-cart-btn"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    
                    
                </div>
            
            </div>
            
        </div>
        <!-- /Sub-header -->
    
    	<!-- Main navigation -->
        <header>
                
        	<div class="container">
            
            	<div class="row">
                	
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    	
                        <div class="pm-header-logo-container">
                    		<a href="index"><img src="img/logo1.png" class="img-responsive pm-header-logo" alt="Vienna Restaurant"></a> 
                        </div>
                        
                        <div class="pm-header-mobile-btn-container">
                        	<!--<button type="button" class="navbar-toggle pm-main-menu-btn" id="pm-main-menu-btn" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>-->
                            <button type="button" class="navbar-toggle pm-main-menu-btn" id="pm-mobile-menu-trigger" ><i class="fa fa-bars"></i></button>
                        </div>
                    
                    </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 pm-main-menu">
                                        
                    	<nav class="navbar-collapse collapse">
                        
                        	<ul class="sf-menu pm-nav">
                        
                                <li><a href="index">Home</a></li>
                                <li>
                                	<a href="#">
<?php
include "../_entry/koneksi.php";
$id_pelanggan=$_SESSION['id_pelanggan'];
$query_mysqli = mysqli_query($conn, "SELECT * FROM pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'")or die(mysqli_error());
while($data = mysqli_fetch_array($query_mysqli)){
?>
<?php echo $data['id_pelanggan']; ?>
<?php } ?></a>
                                    <ul>
                                        <li><a href="logout">Logout</a></li>
                                    </ul>
                                </li>
                            
                            </ul>
                        
                        </nav>  
                                              
                    </div>
                    
                </div>
            
            </div>
                    
        </header>
        <!-- /Main navigation -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">

    <title>Raja sambal : Kasir Restoran</title>
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/main.css" rel="stylesheet">
    
    <!-- mobile css -->
    <link href="css/responsive.css" rel="stylesheet">
    
    <!-- FontAwesome Support -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <!-- FontAwesome Support -->
    
    <!-- Btns -->
    <link rel="stylesheet" type="text/css" href="css/btn.css" />
    <!-- Btns -->
    
    <!-- Superfish menu -->
    <link rel="stylesheet" type="text/css" href="css/superfish/superfish.css" />
    <!-- Superfish menu -->
    
    <!-- Theme Color selector -->
    <link href="js/theme-color-selector/theme-color-selector.css" type="text/css" rel="stylesheet">
    <!-- Theme Color selector -->
    
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.carousel.css" />
    <!-- Owl Carousel -->
    
    <!-- Twitter feed -->
    <link rel="stylesheet" type="text/css" href="css/twitterfeed.css" />
    <!-- Twitter feed -->
    
    <!-- Typicons -->
    <link rel="stylesheet" type="text/css" href="css/typicons/typicons.min.css" />
    <!-- Typicons -->
    
    <!-- WOW animations -->
    <link rel="stylesheet" type="text/css" href="js/wow/css/libs/animate.css" />
    <!-- WOW animations -->
    
    <!-- Forms -->
    <link rel="stylesheet" type="text/css" href="css/forms.css" />
    <!-- Forms -->
    
    <!-- Flickr feed -->
    <link rel="stylesheet" type="text/css" href="css/flickrfeed.css" />
    <!-- Flickr feed -->
    
    <!-- Pulse Slider -->
    <link rel="stylesheet" type="text/css" href="js/pulse/pm-slider.css" />
    <!-- Pulse Slider -->
        
    <!-- Development Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Cantata+One%7COpen+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- Development Google Fonts -->
    
  </head>

  <body>
  
  <!-- Mobile Menu -->
  <div class="pm-mobile-menu-overlay" id="pm-mobile-menu-overlay"></div>
  
  <div class="pm-mobile-global-menu">
                	
    <div class="pm-mobile-global-menu-logo">
        <a href="index"><img style="width: 150px; height: 150px;" src="img/logo1.png" alt="Vienna Restaurant"></a> 
    </div>
    
    <div class="pm-mobile-global-menu-search">
    	<form action="#" method="post">
            <input name="" type="text" class="pm-search-field-mobile" placeholder="Type Keywords...">
        </form>
    </div>
    
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
                <!--<li><a href="#">Customer Login</a></li>-->
            </ul>
        </li>
    
    </ul>
        
  </div><!-- /pm-mobile-nav-overlay -->
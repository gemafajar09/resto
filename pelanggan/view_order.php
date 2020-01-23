<?php require '../_entry/koneksi.php';?>
<?php require 'proses/cek_login.php';?>
<?php
Include "pages/head.php";
Include "pages/menu.php";
?>  
  
                
        <!-- SLIDER AREA -->
        
        <div class="pm-pulse-container" id="pm-pulse-container">
        
            <div id="pm-pulse-loader">
                <img src="js/pulse/img/ajax-loader.gif" alt="slider loading" />
            </div>
            
            <div id="pm-slider" class="pm-slider">
                
                <div id="pm-slider-progress-bar"></div>
            
                <ul class="pm-slides-container" id="pm_slides_container">
                    
                    <!-- FULL WIDTH slides -->
                    <li data-thumb="img/slider/1a.jpg" class="pmslide_0"><img src="img/slider/slide1.jpg" alt="img01" />
                    
                        <div class="pm-holder">
                            <div class="pm-caption">
                                  <h1><span>Welcome to Goresto</span></h1>
                                  <span class="pm-caption-decription">
                                    Selamat Menikmati
                                  </span>
                                  <a href="index" class="pm-slide-btn animated">Order Now <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    
                    </li>
                    
                    <li data-thumb="img/slider/2a.jpg" class="pmslide_1"><img src="img/slider/slide2.jpg" alt="img02" />
                        
                        <div class="pm-holder">
                            <div class="pm-caption">
                                  <h1><span>Welcome to Goresto</span></h1>
                                  <span class="pm-caption-decription">
                                    Lebih hemat makan di goresto
                                  </span>
                                  <a href="index" class="pm-slide-btn animated">Order Now <i class="fa fa-chevron-right"></i></a>
                                  
                            </div>
                        </div>
                                            
                    </li>
                    
                    <li data-thumb="img/slider/3a.jpg" class="pmslide_2"><img src="img/slider/slide3.jpg" alt="img02" />
                        
                        <div class="pm-holder">
                            <div class="pm-caption">
                                  <h1><span>Welcome to Goresto</span></h1>
                                  <span class="pm-caption-decription">
                                    harga sesuai kantong
                                  </span>
                                  <a href="index" class="pm-slide-btn animated">Order Now <i class="fa fa-chevron-right"></i></a>
                                  
                            </div>
                        </div>
                                            
                    </li>
                                    
                </ul>
               
            </div>
        
        </div>
        
 		<!-- SLIDER AREA end -->
        
        <!-- BODY CONTENT starts here -->
        
        <!-- Menu filter system -->
        <div class="container pm-containerPadding-top-50 pm-containerPadding-bottom-10">
        	<div class="row">
            
                <div class="col-lg-12 pm-containerPadding-bottom-40">
                	
                    <div class="pm-featured-header-container">
                    
                    	<!-- Featured panel header -->
                        <div class="pm-featured-header-title-container menus">
                        	<p class="pm-featured-header-title">MENU MASAKAN</p>
                            <p class="pm-featured-header-message">Selamat Menikmati</p>
                        </div>
                        <!-- Featured panel header end -->
                        
                        <!-- Filter menu -->
                        <div class="pm-isotope-filter-container">
                            
                        	<ul class="pm-isotope-filter-system">
                            	<li class="pm-isotope-filter-system-expand">Kategori <i class="fa fa-angle-down"></i></li>
                                <?php 
                                include'_entry/koneksi.php';
                                $select=mysqli_query($conn, "SELECT * FROM kategori");
                                while($show=mysqli_fetch_array($select)){
                                ?>
                            	<li><a href="view_order?page1&&id_kategori=<?php echo $show['id_kategori'];?>"><?php echo $show
                            ['nama_kategori'];?></a></li>
                             <?php }?>
                            </ul>
                        </div>
                        <!-- Filter menu end -->
                    
                    </div>
                    
                </div><!-- /.col-lg-12 -->
                
                <!-- menu item -->
               <?php
                                    // Include / load file koneksi.php
                                    // Cek apakah terdapat data pada page URL
                                    if(isset($_GET['id_kategori'])){
                                    $id = $_GET['id_kategori'];
                                    }
                                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                    $limit = 8; // Jumlah data per halamanya

                                    // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                                    $limit_start = ($page - 1) * $limit;

                                    // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
                                    $data=mysqli_query($conn, "SELECT * FROM masakan where id_kategori='$id' AND status_masakan='Y'LIMIT ".$limit_start.",".$limit);
                                    $no = $limit_start + 1; // Untuk penomoran tabel
                                    while($show=mysqli_fetch_array($data)){
                                    ?>
                              
                <div class="col-lg-4 col-md-4 col-sm-6 pm-column-spacing">
                    <div class="pm-menu-item-container">
                    	<div class="pm-menu-item-img-container" style="background-image:url(../_entry/assets/images/masakan/<?php echo $show['image']; ?>);">
                        	<div class="pm-menu-item-price"><p><?php echo'Rp '.number_format($show['harga']); ?></p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                        	<p class="pm-menu-item-title"><?php echo $show['nama_masakan']; ?></p>
                            <p class="pm-menu-item-excerpt"><a href="masakan_detail?id=<?php echo $show['id_masakan'];?>" class="pm-rounded-btn small pm-primary">add to cart</a></p>
                        </div>
                    </div>
                    
                </div><!-- /.col-lg-4 -->
                <?php } ?>
                <!-- /menu item -->
                
            </div>

            <div class="pagination">
               <?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                 <li><a href="view_order?page=1&&id_kategori=<?=$id;?>">First</a></li>
                <li><a href="view_order?page=<?php echo $link_prev; ?>&&id_kategori=<?=$id;?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($conn,"SELECT COUNT(*) AS jumlah FROM masakan where id_kategori='$id' AND status_masakan ='Y' ");
            ($get_jumlah = (mysqli_fetch_array($sql2)));

            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamanya
            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="view_order?page=<?php echo $i; ?>&&id_kategori=<?=$id;?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
                <li><a href="view_order?page=<?php echo $link_next; ?>&&id_kategori=<?=$id;?>">&raquo;</a></li>
                <li><a href="view_order?page=<?php echo $jumlah_page; ?>&&id_kategori=<?=$id;?>">Last</a></li>
            <?php
            }
            ?>
            </div>
          
        </div>
        <!-- Menu filter system end --> 
        
        <!-- BODY CONTENT end -->
        
      
<?php
include 'pages/footer.php';
?>

  </body>
</html>

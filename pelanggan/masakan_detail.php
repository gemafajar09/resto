<?php
    include '../_entry/koneksi.php';
    if (empty($_GET['id'])) {
        header('location:index');
    }

    $id_masakan = $_GET['id'];

    require 'proses/cek_login.php';

    $query = $conn->query("SELECT * FROM masakan INNER JOIN kategori ON masakan.id_kategori = kategori.id_kategori WHERE id_masakan = $id_masakan");
    $hitung = mysqli_num_rows($query);

    if ($hitung < 1) {
        header('location:index');
    }

    $rows = mysqli_fetch_assoc($query);
?>
<?php
Include "pages/head.php";
Include "pages/menu.php";
?>  
                
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><?php echo $rows['nama_masakan']; ?></p>
                <p class="pm-sub-header-message">Take home the classic single</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-80">
        
        	<div class="row">
            
            	<div class="col-lg-12 pm-column-spacing">
                	<div itemprop="breadcrumb" class="woocommerce-breadcrumb pm-woocommerce-breadcrumbs">
                    <p><a href="index" class="home">Home</a></p>
                    <p> / </p>
                    <p><?php echo $rows['nama_masakan']; ?></p></div>
                </div>
            
            </div>
        
        	<div class="row">
                        
            	<div class="col-lg-4 col-md-4 col-sm-6 pm-column-spacing">
                	
                    <div class="pm-woocomm-item-thumb-container">
                    	<div class="pm-woocomm-item-sale-tag">Sale</div>
                    	<img src="../_entry/assets/images/masakan/<?php echo $rows['image']; ?>" class="img-responsive">
                    </div>
                    
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-6 pm-column-spacing">
                	<p class="pm-woocom-item-title"><?php echo $rows['nama_masakan']; ?></p>
                    
                    <p class="pm-woocom-item-price"><?php echo'Rp '.number_format($rows['harga']); ?></p>

                    <form action="proses/tambah_pesanan.php" method="post" id="tambah">
                    <input type="hidden" name="id_masakan" value="<?php echo $rows['id_masakan'];?>">
                    <div class="pm-woocom-item-short-description">
                            <input type="text" maxlength="25" placeholder="Masukan Keterangan" name="keterangan" class="form-control"></br></br>
                    
                    <div class="quantity buttons_added">
                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="jumlah" min="1" step="1" >
                        
                        <div class="pm-item-add-to-cart">
                            <input type="submit" class="pm-rounded-submit-btn pm-primary" value="Add to cart" />
                        </div>
                                                
                    </div>
                    </div>
                    
                    <!-- quantity buttons end -->
                    </form>

                    <div class="pm-woocom-tags-container">
                    	
                        <div class="product_meta">
	
                            <span class="posted_in"> Categories: <a rel="tag" href="#"><?php echo $rows['nama_kategori']; ?></a> </span>
	
						</div>
                        
                    </div>
                    
                </div>
            
            </div>
                  
        </div>
        
        <!-- BODY CONTENT end -->
          
<?php
include 'pages/footer.php';
?>
<script>
        $(document).ready(function(){
            $('#tambah').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: new FormData(this),   
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        success: function(data){
                            if(data.hasil == true)
                            {
                            
                                window.location.assign('cart');
                            }
                            else{
                                swal({
                                    title : 'Gagal',
                                    icon  : 'error',
                                    text  : data.pesan,
                                });
                            }
                        }
                 
                   });
            });
        });
    </script>

  </body>
</html>


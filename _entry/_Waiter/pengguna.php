<?php
session_start();
if($_SESSION['nama_level']=="admin") {
    header("Location: ../_Admin/index");
}

elseif ($_SESSION['nama_level']=="") {
	header("Location: ../_Waiter/index");
}

elseif ($_SESSION['nama_level']=="kasir") {
	header("Location: ../_Kasir/index");
}

elseif ($_SESSION['nama_level']=="owner") {
	header("Location: ../_Owner/index");
}

?>
<?php
require_once('../models/database.php');
include "../koneksi.php";
$db = new database();
include "pages/head.php";
?>
<body>

<?php
include "pages/navbar.php";
?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

<?php
include "pages/menu.php";
?>			

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data</span> - Menu</h4>
						</div>

					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="?page=Home"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="?page=Menu">Entri Referensi</a></li>
							<li class="active">Menu</li>
						</ul>

					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
					<div id="pengguna"></div>
				</div>
				<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<audio id="klik" src="../assets/audio/klik.mp3"></audio>
	<audio id="success" src="../assets/audio/success.mp3"></audio>
	<audio id="error" src="../assets/audio/error.wav"></audio>

<script type="text/javascript">
	function hack(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[a-zA-Z0-9-@.]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>
	
	<script>
    	$(document).ready(function(){
    		klik();
    		loadData_menu();

    		function klik()
			{
				$('.klik').click(function(){
    				document.getElementById('klik').play();	
    			});	
			}

			function error()
			{
				document.getElementById('error').play();	
			}  

			function success()
			{
				document.getElementById('success').play();	
			}

			function loadData_menu(keyword = '')
			{
				$.get('ajax/pengguna', function(data){
					$('#pengguna').html(data);

					$('.tambah_pengguna').click(function(){
						$("#inputGambar").change(function () {
		        			readURL(this);
		   				});

		   				$('#form_tambah_pengguna').submit(function(e){
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
		   								$('#mymodal_tambah_pengguna').modal('hide');
										$('.modal-backdrop').remove();
										$('body').removeClass('modal-open');
		   								success();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'success',
		   									text  : data.pesan, 
		   								});
		   								loadData_menu();
		   							}
		   							else{
		   								error();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'error',
		   									text  : data.pesan,
		   								});
		   							}
		   						}
		   					});
		   				});
					});

					
					$('.ubah_pengguna').click(function(){
						let id_user = $(this).attr('value');
						$.get('ajax/modal_ubah_pengguna?id_user='+id_user, function(data){
							$('#modal_ubah_pengguna').html(data);
							$('#form_ubah_pengguna').submit(function(e){
								e.preventDefault();
								var me = $(this);
								$.ajax
								({
									url:me.attr('action'),
									method:'POST',
									data:new FormData(this),
									dataType:'JSON',
									contentType:false,
									processData:false,
									beforeSend:function()
									{
										$('#pesan').html('<b>Uploading...</b>');
									},
									success:function(data)
									{
										if (data.hasil == true) 
										{
											$('#mymodal_ubah_pengguna').modal('hide');
												$('.modal-backdrop').remove();
												$('body').removeClass('modal-open');
												success();
												swal({
										            title: "Sukses",
										            text: data.pesan, 
										            icon: "success",
										    })
											loadData_menu();

										}
										else
										{
											error();
											swal({
														icon: 'error',
														title: 'Gagal',
														text: data.pesan,
													})
													return false;
										}
									}
								});
							});
						});
					});

					$('.hapus_pengguna').click(function(){
						let id_user = $(this).attr('value');
						swal({
				            title: "Lanjutkan Menghapus?",
				            text: 'Data yang dihapus tidak dapat dikembalikan.', 
				            icon: "warning",
				            buttons: true,
				            dangerMode: true,
				        })
				        .then((willDelete) =>
				        {
				          	if (willDelete) 
				          	{
				          		$.ajax
						  		({
									url:'proses/hapus_pengguna.php?id_user='+id_user,
									method:'POST',
									dataType:'JSON',
									success: function(data){
										if (data.hasil == true) {
											success();
								            swal(data.pesan, {
								              icon: "success",
								            });
											loadData_menu();
										}
										else
										{
											error();
								            swal(data.pesan, {
								              icon: "error",
								            });
										}
									}

								});        
				          	}
				          	
				        });

					});

					klik();
				});


			}			
			function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                $('#image_upload_preview').attr('src', e.target.result);
		            }

		            reader.readAsDataURL(input.files[0]);
		        }
			}


    	});
    </script>

</body>
</html>

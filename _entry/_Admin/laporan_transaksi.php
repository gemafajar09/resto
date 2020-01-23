<?php
include('../koneksi.php');
require('../assets/fpdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../assets/images/logo.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Raja Sammbal',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : (62)87741214105)',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Lubuk Begalung RT 04 RW 02 No. 26',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.rajasambal.com : rajasambal@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Transaksi",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'ID Transaksi', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Waiter', 1, 0, 'C');
$pdf->Cell(3, 0.8, ' ID Pesanan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Total Harga', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah Uang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kembalian', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id_user = user.id_user where tanggal order by tanggal ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['id_transaksi'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama_user'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['id_pesanan'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['total_bayar'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['jumlah_uang'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jumlah_uang']-$lihat['total_bayar'],1, 1, 'C');

	$no++;
}

$pdf->Output("laporan_data_transaksi.pdf","I");

?>


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
$pdf->MultiCell(19.5,0.5,'rajasambal',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : (62)82385848382)',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Lubuk Begalung RT 04 RW 02 No. 26',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.rajasambal.com : rajasambal.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Masakan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Masakan', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(6, 0.8, ' Nama Kategori', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Harga', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Status Masakan', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($conn, "SELECT masakan.nama_masakan, masakan.jenis, kategori.nama_kategori, masakan.harga, if((masakan.status_masakan)='Y','Tersedia','Habis') as masakan_status from masakan inner join kategori on masakan.id_kategori = kategori.id_kategori where status_masakan = 'Y'");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama_masakan'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['jenis'], 1, 0,'C');
	$pdf->Cell(6, 0.8, $lihat['nama_kategori'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['harga'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['masakan_status'],1, 1, 'C');

	$no++;
}

$pdf->Output("laporan_data_masakan.pdf","I");

?>


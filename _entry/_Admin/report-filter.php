<?php
session_start();
include('../koneksi.php');
require('../assets/fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../assets/images/logo.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Raja Sambal',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl.Lubuk Begalung Kec.Padang Timur ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telepon : +62 87741214105',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(28.5,0.7,"Laporan Transaksi Raja Sambal",0,10,'C');
$pdf->Cell(28.5,0.7,"Tanggal : ".date("d/m/Y"),0,10,'C');
// $pdf->Cell(28.5,0.7,"Raja Sambal",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 1, 'NO', 1, 0, 'C');
$pdf->Cell(4.5, 1, 'Nama User', 1, 0, 'C');
$pdf->Cell(4.5, 1, 'Pesanan', 1, 0, 'C');
$pdf->Cell(4.5, 1, 'Tanggal', 1, 0, 'C');
$pdf->Cell(7, 1, 'Bayar', 1, 0, 'C');
$pdf->Cell(7, 1, 'Total Pesanan', 1, 0, 'C');
$pdf->SetFont('Arial','',9);
$pdf->ln(1);
$no=1;

$from=$_POST['from'];
$end=$_POST['end'];
$totpesanan = 0;
$totbayar =0;
$totkeuntungan =0;
$query=mysqli_query($conn,"SELECT * FROM transaksi tr INNER JOIN user us ON tr.id_user=us.id_user WHERE (tanggal BETWEEN '$from' AND '$end')") or die(mysql_error());
while($lihat=mysqli_fetch_array($query)){

	$pdf->Cell(1, 1, $no, 1, 0, 'C');
	$pdf->Cell(4.5, 1, $lihat['nama_user'], 1,'C');
	$pdf->Cell(4.5, 1, $lihat['id_pesanan'], 1,'C');
	$pdf->Cell(4.5, 1, $lihat['tanggal'],1, 'C');
	$pdf->Cell(7, 1, $lihat['jumlah_uang'],1, 'C');
	$pdf->Cell(7, 1, $lihat['total_bayar'],1, 'C');
	$no++;
	$totpesanan = $totpesanan + $lihat['total_bayar'];
	$totbayar = $totbayar + $lihat['jumlah_uang'];
	$pdf->ln(1);
}
$totkeuntungan = $totbayar-$totpesanan;

// $pdf->SetFont('Arial','B',10);
// $pdf->ln(1);
// $pdf->Cell(14.5, 1, "Total",1,0, 'C');
// $pdf->Cell(7, 1, $totpesanan,1,0, 'C');
// $pdf->Cell(7, 1, $totbayar,1,0, 'C');
// $pdf->ln(1);
// $pdf->Cell(14.5, 1, "Total Keuntungan",1,0, 'C');
// $pdf->Cell(14, 1, $totkeuntungan,1,0, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->ln(1);
$pdf->Cell(14.5, 1, "Total Transaksi",1,0, 'C');
$pdf->Cell(14, 1, $totpesanan,1,0, 'C');



$pdf->ln(2);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(47.5,0.7,"Padang, ".date("d/m/Y"),0,0,'C');

$pdf->ln(3);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(47.5,0.7,"TTD",0,10,'C');

$pdf->Output("laporan_transaksi.pdf","I");

?>
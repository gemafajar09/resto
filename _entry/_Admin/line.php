<?php 
	//Include Koneksi
	include "../koneksi.php";

	//Membuat Query
	$k=mysqli_query($conn,"select * from transaksi");
	$q=mysqli_query($conn,"select date_format(tanggal,'%b') as bulan from transaksi");
?>

<!-- File yang diperlukan dalam membuat chart -->
    
<script type="text/javascript">
$(function () {
    $('#view').highcharts({
        title: {
            text: 'Data Penjualan per bulan',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [<?php while($r=mysqli_fetch_array($q)){ echo "'".$r["bulan"]."',";}?>]
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Jumlah ',
            data: [<?php while($t=mysql_fetch_array($k)){ echo $t["total_bayar"].",";}?>]
        }]
    });
});
</script>

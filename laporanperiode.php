   <!-- <body onLoad="window.print(); "> -->
<link rel="stylesheet" href="cetak.css" type="text/css"/>
<?php
include "koneksi.php";
?>
	<head>
    </head>
    <body id="page">
	<div id='content-detail-print'>	
	<center>
	
	</h3>
	
	<table width='100%' border=1>
	
		<tr><td width='100px' colspan=3><br>
<h3><b>Data pengguna Yang Dinilai 
	<br></td></tr>
		<tr><td colspan=5></td><td>Periode : <?php echo $_POST['periode'] ?></td></tr>
	 <tr height="60"><th>NO</th><th>Nama pengguna</th><th>NIK/NPM</th><th>level</th><th>program_studi</th><th>Periode</th><th>Hasil</th><th>Hasil (%)</th></tr>

    
    <?php
	$tampil=mysqli_query($link,"select e.level,f.program_studi,c.periode,a.hasil,d.nama,d.nik from vhasil a join tb_asspenilai b on a.id_asspenilai=b.id_asspenilai join tb_formpenilai c on b.id_formpenilai=c.id_formpenilai join tb_pengguna d on c.id_pengguna=d.id_pengguna left join tb_level e on d.id_level=e.id_level left join tb_program_studi f on d.id_program_studi=f.id_program_studi where left(periode,4)='$_POST[periode]' order by a.hasil desc");
	$no=1;
	
		while ($a=mysqli_fetch_array($tampil)) {
                    # code...
                    ?>

                    <tr>
                      <th><?php echo $no++; ?></th>
                      <th><?php echo $a['nama']; ?></th>
                      <th><?php echo $a['nik']; ?></th>
                      <th><?php echo $a['level']; ?></th>
                      <th><?php echo $a['program_studi']; ?></th>
                      <th><?php echo $a['periode']; ?></th>
                      <th><?php echo $a['hasil']; ?></th>
                      <th><?php echo $a['hasil']/100; ?></th>
                      
                    </tr>
                    <?php
                  }
	
	$tgl=date('Y-m-d');
	echo "
	</table><table><tr><td colspan='5' ></td><td colspan=2><b><br><br>Jakarta, $tgl</td></tr>";
	echo"<tr><td colspan='5' ></i></i></td></tr>";
	echo"<tr><td colspan='5' ></td></tr>";
	echo"<tr><td colspan='5' ></td></tr>";	
	echo"<tr><td colspan='5'></td><td colspan=3><b>dto,<br>------------------------------------</td></tr>";	
	?>
	</table>	
	</center>
	</div>
</html>

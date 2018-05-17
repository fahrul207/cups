<!doctype html>
<html>
    <head>
        <title> Rincian </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background : #ff7f50;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center">Rincian Data</h2>
        <table class="table">
	    <tr><td>Nama Siswa</td><td><?php echo $Nama_Siswa; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $Jenis_Kelamin; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $Alamat; ?></td></tr>
	    <tr><td>Asal Sekolah</td><td><?php echo $Asal_Sekolah; ?></td></tr>
	    <tr><td>Code Progdi</td><td><?php echo $Code_Progdi; ?></td></tr>
	    <tr><td>Pembuatan</td><td><?php echo $Pembuatan; ?></td></tr>
	    <tr><td>Code Pembuat</td><td><?php echo $code_pembuat; ?></td></tr>
	    <tr><td>Pembaharuan</td><td><?php echo $Pembaharuan; ?></td></tr>
	    <tr><td>Code Pembaharuan</td><td><?php echo $Code_Pembaharuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('siswa') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
        </body>
</html>
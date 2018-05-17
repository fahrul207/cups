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
        <h2 style="text-align:center"> Rincian Data </h2>
        <table class="table">
	    <tr><td>Nama Panitia</td><td><?php echo $Nama_Panitia; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $Jenis_Kelamin; ?></td></tr>
	    <tr><td>Pembuatan</td><td><?php echo $Pembuatan; ?></td></tr>
	    <tr><td>Code Pembuat</td><td><?php echo $Code_Pembuat; ?></td></tr>
	    <tr><td>Pembebaharuan</td><td><?php echo $Pembebaharuan; ?></td></tr>
	    <tr><td>Code Pembaharuan</td><td><?php echo $Code_Pembaharuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('panitia_pendaftaran') ?>" class="btn btn-danger" style="text-align:center">Cancel</a></td></tr>
	</table>
        </body>
</html>
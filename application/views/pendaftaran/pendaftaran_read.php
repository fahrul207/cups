<!doctype html>
<html>
    <head>
        <title> Rincian Data </title>
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
	    <tr><td>NIS</td><td><?php echo $NIS; ?></td></tr>
	    <tr><td>ID Panitia</td><td><?php echo $ID_Panitia; ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $Tanggal_Pendaftaran; ?></td></tr>
	    <tr><td>Code Progdi</td><td><?php echo $Code_Progdi; ?></td></tr>
	    <tr><td>Pembuatan</td><td><?php echo $Pembuatan; ?></td></tr>
	    <tr><td>Code Pembuat</td><td><?php echo $Code_Pembuat; ?></td></tr>
	    <tr><td>Pembaharuan</td><td><?php echo $Pembaharuan; ?></td></tr>
	    <tr><td>Code Pembaharuan</td><td><?php echo $Code_Pembaharuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
        </body>
</html>
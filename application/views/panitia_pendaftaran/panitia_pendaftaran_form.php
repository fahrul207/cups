<!doctype html>
<html>
    <head>
        <title> Perbaharui Data Panitia Pendaftaran </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
	            background : #ff7f50;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center"> <?php echo $tittle ?> </h2>
		<table>
	
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group" style="margin-top: 8px" id="message">
            <label for="varchar">Nama Panitia <?php echo form_error('Nama_Panitia') ?></label>
            <input type="text" class="form-control" name="Nama_Panitia" id="Nama_Panitia" placeholder="Nama Panitia" value="<?php echo $Nama_Panitia; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('Jenis_Kelamin') ?></label>
            <input type="text" class="form-control" name="Jenis_Kelamin" id="Jenis_Kelamin" placeholder="Jenis Kelamin" value="<?php echo $Jenis_Kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Dan Jam Pembuatan <?php echo form_error('Pembuatan') ?></label>
            <input type="text" class="form-control" name="Pembuatan" id="Pembuatan" placeholder="Pembuatan" value="<?php echo $Pembuatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Code Pembuat <?php echo form_error('Code_Pembuat') ?></label>
            <input type="text" class="form-control" name="Code_Pembuat" id="Code_Pembuat" placeholder="Code Pembuat" value="<?php echo $Code_Pembuat; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Dan Jam Pembebaharuan <?php echo form_error('Pembebaharuan') ?></label>
            <input type="text" class="form-control" name="Pembebaharuan" id="Pembebaharuan" placeholder="Pembebaharuan" value="<?php echo $Pembebaharuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Code Pembaharuan <?php echo form_error('Code_Pembaharuan') ?></label>
            <input type="text" class="form-control" name="Code_Pembaharuan" id="Code_Pembaharuan" placeholder="Code Pembaharuan" value="<?php echo $Code_Pembaharuan; ?>" />
        </div>
	    <input type="hidden" name="Id_Panitia" value="<?php echo $Id_Panitia; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('panitia_pendaftaran') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
	
</html>
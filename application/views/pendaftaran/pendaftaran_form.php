<!doctype html>
<html>
    <head>
        <title> Perbahaui Data Pendaftaran Siswa Baru </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background : #ff7f50;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center"> <?php echo $tittle ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">NIS <?php echo form_error('NIS') ?></label>
            <input type="text" class="form-control" name="NIS" id="NIS" placeholder="NIS" value="<?php echo $NIS; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID Panitia <?php echo form_error('ID_Panitia') ?></label>
            <input type="text" class="form-control" name="ID_Panitia" id="ID_Panitia" placeholder="ID Panitia" value="<?php echo $ID_Panitia; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pendaftaran <?php echo form_error('Tanggal_Pendaftaran') ?></label>
            <input type="text" class="form-control" name="Tanggal_Pendaftaran" id="Tanggal_Pendaftaran" placeholder="Tanggal Pendaftaran" value="<?php echo $Tanggal_Pendaftaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Code Progdi <?php echo form_error('Code_Progdi') ?></label>
            <input type="text" class="form-control" name="Code_Progdi" id="Code_Progdi" placeholder="Code Progdi" value="<?php echo $Code_Progdi; ?>" />
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
            <label for="datetime"> Tanggal Dan Jam Pembaharuan <?php echo form_error('Pembaharuan') ?></label>
            <input type="text" class="form-control" name="Pembaharuan" id="Pembaharuan" placeholder="Pembaharuan" value="<?php echo $Pembaharuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Code Pembaharuan <?php echo form_error('Code_Pembaharuan') ?></label>
            <input type="text" class="form-control" name="Code_Pembaharuan" id="Code_Pembaharuan" placeholder="Code Pembaharuan" value="<?php echo $Code_Pembaharuan; ?>" />
        </div>
	    <input type="hidden" name="Id_Pendaftaran" value="<?php echo $Id_Pendaftaran; ?>" /> 
	    <button type="submit" class="btn btn-success"> <?php echo $button ?> </button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
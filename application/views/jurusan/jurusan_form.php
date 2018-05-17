<!doctype html>
<html>
    <head>
        <title> Perbaharui Data Jurusan Siswa Baru </title>
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
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Progdi <?php echo form_error('Nama_Progdi') ?></label>
            <input type="text" class="form-control" name="Nama_Progdi" id="Nama_Progdi" placeholder="Nama Progdi" value="<?php echo $Nama_Progdi; ?>" />
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
            <label for="datetime">Tanggal Dan Jam Pembaharuan <?php echo form_error('Pembaharuan') ?></label>
            <input type="text" class="form-control" name="Pembaharuan" id="Pembaharuan" placeholder="Pembaharuan" value="<?php echo $Pembaharuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Code Pembaharuan <?php echo form_error('Code_Pembaharuan') ?></label>
            <input type="text" class="form-control" name="Code_Pembaharuan" id="Code_Pembaharuan" placeholder="Code Pembaharuan" value="<?php echo $Code_Pembaharuan; ?>" />
        </div>
	    <input type="hidden" name="Code_Progdi" value="<?php echo $Code_Progdi; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
	    <a href="<?php echo site_url('jurusan') ?>" class="btn btn-danger">Batal</a>
	</form>
    </body>
</html>
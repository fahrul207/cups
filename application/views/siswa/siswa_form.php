<!doctype html>
<html>
    <head>
        <title> Perbahaui Data Siswa Baru</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background : #ff7f50;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center"><?php echo $tittle ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Siswa <?php echo form_error('Nama_Siswa') ?></label>
            <input type="text" class="form-control" name="Nama_Siswa" id="Nama_Siswa" placeholder="Nama Siswa" value="<?php echo $Nama_Siswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('Jenis_Kelamin') ?></label>
            <input type="text" class="form-control" name="Jenis_Kelamin" id="Jenis_Kelamin" placeholder="Jenis Kelamin" value="<?php echo $Jenis_Kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('Alamat') ?></label>
            <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat" value="<?php echo $Alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Asal Sekolah <?php echo form_error('Asal_Sekolah') ?></label>
            <input type="text" class="form-control" name="Asal_Sekolah" id="Asal_Sekolah" placeholder="Asal Sekolah" value="<?php echo $Asal_Sekolah; ?>" />
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
            <label for="int">Code Pembuat <?php echo form_error('code_pembuat') ?></label>
            <input type="text" class="form-control" name="code_pembuat" id="code_pembuat" placeholder="Code Pembuat" value="<?php echo $code_pembuat; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Dan Jam Pembaharuan <?php echo form_error('Pembaharuan') ?></label>
            <input type="text" class="form-control" name="Pembaharuan" id="Pembaharuan" placeholder="Pembaharuan" value="<?php echo $Pembaharuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Code Pembaharuan <?php echo form_error('Code_Pembaharuan') ?></label>
            <input type="text" class="form-control" name="Code_Pembaharuan" id="Code_Pembaharuan" placeholder="Code Pembaharuan" value="<?php echo $Code_Pembaharuan; ?>" />
        </div>
	    <input type="hidden" name="NIS" value="<?php echo $NIS; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('siswa') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
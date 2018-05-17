<!doctype html>
<html>
    <head>
        <title> Data Pendaftaran Semua Siswa Baru </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background : #ff7f50;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center">Data Pendaftaran Semua Siswa Baru </h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pendaftaran/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pendaftaran'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-success" type="submit"> Cari </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table>
		<style>
		table{
			border-collapse:collapse;
		}
		table, th, td{
			border : 7px inset #ff8c00; text-align: center;
			padding : 5px;
			background : #bdb76b;
		margin-bottom : 2px
		}
		</style>
            <tr>
                <th><center>No</center></th>
		<th><center>NIS</center></th>
		<th><center>ID Panitia</center></th>
		<th><center>Tanggal Dan Jam Pendaftaran</center></th>
		<th><center>Code Progdi</center></th>
		<th><center>Tanggal Dan Jam Pembuatan</center></th>
		<th><center>Code Pembuat</center></th>
		<th><center>Tanggal Dan Jam Pembaharuan</center></th>
		<th><center>Code Pembaharuan</center></th>
		<th><center>Perintah</center></th>
            </tr><?php
            foreach ($pendaftaran_data as $pendaftaran)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pendaftaran->NIS ?></td>
			<td><?php echo $pendaftaran->ID_Panitia ?></td>
			<td><?php echo $pendaftaran->Tanggal_Pendaftaran ?></td>
			<td><?php echo $pendaftaran->Code_Progdi ?></td>
			<td><?php echo $pendaftaran->Pembuatan ?></td>
			<td><?php echo $pendaftaran->Code_Pembuat ?></td>
			<td><?php echo $pendaftaran->Pembaharuan ?></td>
			<td><?php echo $pendaftaran->Code_Pembaharuan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pendaftaran/read/'.$pendaftaran->Id_Pendaftaran),'Buka'); 
				echo ' | '; 
				echo anchor(site_url('pendaftaran/update/'.$pendaftaran->Id_Pendaftaran),'Perbaharui'); 
				echo ' | '; 
				echo anchor(site_url('pendaftaran/delete/'.$pendaftaran->Id_Pendaftaran),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-success">Total Semua : <?php echo $total_rows ?> Data</a>
				<?php echo anchor(site_url('panitia_pendaftaran'),'Panitia Pendaftaran', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('siswa'),'Siswa', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('jurusan'),'Jurusan', 'class="btn btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
              <?php echo anchor(site_url('pendaftaran/create'),'Tambah Baru', 'class="btn btn-success"'); ?>
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
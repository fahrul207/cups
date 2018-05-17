<!doctype html>
<html>
    <head>
        <title> Data Semua Siswa Baru </title>	
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background : #ff7f50;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center"> Data Siswa Baru</h2>
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
                <form action="<?php echo site_url('siswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('siswa'); ?>" class="btn btn-danger">Reset</a>
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
		<th><center>Nama Siswa</center></th>
		<th><center>Jenis Kelamin</center></th>
		<th><center>Alamat</center></th>
		<th><center>Asal Sekolah</center></th>
		<th><center>Code Progdi</center></th>
		<th><center>Tanggal Dan Jam Pembuatan</center></th>
		<th><center>Code Pembuat</center></th>
		<th><center>Tanggal Dan Jam Pembaharuan</center></th>
		<th><center>Code Pembaharuan</center></th>
		<th><center>Perintah</center></th>
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $siswa->Nama_Siswa ?></td>
			<td><?php echo $siswa->Jenis_Kelamin ?></td>
			<td><?php echo $siswa->Alamat ?></td>
			<td><?php echo $siswa->Asal_Sekolah ?></td>
			<td><?php echo $siswa->Code_Progdi ?></td>
			<td><?php echo $siswa->Pembuatan ?></td>
			<td><?php echo $siswa->code_pembuat ?></td>
			<td><?php echo $siswa->Pembaharuan ?></td>
			<td><?php echo $siswa->Code_Pembaharuan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('siswa/read/'.$siswa->NIS),'Buka'); 
				echo ' | '; 
				echo anchor(site_url('siswa/update/'.$siswa->NIS),'Perbaharui'); 
				echo ' | '; 
				echo anchor(site_url('siswa/delete/'.$siswa->NIS),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                <?php echo anchor(site_url('jurusan'),'Jurusan', 'class="btn btn-success"'); ?>
                <?php echo anchor(site_url('panitia_pendaftaran'),'Panitia Pendaftaran', 'class="btn btn-success"'); ?>
                <?php echo anchor(site_url('pendaftaran'),'Pendaftaran', 'class="btn btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
                <?php echo anchor(site_url('siswa/create'),'Tambah Baru', 'class="btn btn-success"'); ?>
            </div>
        </div>
    </body>
</html>
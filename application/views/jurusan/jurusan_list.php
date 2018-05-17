<!doctype html>
<html>
    <head>
        <title> Data Semua Jurusan Siswa Baru </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            background : #ff7f50;
			}
        </style>
    </head>
    <body>
        <h2 style="text-align:center">Jurusan</h2>
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
                <form action="<?php echo site_url('jurusan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('jurusan'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-success" type="submit">Cari</button>
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
		<th><center>Nama Progdi</center></th>
		<th><center>Tanggal Dan Jam Pembuatan</center></th>
		<th><center>Code Pembuat</center></th>
		<th><center>Tanggal Dan Jam Pembaharuan</center></th>
		<th><center>Code Pembaharuan</center></th>
		<th><center>Perintah</center></th>
            </tr><?php
            foreach ($jurusan_data as $jurusan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $jurusan->Nama_Progdi ?></td>
			<td><?php echo $jurusan->Pembuatan ?></td>
			<td><?php echo $jurusan->Code_Pembuat ?></td>
			<td><?php echo $jurusan->Pembaharuan ?></td>
			<td><?php echo $jurusan->Code_Pembaharuan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('jurusan/Read/'.$jurusan->Code_Progdi),'Buka'); 
				echo ' | '; 
				echo anchor(site_url('jurusan/Update/'.$jurusan->Code_Progdi),'Perbaharui'); 
				echo ' | '; 
				echo anchor(site_url('jurusan/Delete/'.$jurusan->Code_Progdi),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
				<?php echo anchor(site_url('pendaftaran'),'Pendaftaran', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('panitia_pendaftaran'),'Panitia Pendaftaran', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('siswa'),'Siswa', 'class="btn btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
			<?php echo anchor(site_url('jurusan/create'),'Tambah Baru', 'class="btn btn-success"'); ?>
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
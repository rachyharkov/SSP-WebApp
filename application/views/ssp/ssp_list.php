<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA SSP</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('ssp/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('ssp/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('ssp/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ssp'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <div class="box-body" style="overflow-x: scroll; ">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kkp Wajib Pajak</th>
		<th>Nama Wp</th>
        <th>NPWP Wp</th>
        <th>Alamat Wp</th>
		<th>Nop</th>
		<th>Alamat Nop</th>
		<th>Tahun Pajak</th>
		<th>Masa Pajak</th>
		<th>Akun Pajak</th>
		<th>Kode Jenis Setoran</th>
		<th>Uraian Pembayaran</th>
		<th>No Ketetapan</th>
		<th>Jumlah Pembayan</th>
		<th>Lokasi Pelaporan</th>
		<th>Tanggal</th>
		<th>Nama Wp Penyetor</th>
		<th>Npwp Wp Penyetor</th>
		<th>Keterangan</th>
		<th>Created</th>
		<th>User Penginput</th>
		<th>Action</th>
            </tr><?php
            foreach ($ssp_data as $ssp)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $ssp->kkp_wajib_pajak ?></td>
			<td><?php echo $ssp->nama_wp ?></td>
            <td><?php echo $ssp->npwp_wp ?></td>
            <td><?php echo $ssp->alamat ?></td>
			<td><?php echo $ssp->nop ?></td>
			<td><?php echo $ssp->alamat_nop ?></td>
			<td><?php echo $ssp->tahun_pajak ?></td>
			<td><?php echo $ssp->masa_pajak ?></td>
			<td><?php echo $ssp->kode_akun_pajak ?></td>
			<td><?php echo $ssp->kode_jenis_setoran ?></td>
			<td><?php echo $ssp->uraian_pembayaran ?></td>
			<td><?php echo $ssp->no_ketetapan ?></td>
			<td><?php echo $ssp->jumlah_pembayan ?></td>
			<td><?php echo $ssp->lokasi_pelaporan ?></td>
			<td><?php echo $ssp->tanggal ?></td>
			<td><?php echo $ssp->nama_wp_penyetor ?></td>
			<td><?php echo $ssp->npwp_wp_penyetor ?></td>
			<td><?php echo $ssp->keterangan ?></td>
			<td><?php echo $ssp->created ?></td>
			<td><?php echo $ssp->user_id ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('ssp/read/'.$ssp->ssp_id),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-success btn-sm"'); 
				echo '  '; 
                echo anchor(site_url('ssp/print/'.$ssp->ssp_id),'<i class="fa fa-print" aria-hidden="true"></i>','class="btn btn-warning btn-sm"'); 
                echo '  '; 
				echo anchor(site_url('ssp/update/'.$ssp->ssp_id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-primary btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('ssp/delete/'.$ssp->ssp_id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA SSP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class="table table-bordered" id="table2">        

	    <tr><td width='200'>Kkp Wajib Pajak <?php echo form_error('kkp_wajib_pajak') ?></td><td><input type="text" class="form-control" name="kkp_wajib_pajak" id="kkp_wajib_pajak" placeholder="Kkp Wajib Pajak" value="<?php echo $kkp_wajib_pajak; ?>" /></td></tr>

	    <tr><td width='200'>Nama Wajib Pajak <?php echo form_error('nama_wp_id') ?></td><td><input type="text" class="form-control" name="nama_wp_ramdan" id="nama_wp_ramdan" placeholder="Nama Wajib Pajak" readonly=""  />

        <input type="hidden" class="form-control" name="nama_wp_id" id="nama_wp_id" placeholder="Nama Wajib Pajak" readonly="" value=""  />
	    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                        <i class="fa fa-search"> Search</i>
                      </button>
                    </span></td></tr>
        <tr><td width='200'>NPWP Wajib Pajak </td><td><input type="text"  readonly="" class="form-control" name="npwp_wp_ramdan" id="npwp_wp_ramdan" placeholder="NPWP Wajib Pajak"  /></td></tr>
        <tr><td width='200'>Alamat </td><td><input type="text"  readonly="" class="form-control" name="alamat_ramdan" id="alamat_ramdan" placeholder="Alamat" " /></td></tr>


	    <tr><td width='200'>Nop <?php echo form_error('nop') ?></td><td><input type="text" class="form-control" name="nop" id="nop" placeholder="Nop" value="<?php echo $nop; ?>" /></td></tr>
	    
        <tr><td width='200'>Alamat Nop <?php echo form_error('alamat_nop') ?></td><td> <textarea class="form-control" rows="3" name="alamat_nop" id="alamat_nop" placeholder="Alamat Nop"><?php echo $alamat_nop; ?></textarea></td></tr>
	    <tr><td width='200'>Tahun Pajak <?php echo form_error('tahun_pajak') ?></td><td><input type="number" class="form-control" name="tahun_pajak" id="tahun_pajak" placeholder="Tahun Pajak" value="<?php echo $tahun_pajak; ?>" /></td></tr>
	    <tr><td width='200'>Masa Pajak <?php echo form_error('masa_pajak') ?></td><td><input type="text" class="form-control" name="masa_pajak" id="masa_pajak" placeholder="Masa Pajak" value="<?php echo $masa_pajak; ?>" /></td></tr>

	    <tr>
            <td width='200'>akun_pajak <?php echo form_error('akun_pajak_id') ?></td>
            <td><select name="akun_pajak_id" class="form-control">
                <option value="">-- Pilih -- </option>
                <?php foreach ($akun_pajak as $key => $data) { ?>
                  <?php if ($akun_pajak_id == $data->akun_pajak_id) { ?>
                    <option value="<?php echo $data->akun_pajak_id ?>" selected><?php echo $data->kode_akun_pajak ?></option>
                  <?php } else { ?>
                    <option value="<?php echo $data->akun_pajak_id ?>"><?php echo $data->kode_akun_pajak ?></option>
                  <?php } ?>
                <?php } ?>
              </select></td>
          </tr>

          <tr>
            <td width='200'>jenis_setoran <?php echo form_error('kode_jenis_setoran_id') ?></td>
            <td><select name="kode_jenis_setoran_id" class="form-control">
                <option value="">-- Pilih -- </option>
                <?php foreach ($jenis_setoran as $key => $data) { ?>
                  <?php if ($kode_jenis_setoran_id == $data->kode_jenis_setoran_id) { ?>
                    <option value="<?php echo $data->kode_jenis_setoran_id ?>" selected><?php echo $data->kode_jenis_setoran ?></option>
                  <?php } else { ?>
                    <option value="<?php echo $data->kode_jenis_setoran_id ?>"><?php echo $data->kode_jenis_setoran ?></option>
                  <?php } ?>
                <?php } ?>
              </select></td>
          </tr>	    
        <tr><td width='200'>Uraian Pembayaran <?php echo form_error('uraian_pembayaran') ?></td><td> <textarea class="form-control" rows="3" name="uraian_pembayaran" id="uraian_pembayaran" placeholder="Uraian Pembayaran"><?php echo $uraian_pembayaran; ?></textarea></td></tr>
	    <tr><td width='200'>No Ketetapan <?php echo form_error('no_ketetapan') ?></td><td><input type="text" class="form-control" name="no_ketetapan" id="no_ketetapan" placeholder="No Ketetapan" value="<?php echo $no_ketetapan; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah Pembayan <?php echo form_error('jumlah_pembayan') ?></td><td><input type="text" class="form-control" name="jumlah_pembayan" id="jumlah_pembayan" placeholder="Jumlah Pembayan" value="<?php echo $jumlah_pembayan; ?>" /></td></tr>
	    <tr><td width='200'>Lokasi Pelaporan <?php echo form_error('lokasi_pelaporan') ?></td><td><input type="text" class="form-control" name="lokasi_pelaporan" id="lokasi_pelaporan" placeholder="Lokasi Pelaporan" value="<?php echo $lokasi_pelaporan; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    <tr><td width='200'>Nama Wp Penyetor <?php echo form_error('nama_wp_penyetor') ?></td><td><input type="text" class="form-control" name="nama_wp_penyetor" id="nama_wp_penyetor" placeholder="Nama Wp Penyetor" value="<?php echo $nama_wp_penyetor; ?>" /></td></tr>
	    <tr><td width='200'>Npwp Wp Penyetor <?php echo form_error('npwp_wp_penyetor') ?></td><td><input type="text" class="form-control" name="npwp_wp_penyetor" id="npwp_wp_penyetor" placeholder="Npwp Wp Penyetor" value="<?php echo $npwp_wp_penyetor; ?>" /></td></tr>
	    
        <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td></tr>
	    <input type="hidden" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?= $this->fungsi->user_login()->name ?>" />



	    <tr><td></td><td><input type="hidden" name="ssp_id" value="<?php echo $ssp_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('ssp') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>


 <div class="modal fade" id="modal-item">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Select Nama Wajib Pajak</h4>
          </div>
          <div class="modal-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>Nama Wajib Pajak</th>
                  <th>NPWP</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($nama_wp as $key => $data) { ?>
                    <tr>
                      <td><?= $data->nama_wp ?></td>
                      <td><?= $data->npwp_wp ?></td>
                      <td><?= $data->alamat ?></td>
                      <td>
                        <button class="btn btn-xs btn-info" id="select"
                          data-id2="<?php echo $data->nama_wp_id ?>"
                          data-nama_wp="<?php echo $data->nama_wp ?>"
                          data-npwp_wp="<?php echo $data->npwp_wp ?>"
                          data-alamat="<?php echo $data->alamat ?>">
                          <i class="fa fa-check"></i> Select
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
                  

                
              </tbody>
            </table>
            
            
          </div>
          
        </div>
      </div>
      
    </div>

     <script>
      $(document).ready(function(){
        $(document).on('click','#select',function(){
          var id2 = $(this).data('id2');
          var nama_wp = $(this).data('nama_wp');
          var npwp_wp = $(this).data('npwp_wp');
          var alamat = $(this).data('alamat');
          $('#nama_wp_id').val(id2);
          $('#nama_wp_ramdan').val(nama_wp);
          $('#npwp_wp_ramdan').val(npwp_wp);
          $('#alamat_ramdan').val(alamat);
          $('#modal-item').modal('hide');
        })
      })
    </script>
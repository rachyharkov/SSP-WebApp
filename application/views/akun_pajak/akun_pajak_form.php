<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA AKUN_PAJAK</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Akun Pajak <?php echo form_error('kode_akun_pajak') ?></td><td><input type="text" class="form-control" name="kode_akun_pajak" id="kode_akun_pajak" placeholder="Kode Akun Pajak" value="<?php echo $kode_akun_pajak; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="akun_pajak_id" value="<?php echo $akun_pajak_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('akun_pajak') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
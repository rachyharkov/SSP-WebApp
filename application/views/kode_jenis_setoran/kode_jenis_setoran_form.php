<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KODE_JENIS_SETORAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Jenis Setoran <?php echo form_error('kode_jenis_setoran') ?></td><td><input type="text" class="form-control" name="kode_jenis_setoran" id="kode_jenis_setoran" placeholder="Kode Jenis Setoran" value="<?php echo $kode_jenis_setoran; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="kode_jenis_setoran_id" value="<?php echo $kode_jenis_setoran_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kode_jenis_setoran') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
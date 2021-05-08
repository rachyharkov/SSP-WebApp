<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA NAMA_WP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Wp <?php echo form_error('nama_wp') ?></td><td><input type="text" class="form-control" name="nama_wp" id="nama_wp" placeholder="Nama Wp" value="<?php echo $nama_wp; ?>" /></td></tr>
	    <tr><td width='200'>Npwp Wp <?php echo form_error('npwp_wp') ?></td><td><input type="text" class="form-control" name="npwp_wp" id="npwp_wp" placeholder="Npwp Wp" value="<?php echo $npwp_wp; ?>" /></td></tr>
	    
        <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="nama_wp_id" value="<?php echo $nama_wp_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('nama_wp') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
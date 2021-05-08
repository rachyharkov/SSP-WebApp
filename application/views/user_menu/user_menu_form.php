<div class="content-wrapper">
<section class="content-header">
      <h1>user_menu
        <small>user_menu Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">user_menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> user_menus</h3>
            <div class="pull-right">
              <a href="<?=site_url('user_menu')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i>Back
              </a>
            </div>
          </div>
          <div class="box-body ">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <form action="<?=site_url('user_menu/process')?>" method="post">
                  <div class="form-group ">
                    <input type="hidden" name="id_ramdan" value="<?=$row->id?>">
                    <label>Nama Menu*</label>
                    <input type="text" name="menu" value="<?=$row->menu?>" class="form-control "required>
                  </div>
                  <div class="form-group ">
                    <label>Icon*</label>
                    <input type="text" name="icon" value="<?=$row->icon?>" class="form-control "required>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="<?=$page?>" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
                    <button type="reset" class="btn btn">Reset</button>
                  </div>
                  <div class="card-footer small text-danger">
                    * Wajib diisi
                  </div>
                </form>
                
              </div>
              
            </div>
            
            
          </div>

    </section>
  </div>
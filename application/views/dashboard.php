<div class="content-wrapper">
<section class="content">
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <marquee direction="left" scrollamount="4" align="center" font-size="50px"><h4>Selamat Datang di Aplikasi SISTEM PENGINPUTAN FORM SURAT SETORAN PAJAK (SSP) - Contact US 083974731480</h4></marquee>
  </div>

<!-- Script Untuk Menampilkan waktu real time -->
<center>

<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat object date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);"> 
  <center>
<h1>              
<span id="clock"></span></h1> 
</center>
<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
  echo "Minggu";
}elseif ($hari=="Monday") {
  echo "Senin";
}elseif ($hari=="Tuesday") {
  echo "Selasa";
}elseif ($hari=="Wednesday") {
  echo "Rabu";
}elseif ($hari=="Thursday") {
  echo("Kamis");
}elseif ($hari=="Friday") {
  echo "Jum'at";
}elseif ($hari=="Saturday") {
  echo "Sabtu";
}
?>,
<?php
$tgl =date('d');
echo $tgl;
$bulan =date('F');
if ($bulan=="January") {
  echo " Januari ";
}elseif ($bulan=="February") {
  echo " Februari ";
}elseif ($bulan=="March") {
  echo " Maret ";
}elseif ($bulan=="April") {
  echo " April ";
}elseif ($bulan=="May") {
  echo " Mei ";
}elseif ($bulan=="June") {
  echo " Juni ";
}elseif ($bulan=="July") {
  echo " Juli ";
}elseif ($bulan=="August") {
  echo " Agustus ";
}elseif ($bulan=="September") {
  echo " September ";
}elseif ($bulan=="October") {
  echo " Oktober ";
}elseif ($bulan=="November") {
  echo " November ";
}elseif ($bulan=="December") {
  echo " Desember ";
}
$tahun=date('Y');
echo $tahun;
?>
</center>

<div class="box-body">
          <div>
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-list"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Akun Pajak</span>
                    <span class="info-box-number"><?=$this->fungsi->count_akun_pajak() ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Jenis Setoran</span>
                    <span class="info-box-number"><?=$this->fungsi->count_jenis_setoran() ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Wajib Pajak</span>
                    <span class="info-box-number"><?=$this->fungsi->count_wajib_pajak() ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">User Aplikasi</span>
                    <span class="info-box-number"><?=$this->fungsi->count_user() ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <br>
            </div>
            <br>
            <br>
            <div class="row">

              <div class="col-md-6">

                
              </div>
            </div>



          </div>
        </div>
</body>
</center>
</section>
 <center >
<div>
  <img style="width: 30%;height: auto;" src="<?php echo base_url(); ?>assets/img/logo.png">
</div>
</center>
</div>




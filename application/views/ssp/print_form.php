
 <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
    
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .gridcontainer {
        display: grid;
        grid-template-columns: 1fr 0.7fr 0.6fr;
        grid-template-rows: repeat(9, auto);
        border: 1px solid black;
    }

    .gridchild {
        border: 1px solid black;
    }

    .box-fill {
        border: 1px solid black;
        padding: 5px;
        width: 10px;
        text-align: center;
    }

    .special-box-fill {
        padding: 5px;
    }

    .table-mp {
        font-size: 11px;
        border-collapse: collapse;
        width: 100%;
    } 
    
    .table-mp tr td,.table-mp tr th {
        border: 2px solid black ;
    }

    body > div > div > div:nth-child(4) > table > tbody > tr > td:nth-child(3) > div.box-fill:nth-child(3) {
        margin-left: 14px;
    }
    body > div > div > div:nth-child(4) > table > tbody > tr > td:nth-child(3) > div.box-fill:nth-child(6) {
        margin-left: 14px;
    }
    body > div > div > div:nth-child(4) > table > tbody > tr > td:nth-child(3) > div.box-fill:nth-child(9) {
        margin-left: 14px;
    }
    body > div > div > div:nth-child(4) > table > tbody > tr > td:nth-child(3) > div.box-fill:nth-child(10) {
        margin-left: 14px;
    }
    body > div > div > div:nth-child(4) > table > tbody > tr > td:nth-child(3) > div.box-fill:nth-child(13) {
        margin-left: 14px;
    }
    

    </style>

</head>

<body id="content" >
    <div style="max-width: 610px; border: 1px solid black;">
        <div class="gridcontainer">
            <div class="gridchild" style="display: flex;">
                <img src="<?php echo base_url()?>assets/images/logokemenkeu.png" style="height: 95px; width: auto;"/>
                <p style="font-size: 12px; text-align: center; margin: auto; font-weight: bold;">DEPARTEMEN KEUANGAN R.I <br>DIREKTORAT JENDERAL PAJAK</p>
            </div>
            <div class="gridchild" style="text-align: center;">
                <h1 style="font-size: 15px; font-weight: bold;">SURAT SETORAN PAJAK</h1>
                <p style="font-size: 31px;
                font-weight: bold;
                margin: 15px 0 11px 0;">(SSP)</p>
            </div>
            <div class="gridchild" style="position: relative;">
                <p style="line-height: 4;
                padding: 0 36px; font-weight: bold;">LEMBAR</p><div style="height: 27px;
                width: 27px;
                border: 4px solid black;
                padding: 3px;
                margin-left: 12px;
                position: absolute;
                font-size: 23px;
                top: 12px;
                right: 15px;
                text-align: center;">1</div>
            </div>
            <div class="gridchild" style="grid-column-start: 1;
            grid-column-end: 4; padding: 23px 19px 12px 19px;">
                <table style="font-size: 11px;">
                    <tr>
                        <td style="width: 85px; font-weight: bold;">NPWP</td>
                        <td>:</td>
                        <td style="display: flex;">
                        <?php $npwpdigits = str_split($npwp_wp); ?>
                            <div class="box-fill"><?php echo $npwpdigits[0] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[1] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[2] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[3] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[4] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[5] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[6] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[7] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[8] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[9] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[10] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[11] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[12] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[13] ?></div>
                            <div class="box-fill"><?php echo $npwpdigits[14] ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px; font-style: italic;" colspan="3">Diisi sesuai dengan Nomor Pokok Wajib Pajak yang dimiliki</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;padding: 13px 0px;"">NAMA WP</td>
                        <td>:</td>
                        <td><?php echo $nama_wp ?></td> 
                    </tr>
                    <tr>
                        <td style="font-weight: bold;"">ALAMAT WP</td>
                        <td>:</td>
                        <td><?php echo $alamat_wp; ?></td> 
                    </tr>
                </table>
            </div>
            <div class="gridchild" style="grid-column-start: 1;
            grid-column-end: 4; padding: 23px 19px 12px 19px;">
                <table style="font-size: 11px;">
                    <tr>
                        <td style="width: 85px; font-weight: bold;">NOP</td>
                        <td>:</td>
                        <td><?php echo $nop; ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px; font-style: italic;" colspan="3">Diisi sesuai dengan Nomor Objek Pajak</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;padding: 13px 0px;"">ALAMAT NOP</td>
                        <td>:</td>
                        <td style="text-decoration: underline dotted;"><?php echo $alamat_nop; ?></td> 
                    </tr>
                </table>
            </div>
            <div class="gridchild" style="display: flex;font-size: 11px; place-content: space-around;    padding: 6px 0;">
                <div style="text-align: center;">
                    <p style="margin: 5px 0">Kode Akun Pajak</p>
                    <div style="display: flex;">
                        <?php $kdakunpajakdigit = str_split($kode_akun_pajak); ?>
                        <div class="box-fill"><?php echo $kdakunpajakdigit[0] ?></div>
                        <div class="box-fill"><?php echo $kdakunpajakdigit[1] ?></div>
                        <div class="box-fill"><?php echo $kdakunpajakdigit[2] ?></div>
                        <div class="box-fill"><?php echo $kdakunpajakdigit[3] ?></div>
                        <div class="box-fill"><?php echo $kdakunpajakdigit[4] ?></div>
                        <div class="box-fill"><?php echo $kdakunpajakdigit[5] ?></div>
                    </div>
                </div>
                <div style="text-align: center;">
                    <p style="margin: 5px 0">Kode Jenis Setoran</p>
                    <div style="display: flex;place-content: center;">
                    <?php $kdjenissetoran = str_split($kode_jenis_setoran); ?>
                        <div class="box-fill"><?php echo $kdjenissetoran[0]; ?></div>
                        <div class="box-fill"><?php echo $kdjenissetoran[1]; ?></div>
                        <div class="box-fill"><?php echo $kdjenissetoran[2]; ?></div>
                    </div>
                </div>
            </div>
            <div class="gridchild" style="grid-column-start: 2;grid-column-end: 4; padding: 10px; font-size: 11px;">
                <p><span style="font-weight: bold;">Uraian Pembayaran </span> <span style="text-decoration: underline dotted;"><?php echo $uraian_pembayaran; ?></span></p>
            </div>
            <div class="gridchild" style="text-align: center;grid-column-start: 1;
            grid-column-end: 3;padding: 0px 7px 5px 7px;">
                <p style="font-size: 11px; font-weight: bold;margin: 4px;">Masa Pajak</p>
                <table class="table-mp" style="height: 80px;">
                    <tr>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Mei</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Ags</th>
                        <th>Sep</th>
                        <th>Okt</th>
                        <th>Nov</th>
                        <th>Des</th>
                    </tr>
                    <tr>
                    <td><?php echo $masa_pajak == 1 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 2 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 3 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 4 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 5 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 6 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 7 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 8 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 9 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 10 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 11 ? 'X' : ''; ?></td>
                    <td><?php echo $masa_pajak == 12 ? 'X' : ''; ?></td>
                    </tr>
                </table>
            </div>
            <div class="gridchild" style="text-align: center;padding: 0px 7px 5px 7px;">
                <p style="font-size: 11px; font-weight: bold;">Tahun Pajak</p>
                <table class="table-mp" style="height: 30px;">
                    <?php $thpajakdigits = str_split($tahun_pajak); ?>
                    <tr>
                        <td><?php echo $thpajakdigits[0]; ?></td>
                        <td><?php echo $thpajakdigits[1]; ?></td>
                        <td><?php echo $thpajakdigits[2]; ?></td>
                        <td><?php echo $thpajakdigits[3]; ?></td>
                    </tr>
                </table>
            </div>
            <div class="gridchild" style="grid-column-start: 1;
            grid-column-end: 4; padding: 23px 19px 12px 19px;">
                <table style="font-size: 11px;">
                    <?php $noketetapandigits = str_split($no_ketetapan); ?>
                    <tr>
                        <td style="width: 85px; font-weight: bold;">Nomor Keterangan</td>
                        <td>:</td>
                        <td style="display: flex;">
                            <div class="box-fill"><?php echo $noketetapandigits[0] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[1] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[2] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[3] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[4] ?></div>
                            <span style="line-height: 2;
                            padding: 0 4px;">/</span>
                            <div class="box-fill"><?php echo $noketetapandigits[5] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[6] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[7] ?></div>
                            <span style="line-height: 2;
                            padding: 0 4px;">/</span>
                            <div class="box-fill"><?php echo $noketetapandigits[8] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[9] ?></div>
                            <span style="line-height: 2;
                            padding: 0 4px;">/</span>
                            <div class="box-fill"><?php echo $noketetapandigits[10] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[11] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[12] ?></div>
                            <span style="line-height: 2;
                            padding: 0 4px;">/</span>
                            <div class="box-fill"><?php echo $noketetapandigits[13] ?></div>
                            <div class="box-fill"><?php echo $noketetapandigits[14] ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px; font-style: italic;" colspan="3">Diisi sesuai Nomor Ketetapan : STP, SKPKB, SKPKBT</td>
                    </tr>
                </table>
            </div>
            <div class="gridchild" style="grid-column-start: 1;
            grid-column-end: 4; padding: 23px 19px 12px 19px;">
            <?php
                $angka = $jumlah_pembayan;
            ?>
                <table style="font-size: 11px; width: 100%;">
                    <tr>
                        <td style="width: 30%; font-weight: bold;">Jumlah Pembayaran</td>
                        <td>:</td>
                        <td>
                            <?php echo rupiah($angka); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Terbilang</td>
                        <td>:</td>
                        <td>
                            <?php echo rupiahterbilang($angka); ?> Rupiah
                        </td>
                    </tr>
                </table>
            </div>
            <div class="gridchild" style="text-align: center;">
                <p style="font-size: 11px; font-weight: bold; margin: 1px;">Diterima oleh Kantor Penerima Pembayaran</p>
                <p style="font-size: 11px; font-weight: bold; margin: 1px;">Tanggal <span style="text-decoration: underline dotted;"><?php echo date('d F Y', strtotime($created)); ?></span></p>
                <p style="font-size: 9px; font-style: italic;">Cap dan tanda tangan</p>
                <p style="font-size: 11px; font-weight: bold; margin: 1px; margin-top: 4em;">Nama Jelas : <span style="text-decoration: underline dotted; font-weight: 600;"><?php echo $nama_wp_penyetor; ?></span></p>
            </div>
            <div class="gridchild" style="grid-column-start: 2;
            grid-column-end: 4;text-align: center;">
                <p style="font-size: 11px; font-weight: bold; margin: 1px;">Wajib Pajak/Penyetor</p>
                <p style="font-size: 11px; font-weight: bold; margin: 1px;">Jakarta, <?php echo date('d F Y', strtotime($tanggal)); ?></p>
                <p style="font-size: 9px; font-style: italic;">Bendahara Pengeluaran</p>
                <p style="font-size: 11px; margin-top: 4em; margin-bottom: 1px;">Sultoni Mubin, S.H.</p>
                <p style="font-size: 11px; font-weight: bold; margin: 1px;">NRP : <span style="font-weight: 300;">21060308080983</span></p>
            </div>
            <div class="gridchild" style="grid-column-start: 1;
            grid-column-end: 4;text-align: center; position: relative;">
                <p style="font-size: 11px; margin-bottom: 2px;">" Terima kasih Telah Membayar Pajak-Pajak Untuk Pembangunan Bangsa "</p>
                <p style="font-size: 11px; font-weight: bold; margin-top: 2px;">Ruang Validasi Kantor Penerima Pembayaran</p>
                <p style="position: absolute; bottom: 2px; left: 2px;font-size: 11px;margin: 0;">F.2.03.NUMBER</p>
            </div>
        </div>
    </div>
    <button id="btnprint">Print this Page</button>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script>
        $(document).ready(function(){
        
            $("#btnprint").click(function(){
                var HTML_Width = $("#content").width();
                var HTML_Height = $("#content").height();
                var top_left_margin = 15;
                var PDF_Width = HTML_Width + (top_left_margin * 2);
                var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
                var canvas_image_width = HTML_Width;
                var canvas_image_height = HTML_Height;

                var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

                html2canvas($("#content")[0]).then(function (canvas) {
                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                    for (var i = 1; i <= totalPDFPages; i++) { 
                        pdf.addPage(PDF_Width, PDF_Height);
                        pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                    }
                    pdf.output('dataurlnewwindow');     //opens the data uri in new window
                    //pdf.save("Your_PDF_Name.pdf");
                });
            })
        });

    </script>
</body>
</html>
<?php
function check_already_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session){
        redirect('dashboard');
    }
}

 function check_access($role_id, $menu_id ){
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('user_sub_menu', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0 ) {
         return "checked='checked'";
    }

 }


 
function is_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session){
        redirect('auth/login');
    }
    // else{
    //     $ci->load->library('fungsi');
    //     $role_id = $ci->fungsi->user_login()->level;
    //     $menu = $ci->uri->segment(1);
    //     $queryMenu = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array();
    //     $menu_id = $queryMenu['menu_id'];
    //     $userAccess = $ci->db->get_where('user_access_menu', ['role_id' =>$role_id, 'menu_id' => $menu_id]);
    //     if ($userAccess->num_rows() < 1) {
    //         redirect('auth/blocked');
    //     }
    // }
}
    

    function check_admin(){
        $ci =& get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level !=1 ){
            redirect('dashboard');

        }

    }

function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function rupiahterbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}

function indo_date($date){
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);
    return $d.'/'.$m.'/'.$y;
}

function generate_pdf($name, $tpl, $data)
{
    $ci = &get_instance();
    $data['data'] = $data;
    $ci->load->view($tpl, $data);
    // Get output html
    $html = $ci->output->get_output();
// add external css library
    //$html .= '<link href="' . base_url() . 'assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    // Load pdf library
    $ci->load->library('pdf');
    $ci->dompdf->loadHtml($html);
    // setup size
    $ci->dompdf->setPaper('A4', 'portrait');
    // Render the HTML as PDF
    $ci->dompdf->render();
    // Output  PDF (1 = download and 0 = preview)
    $ci->dompdf->stream($name, array("Attachment" => 0));
}
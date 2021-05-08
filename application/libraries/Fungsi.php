<?php
Class Fungsi{
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function user_login(){
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

     public function count_user(){
        $this->ci->load->model('user_m');
            return $this->ci->user_m->get()->num_rows();        
    } 

     public function count_akun_pajak(){
        $this->ci->load->model('akun_pajak_model');
            return $this->ci->akun_pajak_model->get()->num_rows();        
    } 

     public function count_jenis_setoran(){
        $this->ci->load->model('kode_jenis_setoran_model');
            return $this->ci->kode_jenis_setoran_model->get()->num_rows();        
    } 

     public function count_wajib_pajak(){
        $this->ci->load->model('nama_wp_model');
            return $this->ci->nama_wp_model->get()->num_rows();        
    } 





}
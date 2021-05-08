<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ssp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ssp_model');
        $this->load->model('akun_pajak_model');
        $this->load->model('kode_jenis_setoran_model');
        $this->load->model('nama_wp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/ssp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/ssp/index/';
            $config['first_url'] = base_url() . 'index.php/ssp/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Ssp_model->total_rows($q);
        $ssp = $this->Ssp_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ssp_data' => $ssp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','ssp/ssp_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ssp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ssp_id' => $row->ssp_id,
		'kkp_wajib_pajak' => $row->kkp_wajib_pajak,
		'nama_wp' => $row->nama_wp,
		'npwp_wp' => $row->npwp_wp,
		'alamat_wp' => $row->alamat,
		'nop' => $row->nop,
		'alamat_nop' => $row->alamat_nop,
		'tahun_pajak' => $row->tahun_pajak,
		'masa_pajak' => $row->masa_pajak,
		'kode_akun_pajak' => $row->kode_akun_pajak,
		'kode_jenis_setoran' => $row->kode_jenis_setoran,
		'uraian_pembayaran' => $row->uraian_pembayaran,
		'no_ketetapan' => $row->no_ketetapan,
		'jumlah_pembayan' => $row->jumlah_pembayan,
		'lokasi_pelaporan' => $row->lokasi_pelaporan,
		'tanggal' => $row->tanggal,
		'nama_wp_penyetor' => $row->nama_wp_penyetor,
		'npwp_wp_penyetor' => $row->npwp_wp_penyetor,
		'keterangan' => $row->keterangan,
		'created' => $row->created,
		'user_id' => $row->user_id,
	    );
            $this->template->load('template','ssp/ssp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ssp'));
        }
    }

    public function create() 
    {
    	$akun_pajak = $this->akun_pajak_model->get_all();
    	$nama_wp = $this->nama_wp_model->get_all();
    	$jenis_setoran = $this->kode_jenis_setoran_model->get_all();
        $data = array(
            'button' => 'Create',
            'akun_pajak' => $akun_pajak,
            'jenis_setoran' => $jenis_setoran,
            'nama_wp' => $nama_wp,
            'action' => site_url('ssp/create_action'),
	    'ssp_id' => set_value('ssp_id'),
	    'kkp_wajib_pajak' => set_value('kkp_wajib_pajak'),
	    'nama_wp_id' => set_value('nama_wp_id'),
	    'nop' => set_value('nop'),
	    'alamat_nop' => set_value('alamat_nop'),
	    'tahun_pajak' => set_value('tahun_pajak'),
	    'masa_pajak' => set_value('masa_pajak'),
	    'akun_pajak_id' => set_value('akun_pajak_id'),
	    'kode_jenis_setoran_id' => set_value('kode_jenis_setoran_id'),
	    'uraian_pembayaran' => set_value('uraian_pembayaran'),
	    'no_ketetapan' => set_value('no_ketetapan'),
	    'jumlah_pembayan' => set_value('jumlah_pembayan'),
	    'lokasi_pelaporan' => set_value('lokasi_pelaporan'),
	    'tanggal' => set_value('tanggal'),
	    'nama_wp_penyetor' => set_value('nama_wp_penyetor'),
	    'npwp_wp_penyetor' => set_value('npwp_wp_penyetor'),
	    'keterangan' => set_value('keterangan'),
	    'user_id' => set_value('user_id'),
	);
        $this->template->load('template','ssp/ssp_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kkp_wajib_pajak' => $this->input->post('kkp_wajib_pajak',TRUE),
		'nama_wp_id' => $this->input->post('nama_wp_id',TRUE),
		'nop' => $this->input->post('nop',TRUE),
		'alamat_nop' => $this->input->post('alamat_nop',TRUE),
		'tahun_pajak' => $this->input->post('tahun_pajak',TRUE),
		'masa_pajak' => $this->input->post('masa_pajak',TRUE),
		'akun_pajak_id' => $this->input->post('akun_pajak_id',TRUE),
		'kode_jenis_setoran_id' => $this->input->post('kode_jenis_setoran_id',TRUE),
		'uraian_pembayaran' => $this->input->post('uraian_pembayaran',TRUE),
		'no_ketetapan' => $this->input->post('no_ketetapan',TRUE),
		'jumlah_pembayan' => $this->input->post('jumlah_pembayan',TRUE),
		'lokasi_pelaporan' => $this->input->post('lokasi_pelaporan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nama_wp_penyetor' => $this->input->post('nama_wp_penyetor',TRUE),
		'npwp_wp_penyetor' => $this->input->post('npwp_wp_penyetor',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Ssp_model->insert($data);
            $this->session->set_flashdata('oke', 'Create Record Success');
            redirect(site_url('ssp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ssp_model->get_by_id($id);
        $nama_wp = $this->nama_wp_model->get_all();
        $akun_pajak = $this->akun_pajak_model->get_all();
    	$jenis_setoran = $this->kode_jenis_setoran_model->get_all();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'akun_pajak' => $akun_pajak,
            	'jenis_setoran' => $jenis_setoran,
            	'nama_wp' => $nama_wp,
                'action' => site_url('ssp/update_action'),
		'ssp_id' => set_value('ssp_id', $row->ssp_id),
		'kkp_wajib_pajak' => set_value('kkp_wajib_pajak', $row->kkp_wajib_pajak),
		'nama_wp_id' => set_value('nama_wp_id', $row->nama_wp_id),
		'nop' => set_value('nop', $row->nop),
		'alamat_nop' => set_value('alamat_nop', $row->alamat_nop),
		'tahun_pajak' => set_value('tahun_pajak', $row->tahun_pajak),
		'masa_pajak' => set_value('masa_pajak', $row->masa_pajak),
		'akun_pajak_id' => set_value('akun_pajak_id', $row->akun_pajak_id),
		'kode_jenis_setoran_id' => set_value('kode_jenis_setoran_id', $row->kode_jenis_setoran_id),
		'uraian_pembayaran' => set_value('uraian_pembayaran', $row->uraian_pembayaran),
		'no_ketetapan' => set_value('no_ketetapan', $row->no_ketetapan),
		'jumlah_pembayan' => set_value('jumlah_pembayan', $row->jumlah_pembayan),
		'lokasi_pelaporan' => set_value('lokasi_pelaporan', $row->lokasi_pelaporan),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nama_wp_penyetor' => set_value('nama_wp_penyetor', $row->nama_wp_penyetor),
		'npwp_wp_penyetor' => set_value('npwp_wp_penyetor', $row->npwp_wp_penyetor),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'user_id' => set_value('user_id', $row->user_id),
	    );
            $this->template->load('template','ssp/ssp_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ssp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ssp_id', TRUE));
        } else {
            $data = array(
		'kkp_wajib_pajak' => $this->input->post('kkp_wajib_pajak',TRUE),
		'nama_wp_id' => $this->input->post('nama_wp_id',TRUE),
		'nop' => $this->input->post('nop',TRUE),
		'alamat_nop' => $this->input->post('alamat_nop',TRUE),
		'tahun_pajak' => $this->input->post('tahun_pajak',TRUE),
		'masa_pajak' => $this->input->post('masa_pajak',TRUE),
		'akun_pajak_id' => $this->input->post('akun_pajak_id',TRUE),
		'kode_jenis_setoran_id' => $this->input->post('kode_jenis_setoran_id',TRUE),
		'uraian_pembayaran' => $this->input->post('uraian_pembayaran',TRUE),
		'no_ketetapan' => $this->input->post('no_ketetapan',TRUE),
		'jumlah_pembayan' => $this->input->post('jumlah_pembayan',TRUE),
		'lokasi_pelaporan' => $this->input->post('lokasi_pelaporan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nama_wp_penyetor' => $this->input->post('nama_wp_penyetor',TRUE),
		'npwp_wp_penyetor' => $this->input->post('npwp_wp_penyetor',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Ssp_model->update($this->input->post('ssp_id', TRUE), $data);
            $this->session->set_flashdata('oke', 'Update Record Success');
            redirect(site_url('ssp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ssp_model->get_by_id($id);

        if ($row) {
            $this->Ssp_model->delete($id);
            $this->session->set_flashdata('oke', 'Delete Record Success');
            redirect(site_url('ssp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ssp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kkp_wajib_pajak', 'kkp wajib pajak', 'trim|required');
	$this->form_validation->set_rules('nama_wp_id', 'nama wp id', 'trim|required');
	$this->form_validation->set_rules('nop', 'nop', 'trim|required');
	$this->form_validation->set_rules('alamat_nop', 'alamat nop', 'trim|required');
	$this->form_validation->set_rules('tahun_pajak', 'tahun pajak', 'trim|required');
	$this->form_validation->set_rules('masa_pajak', 'masa pajak', 'trim|required');
	$this->form_validation->set_rules('akun_pajak_id', 'akun pajak id', 'trim|required');
	$this->form_validation->set_rules('kode_jenis_setoran_id', 'kode jenis setoran id', 'trim|required');
	$this->form_validation->set_rules('uraian_pembayaran', 'uraian pembayaran', 'trim|required');
	$this->form_validation->set_rules('no_ketetapan', 'no ketetapan', 'trim|required');
	$this->form_validation->set_rules('jumlah_pembayan', 'jumlah pembayan', 'trim|required');
	$this->form_validation->set_rules('lokasi_pelaporan', 'lokasi pelaporan', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nama_wp_penyetor', 'nama wp penyetor', 'trim|required');
	$this->form_validation->set_rules('npwp_wp_penyetor', 'npwp wp penyetor', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('ssp_id', 'ssp_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

	public function pdf_preview() 
    {
        $row = $this->Ssp_model->get_by_id($this->input->post('tb_id', TRUE));
        if ($row) {
            $data = array(
			'ssp_id' => $row->ssp_id,
			'kkp_wajib_pajak' => $row->kkp_wajib_pajak,
			'nama_wp' => $row->nama_wp,
			'npwp_wp' => $row->npwp_wp,
			'alamat_wp' => $row->alamat,
			'nop' => $row->nop,
			'alamat_nop' => $row->alamat_nop,
			'tahun_pajak' => $row->tahun_pajak,
			'masa_pajak' => $row->masa_pajak,
			'kode_akun_pajak' => $row->kode_akun_pajak,
			'kode_jenis_setoran' => $row->kode_jenis_setoran,
			'uraian_pembayaran' => $row->uraian_pembayaran,
			'no_ketetapan' => $row->no_ketetapan,
			'jumlah_pembayan' => $row->jumlah_pembayan,
			'lokasi_pelaporan' => $row->lokasi_pelaporan,
			'tanggal' => $row->tanggal,
			'nama_wp_penyetor' => $row->nama_wp_penyetor,
			'npwp_wp_penyetor' => $row->npwp_wp_penyetor,
			'keterangan' => $row->keterangan,
			'created' => $row->created,
			'user_id' => $row->user_id,
			);
			$this->load->view('ssp/print_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ssp'));
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ssp.xls";
        $judul = "ssp";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kkp Wajib Pajak");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wp");
	xlsWriteLabel($tablehead, $kolomhead++, "NPWP Wp");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Wp");
	xlsWriteLabel($tablehead, $kolomhead++, "Nop");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Nop");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Pajak");
	xlsWriteLabel($tablehead, $kolomhead++, "Masa Pajak");
	xlsWriteLabel($tablehead, $kolomhead++, "Akun Pajak");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Jenis Setoran");
	xlsWriteLabel($tablehead, $kolomhead++, "Uraian Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "No Ketetapan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Pembayan");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi Pelaporan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wp Penyetor");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp Wp Penyetor");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "User Penginput");

	foreach ($this->Ssp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kkp_wajib_pajak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp_wp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nop);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_nop);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tahun_pajak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->masa_pajak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_akun_pajak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_jenis_setoran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->uraian_pembayaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_ketetapan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_pembayan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi_pelaporan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wp_penyetor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp_wp_penyetor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ssp.php */
/* Location: ./application/controllers/Ssp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-06 09:22:34 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun_pajak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Akun_pajak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/akun_pajak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/akun_pajak/index/';
            $config['first_url'] = base_url() . 'index.php/akun_pajak/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Akun_pajak_model->total_rows($q);
        $akun_pajak = $this->Akun_pajak_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'akun_pajak_data' => $akun_pajak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','akun_pajak/akun_pajak_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Akun_pajak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'akun_pajak_id' => $row->akun_pajak_id,
		'kode_akun_pajak' => $row->kode_akun_pajak,
	    );
            $this->template->load('template','akun_pajak/akun_pajak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun_pajak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('akun_pajak/create_action'),
	    'akun_pajak_id' => set_value('akun_pajak_id'),
	    'kode_akun_pajak' => set_value('kode_akun_pajak'),
	);
        $this->template->load('template','akun_pajak/akun_pajak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_akun_pajak' => $this->input->post('kode_akun_pajak',TRUE),
	    );

            $this->Akun_pajak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('akun_pajak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Akun_pajak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('akun_pajak/update_action'),
		'akun_pajak_id' => set_value('akun_pajak_id', $row->akun_pajak_id),
		'kode_akun_pajak' => set_value('kode_akun_pajak', $row->kode_akun_pajak),
	    );
            $this->template->load('template','akun_pajak/akun_pajak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun_pajak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('akun_pajak_id', TRUE));
        } else {
            $data = array(
		'kode_akun_pajak' => $this->input->post('kode_akun_pajak',TRUE),
	    );

            $this->Akun_pajak_model->update($this->input->post('akun_pajak_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('akun_pajak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Akun_pajak_model->get_by_id($id);

        if ($row) {
            $this->Akun_pajak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('akun_pajak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun_pajak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_akun_pajak', 'kode akun pajak', 'trim|required');

	$this->form_validation->set_rules('akun_pajak_id', 'akun_pajak_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "akun_pajak.xls";
        $judul = "akun_pajak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Akun Pajak");

	foreach ($this->Akun_pajak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_akun_pajak);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=akun_pajak.doc");

        $data = array(
            'akun_pajak_data' => $this->Akun_pajak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('akun_pajak/akun_pajak_doc',$data);
    }

}

/* End of file Akun_pajak.php */
/* Location: ./application/controllers/Akun_pajak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-06 08:22:45 */
/* http://harviacode.com */
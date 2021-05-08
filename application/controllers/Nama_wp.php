<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nama_wp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Nama_wp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/nama_wp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/nama_wp/index/';
            $config['first_url'] = base_url() . 'index.php/nama_wp/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Nama_wp_model->total_rows($q);
        $nama_wp = $this->Nama_wp_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nama_wp_data' => $nama_wp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','nama_wp/nama_wp_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Nama_wp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nama_wp_id' => $row->nama_wp_id,
		'nama_wp' => $row->nama_wp,
		'npwp_wp' => $row->npwp_wp,
		'alamat' => $row->alamat,
	    );
            $this->template->load('template','nama_wp/nama_wp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nama_wp'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nama_wp/create_action'),
	    'nama_wp_id' => set_value('nama_wp_id'),
	    'nama_wp' => set_value('nama_wp'),
	    'npwp_wp' => set_value('npwp_wp'),
	    'alamat' => set_value('alamat'),
	);
        $this->template->load('template','nama_wp/nama_wp_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_wp' => $this->input->post('nama_wp',TRUE),
		'npwp_wp' => $this->input->post('npwp_wp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Nama_wp_model->insert($data);
            $this->session->set_flashdata('oke', 'Create Record Success 2');
            redirect(site_url('nama_wp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nama_wp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nama_wp/update_action'),
		'nama_wp_id' => set_value('nama_wp_id', $row->nama_wp_id),
		'nama_wp' => set_value('nama_wp', $row->nama_wp),
		'npwp_wp' => set_value('npwp_wp', $row->npwp_wp),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->template->load('template','nama_wp/nama_wp_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nama_wp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nama_wp_id', TRUE));
        } else {
            $data = array(
		'nama_wp' => $this->input->post('nama_wp',TRUE),
		'npwp_wp' => $this->input->post('npwp_wp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Nama_wp_model->update($this->input->post('nama_wp_id', TRUE), $data);
            $this->session->set_flashdata('oke', 'Update Record Success');
            redirect(site_url('nama_wp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nama_wp_model->get_by_id($id);

        if ($row) {
            $this->Nama_wp_model->delete($id);
            $this->session->set_flashdata('oke', 'Delete Record Success');
            redirect(site_url('nama_wp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nama_wp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_wp', 'nama wp', 'trim|required');
	$this->form_validation->set_rules('npwp_wp', 'npwp wp', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('nama_wp_id', 'nama_wp_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nama_wp.xls";
        $judul = "nama_wp";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wp");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp Wp");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");

	foreach ($this->Nama_wp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp_wp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=nama_wp.doc");

        $data = array(
            'nama_wp_data' => $this->Nama_wp_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('nama_wp/nama_wp_doc',$data);
    }

}

/* End of file Nama_wp.php */
/* Location: ./application/controllers/Nama_wp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-06 09:20:14 */
/* http://harviacode.com */
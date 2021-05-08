<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kode_jenis_setoran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kode_jenis_setoran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/kode_jenis_setoran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/kode_jenis_setoran/index/';
            $config['first_url'] = base_url() . 'index.php/kode_jenis_setoran/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Kode_jenis_setoran_model->total_rows($q);
        $kode_jenis_setoran = $this->Kode_jenis_setoran_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kode_jenis_setoran_data' => $kode_jenis_setoran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','kode_jenis_setoran/kode_jenis_setoran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kode_jenis_setoran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode_jenis_setoran_id' => $row->kode_jenis_setoran_id,
		'kode_jenis_setoran' => $row->kode_jenis_setoran,
	    );
            $this->template->load('template','kode_jenis_setoran/kode_jenis_setoran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kode_jenis_setoran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kode_jenis_setoran/create_action'),
	    'kode_jenis_setoran_id' => set_value('kode_jenis_setoran_id'),
	    'kode_jenis_setoran' => set_value('kode_jenis_setoran'),
	);
        $this->template->load('template','kode_jenis_setoran/kode_jenis_setoran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_jenis_setoran' => $this->input->post('kode_jenis_setoran',TRUE),
	    );

            $this->Kode_jenis_setoran_model->insert($data);
            $this->session->set_flashdata('oke', 'Create Record Success');
            redirect(site_url('kode_jenis_setoran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kode_jenis_setoran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kode_jenis_setoran/update_action'),
		'kode_jenis_setoran_id' => set_value('kode_jenis_setoran_id', $row->kode_jenis_setoran_id),
		'kode_jenis_setoran' => set_value('kode_jenis_setoran', $row->kode_jenis_setoran),
	    );
            $this->template->load('template','kode_jenis_setoran/kode_jenis_setoran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kode_jenis_setoran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_jenis_setoran_id', TRUE));
        } else {
            $data = array(
		'kode_jenis_setoran' => $this->input->post('kode_jenis_setoran',TRUE),
	    );

            $this->Kode_jenis_setoran_model->update($this->input->post('kode_jenis_setoran_id', TRUE), $data);
            $this->session->set_flashdata('oke', 'Update Record Success');
            redirect(site_url('kode_jenis_setoran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kode_jenis_setoran_model->get_by_id($id);

        if ($row) {
            $this->Kode_jenis_setoran_model->delete($id);
            $this->session->set_flashdata('oke', 'Delete Record Success');
            redirect(site_url('kode_jenis_setoran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kode_jenis_setoran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_jenis_setoran', 'kode jenis setoran', 'trim|required');

	$this->form_validation->set_rules('kode_jenis_setoran_id', 'kode_jenis_setoran_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kode_jenis_setoran.xls";
        $judul = "kode_jenis_setoran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Jenis Setoran");

	foreach ($this->Kode_jenis_setoran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_jenis_setoran);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kode_jenis_setoran.doc");

        $data = array(
            'kode_jenis_setoran_data' => $this->Kode_jenis_setoran_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kode_jenis_setoran/kode_jenis_setoran_doc',$data);
    }

}

/* End of file Kode_jenis_setoran.php */
/* Location: ./application/controllers/Kode_jenis_setoran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-06 08:22:52 */
/* http://harviacode.com */
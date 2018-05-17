<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jurusan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jurusan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jurusan/index.html';
            $config['first_url'] = base_url() . 'jurusan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jurusan_model->total_rows($q);
        $jurusan = $this->Jurusan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jurusan_data' => $jurusan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jurusan/jurusan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jurusan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Nama_Progdi' => $row->Nama_Progdi,
		'Code_Progdi' => $row->Code_Progdi,
		'Pembuatan' => $row->Pembuatan,
		'Code_Pembuat' => $row->Code_Pembuat,
		'Pembaharuan' => $row->Pembaharuan,
		'Code_Pembaharuan' => $row->Code_Pembaharuan,
	    );
            $this->load->view('jurusan/jurusan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambahkan',
			'tittle' => 'Tambahkan Jurusan Baru',
            'action' => site_url('jurusan/create_action'),
	    'Nama_Progdi' => set_value('Nama_Progdi'),
	    'Code_Progdi' => set_value('Code_Progdi'),
	    'Pembuatan' => set_value('Pembuatan'),
	    'Code_Pembuat' => set_value('Code_Pembuat'),
	    'Pembaharuan' => set_value('Pembaharuan'),
	    'Code_Pembaharuan' => set_value('Code_Pembaharuan'),
	);
        $this->load->view('jurusan/jurusan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama_Progdi' => $this->input->post('Nama_Progdi',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'Code_Pembuat' => $this->input->post('Code_Pembuat',TRUE),
		'Pembaharuan' => $this->input->post('Pembaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Jurusan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jurusan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jurusan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbaharui',
				'tittle' => 'Perbaharui Data Baru',
                'action' => site_url('jurusan/update_action'),
		'Nama_Progdi' => set_value('Nama_Progdi', $row->Nama_Progdi),
		'Code_Progdi' => set_value('Code_Progdi', $row->Code_Progdi),
		'Pembuatan' => set_value('Pembuatan', $row->Pembuatan),
		'Code_Pembuat' => set_value('Code_Pembuat', $row->Code_Pembuat),
		'Pembaharuan' => set_value('Pembaharuan', $row->Pembaharuan),
		'Code_Pembaharuan' => set_value('Code_Pembaharuan', $row->Code_Pembaharuan),
	    );
            $this->load->view('jurusan/jurusan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Code_Progdi', TRUE));
        } else {
            $data = array(
		'Nama_Progdi' => $this->input->post('Nama_Progdi',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'Code_Pembuat' => $this->input->post('Code_Pembuat',TRUE),
		'Pembaharuan' => $this->input->post('Pembaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Jurusan_model->update($this->input->post('Code_Progdi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jurusan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jurusan_model->get_by_id($id);

        if ($row) {
            $this->Jurusan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jurusan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama_Progdi', 'nama progdi', 'trim|required');
	$this->form_validation->set_rules('Pembuatan', 'pembuatan', 'trim|required');
	$this->form_validation->set_rules('Code_Pembuat', 'code pembuat', 'trim|required');
	$this->form_validation->set_rules('Pembaharuan', 'pembaharuan', 'trim|required');
	$this->form_validation->set_rules('Code_Pembaharuan', 'code pembaharuan', 'trim|required');

	$this->form_validation->set_rules('Code_Progdi', 'Code_Progdi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-13 12:05:15 */
/* http://harviacode.com */
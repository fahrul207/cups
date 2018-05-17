<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panitia_pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Panitia_pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'panitia_pendaftaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'panitia_pendaftaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'panitia_pendaftaran/index.html';
            $config['first_url'] = base_url() . 'panitia_pendaftaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Panitia_pendaftaran_model->total_rows($q);
        $panitia_pendaftaran = $this->Panitia_pendaftaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'panitia_pendaftaran_data' => $panitia_pendaftaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('panitia_pendaftaran/panitia_pendaftaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Panitia_pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Panitia' => $row->Id_Panitia,
		'Nama_Panitia' => $row->Nama_Panitia,
		'Jenis_Kelamin' => $row->Jenis_Kelamin,
		'Pembuatan' => $row->Pembuatan,
		'Code_Pembuat' => $row->Code_Pembuat,
		'Pembebaharuan' => $row->Pembebaharuan,
		'Code_Pembaharuan' => $row->Code_Pembaharuan,
	    );
            $this->load->view('panitia_pendaftaran/panitia_pendaftaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panitia_pendaftaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambahkan',
			'tittle' => 'Data Panitia Baru',
            'action' => site_url('panitia_pendaftaran/create_action'),
	    'Id_Panitia' => set_value('Id_Panitia'),
	    'Nama_Panitia' => set_value('Nama_Panitia'),
	    'Jenis_Kelamin' => set_value('Jenis_Kelamin'),
	    'Pembuatan' => set_value('Pembuatan'),
	    'Code_Pembuat' => set_value('Code_Pembuat'),
	    'Pembebaharuan' => set_value('Pembebaharuan'),
	    'Code_Pembaharuan' => set_value('Code_Pembaharuan'),
	);
        $this->load->view('panitia_pendaftaran/panitia_pendaftaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama_Panitia' => $this->input->post('Nama_Panitia',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'Code_Pembuat' => $this->input->post('Code_Pembuat',TRUE),
		'Pembebaharuan' => $this->input->post('Pembebaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Panitia_pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('panitia_pendaftaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Panitia_pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbaharui',
				'tittle' => 'Perbaharui Data',
                'action' => site_url('panitia_pendaftaran/update_action'),
		'Id_Panitia' => set_value('Id_Panitia', $row->Id_Panitia),
		'Nama_Panitia' => set_value('Nama_Panitia', $row->Nama_Panitia),
		'Jenis_Kelamin' => set_value('Jenis_Kelamin', $row->Jenis_Kelamin),
		'Pembuatan' => set_value('Pembuatan', $row->Pembuatan),
		'Code_Pembuat' => set_value('Code_Pembuat', $row->Code_Pembuat),
		'Pembebaharuan' => set_value('Pembebaharuan', $row->Pembebaharuan),
		'Code_Pembaharuan' => set_value('Code_Pembaharuan', $row->Code_Pembaharuan),
	    );
            $this->load->view('panitia_pendaftaran/panitia_pendaftaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panitia_pendaftaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Panitia', TRUE));
        } else {
            $data = array(
		'Nama_Panitia' => $this->input->post('Nama_Panitia',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'Code_Pembuat' => $this->input->post('Code_Pembuat',TRUE),
		'Pembebaharuan' => $this->input->post('Pembebaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Panitia_pendaftaran_model->update($this->input->post('Id_Panitia', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('panitia_pendaftaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Panitia_pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Panitia_pendaftaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('panitia_pendaftaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panitia_pendaftaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama_Panitia', 'nama panitia', 'trim|required');
	$this->form_validation->set_rules('Jenis_Kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('Pembuatan', 'pembuatan', 'trim|required');
	$this->form_validation->set_rules('Code_Pembuat', 'code pembuat', 'trim|required');
	$this->form_validation->set_rules('Pembebaharuan', 'pembebaharuan', 'trim|required');
	$this->form_validation->set_rules('Code_Pembaharuan', 'code pembaharuan', 'trim|required');

	$this->form_validation->set_rules('Id_Panitia', 'Id_Panitia', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Panitia_pendaftaran.php */
/* Location: ./application/controllers/Panitia_pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-13 12:05:15 */
/* http://harviacode.com */
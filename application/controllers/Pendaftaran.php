<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pendaftaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pendaftaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pendaftaran/index.html';
            $config['first_url'] = base_url() . 'pendaftaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pendaftaran_model->total_rows($q);
        $pendaftaran = $this->Pendaftaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pendaftaran_data' => $pendaftaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pendaftaran/pendaftaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Pendaftaran' => $row->Id_Pendaftaran,
		'NIS' => $row->NIS,
		'ID_Panitia' => $row->ID_Panitia,
		'Tanggal_Pendaftaran' => $row->Tanggal_Pendaftaran,
		'Code_Progdi' => $row->Code_Progdi,
		'Pembuatan' => $row->Pembuatan,
		'Code_Pembuat' => $row->Code_Pembuat,
		'Pembaharuan' => $row->Pembaharuan,
		'Code_Pembaharuan' => $row->Code_Pembaharuan,
	    );
            $this->load->view('pendaftaran/pendaftaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambahkan',
			'tittle' => 'Data Pendaftar Baru',
            'action' => site_url('pendaftaran/create_action'),
	    'Id_Pendaftaran' => set_value('Id_Pendaftaran'),
	    'NIS' => set_value('NIS'),
	    'ID_Panitia' => set_value('ID_Panitia'),
	    'Tanggal_Pendaftaran' => set_value('Tanggal_Pendaftaran'),
	    'Code_Progdi' => set_value('Code_Progdi'),
	    'Pembuatan' => set_value('Pembuatan'),
	    'Code_Pembuat' => set_value('Code_Pembuat'),
	    'Pembaharuan' => set_value('Pembaharuan'),
	    'Code_Pembaharuan' => set_value('Code_Pembaharuan'),
	);
        $this->load->view('pendaftaran/pendaftaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NIS' => $this->input->post('NIS',TRUE),
		'ID_Panitia' => $this->input->post('ID_Panitia',TRUE),
		'Tanggal_Pendaftaran' => $this->input->post('Tanggal_Pendaftaran',TRUE),
		'Code_Progdi' => $this->input->post('Code_Progdi',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'Code_Pembuat' => $this->input->post('Code_Pembuat',TRUE),
		'Pembaharuan' => $this->input->post('Pembaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbaharui',
				'tittle' => 'Perbaharui Data',
                'action' => site_url('pendaftaran/update_action'),
		'Id_Pendaftaran' => set_value('Id_Pendaftaran', $row->Id_Pendaftaran),
		'NIS' => set_value('NIS', $row->NIS),
		'ID_Panitia' => set_value('ID_Panitia', $row->ID_Panitia),
		'Tanggal_Pendaftaran' => set_value('Tanggal_Pendaftaran', $row->Tanggal_Pendaftaran),
		'Code_Progdi' => set_value('Code_Progdi', $row->Code_Progdi),
		'Pembuatan' => set_value('Pembuatan', $row->Pembuatan),
		'Code_Pembuat' => set_value('Code_Pembuat', $row->Code_Pembuat),
		'Pembaharuan' => set_value('Pembaharuan', $row->Pembaharuan),
		'Code_Pembaharuan' => set_value('Code_Pembaharuan', $row->Code_Pembaharuan),
	    );
            $this->load->view('pendaftaran/pendaftaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Pendaftaran', TRUE));
        } else {
            $data = array(
		'NIS' => $this->input->post('NIS',TRUE),
		'ID_Panitia' => $this->input->post('ID_Panitia',TRUE),
		'Tanggal_Pendaftaran' => $this->input->post('Tanggal_Pendaftaran',TRUE),
		'Code_Progdi' => $this->input->post('Code_Progdi',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'Code_Pembuat' => $this->input->post('Code_Pembuat',TRUE),
		'Pembaharuan' => $this->input->post('Pembaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Pendaftaran_model->update($this->input->post('Id_Pendaftaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Pendaftaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pendaftaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NIS', 'nis', 'trim|required');
	$this->form_validation->set_rules('ID_Panitia', 'id panitia', 'trim|required');
	$this->form_validation->set_rules('Tanggal_Pendaftaran', 'tanggal pendaftaran', 'trim|required');
	$this->form_validation->set_rules('Code_Progdi', 'code progdi', 'trim|required');
	$this->form_validation->set_rules('Pembuatan', 'pembuatan', 'trim|required');
	$this->form_validation->set_rules('Code_Pembuat', 'code pembuat', 'trim|required');
	$this->form_validation->set_rules('Pembaharuan', 'pembaharuan', 'trim|required');
	$this->form_validation->set_rules('Code_Pembaharuan', 'code pembaharuan', 'trim|required');

	$this->form_validation->set_rules('Id_Pendaftaran', 'Id_Pendaftaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-13 12:05:15 */
/* http://harviacode.com */
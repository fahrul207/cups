<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/index.html';
            $config['first_url'] = base_url() . 'siswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('siswa/siswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'NIS' => $row->NIS,
		'Nama_Siswa' => $row->Nama_Siswa,
		'Jenis_Kelamin' => $row->Jenis_Kelamin,
		'Alamat' => $row->Alamat,
		'Asal_Sekolah' => $row->Asal_Sekolah,
		'Code_Progdi' => $row->Code_Progdi,
		'Pembuatan' => $row->Pembuatan,
		'code_pembuat' => $row->code_pembuat,
		'Pembaharuan' => $row->Pembaharuan,
		'Code_Pembaharuan' => $row->Code_Pembaharuan,
	    );
            $this->load->view('siswa/siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambahkan',
			'tittle' => 'Data Calon Siswa Baru',
            'action' => site_url('siswa/create_action'),
	    'NIS' => set_value('NIS'),
	    'Nama_Siswa' => set_value('Nama_Siswa'),
	    'Jenis_Kelamin' => set_value('Jenis_Kelamin'),
	    'Alamat' => set_value('Alamat'),
	    'Asal_Sekolah' => set_value('Asal_Sekolah'),
	    'Code_Progdi' => set_value('Code_Progdi'),
	    'Pembuatan' => set_value('Pembuatan'),
	    'code_pembuat' => set_value('code_pembuat'),
	    'Pembaharuan' => set_value('Pembaharuan'),
	    'Code_Pembaharuan' => set_value('Code_Pembaharuan'),
	);
        $this->load->view('siswa/siswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama_Siswa' => $this->input->post('Nama_Siswa',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'Asal_Sekolah' => $this->input->post('Asal_Sekolah',TRUE),
		'Code_Progdi' => $this->input->post('Code_Progdi',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'code_pembuat' => $this->input->post('code_pembuat',TRUE),
		'Pembaharuan' => $this->input->post('Pembaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Siswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbaharui',
				'tittle' => 'Perbaharui Data Siswa',
                'action' => site_url('siswa/update_action'),
		'NIS' => set_value('NIS', $row->NIS),
		'Nama_Siswa' => set_value('Nama_Siswa', $row->Nama_Siswa),
		'Jenis_Kelamin' => set_value('Jenis_Kelamin', $row->Jenis_Kelamin),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'Asal_Sekolah' => set_value('Asal_Sekolah', $row->Asal_Sekolah),
		'Code_Progdi' => set_value('Code_Progdi', $row->Code_Progdi),
		'Pembuatan' => set_value('Pembuatan', $row->Pembuatan),
		'code_pembuat' => set_value('code_pembuat', $row->code_pembuat),
		'Pembaharuan' => set_value('Pembaharuan', $row->Pembaharuan),
		'Code_Pembaharuan' => set_value('Code_Pembaharuan', $row->Code_Pembaharuan),
	    );
            $this->load->view('siswa/siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('NIS', TRUE));
        } else {
            $data = array(
		'Nama_Siswa' => $this->input->post('Nama_Siswa',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'Asal_Sekolah' => $this->input->post('Asal_Sekolah',TRUE),
		'Code_Progdi' => $this->input->post('Code_Progdi',TRUE),
		'Pembuatan' => $this->input->post('Pembuatan',TRUE),
		'code_pembuat' => $this->input->post('code_pembuat',TRUE),
		'Pembaharuan' => $this->input->post('Pembaharuan',TRUE),
		'Code_Pembaharuan' => $this->input->post('Code_Pembaharuan',TRUE),
	    );

            $this->Siswa_model->update($this->input->post('NIS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama_Siswa', 'nama siswa', 'trim|required');
	$this->form_validation->set_rules('Jenis_Kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('Asal_Sekolah', 'asal sekolah', 'trim|required');
	$this->form_validation->set_rules('Code_Progdi', 'code progdi', 'trim|required');
	$this->form_validation->set_rules('Pembuatan', 'pembuatan', 'trim|required');
	$this->form_validation->set_rules('code_pembuat', 'code pembuat', 'trim|required');
	$this->form_validation->set_rules('Pembaharuan', 'pembaharuan', 'trim|required');
	$this->form_validation->set_rules('Code_Pembaharuan', 'code pembaharuan', 'trim|required');

	$this->form_validation->set_rules('NIS', 'NIS', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-13 12:05:15 */
/* http://harviacode.com */
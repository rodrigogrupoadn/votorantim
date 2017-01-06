<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permissao_perfil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permissao_perfil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'permissao_perfil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permissao_perfil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permissao_perfil/index.html';
            $config['first_url'] = base_url() . 'permissao_perfil/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permissao_perfil_model->total_rows($q);
        $permissao_perfil = $this->Permissao_perfil_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permissao_perfil_data' => $permissao_perfil,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('permissao_perfil/permissao_perfil_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Permissao_perfil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'permissao' => $row->permissao,
		'perfil_id' => $row->perfil_id,
	    );
            $this->load->view('permissao_perfil/permissao_perfil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permissao_perfil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('permissao_perfil/create_action'),
	    'id' => set_value('id'),
	    'permissao' => set_value('permissao'),
	    'perfil_id' => set_value('perfil_id'),
	);
        $this->load->view('permissao_perfil/permissao_perfil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'permissao' => $this->input->post('permissao',TRUE),
		'perfil_id' => $this->input->post('perfil_id',TRUE),
	    );

            $this->Permissao_perfil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('permissao_perfil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permissao_perfil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permissao_perfil/update_action'),
		'id' => set_value('id', $row->id),
		'permissao' => set_value('permissao', $row->permissao),
		'perfil_id' => set_value('perfil_id', $row->perfil_id),
	    );
            $this->load->view('permissao_perfil/permissao_perfil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permissao_perfil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'permissao' => $this->input->post('permissao',TRUE),
		'perfil_id' => $this->input->post('perfil_id',TRUE),
	    );

            $this->Permissao_perfil_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permissao_perfil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permissao_perfil_model->get_by_id($id);

        if ($row) {
            $this->Permissao_perfil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permissao_perfil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permissao_perfil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('permissao', 'permissao', 'trim|required');
	$this->form_validation->set_rules('perfil_id', 'perfil id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Permissao_perfil.php */
/* Location: ./application/controllers/Permissao_perfil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
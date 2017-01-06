<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perfil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perfil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'perfil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perfil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perfil/index.html';
            $config['first_url'] = base_url() . 'perfil/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perfil_model->total_rows($q);
        $perfil = $this->Perfil_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perfil_data' => $perfil,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('perfil/perfil_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Perfil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'descricao' => $row->descricao,
		'ativo' => $row->ativo,
		'empresa_id' => $row->empresa_id,
	    );
            $this->load->view('perfil/perfil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perfil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perfil/create_action'),
	    'id' => set_value('id'),
	    'descricao' => set_value('descricao'),
	    'ativo' => set_value('ativo'),
	    'empresa_id' => set_value('empresa_id'),
	);
        $this->load->view('perfil/perfil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'descricao' => $this->input->post('descricao',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
	    );

            $this->Perfil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perfil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perfil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perfil/update_action'),
		'id' => set_value('id', $row->id),
		'descricao' => set_value('descricao', $row->descricao),
		'ativo' => set_value('ativo', $row->ativo),
		'empresa_id' => set_value('empresa_id', $row->empresa_id),
	    );
            $this->load->view('perfil/perfil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perfil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'descricao' => $this->input->post('descricao',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
	    );

            $this->Perfil_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perfil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perfil_model->get_by_id($id);

        if ($row) {
            $this->Perfil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perfil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perfil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
	$this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
	$this->form_validation->set_rules('empresa_id', 'empresa id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perfil.php */
/* Location: ./application/controllers/Perfil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
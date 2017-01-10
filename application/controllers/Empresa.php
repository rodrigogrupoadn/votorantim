<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Empresa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'empresa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'empresa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'empresa/index.html';
            $config['first_url'] = base_url() . 'empresa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Empresa_model->total_rows($q);
        $empresa = $this->Empresa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'empresa_data' => $empresa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('empresa/empresa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Empresa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'razao_social' => $row->razao_social,
		'cnpj' => $row->cnpj,
		'email' => $row->email,
		'ddd1' => $row->ddd1,
		'telefone1' => $row->telefone1,
		'ddd2' => $row->ddd2,
		'endereco' => $row->endereco,
		'representante' => $row->representante,
		'contato' => $row->contato,
	    );
            $this->load->view('empresa/empresa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Cadastro não foi encontrado');
            redirect(site_url('empresa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('empresa/create_action'),
	    'id' => set_value('id'),
	    'razao_social' => set_value('razao_social'),
	    'cnpj' => set_value('cnpj'),
	    'email' => set_value('email'),
	    'ddd1' => set_value('ddd1'),
	    'telefone1' => set_value('telefone1'),
	    'ddd2' => set_value('ddd2'),
	    'endereco' => set_value('endereco'),
	    'representante' => set_value('representante'),
	    'contato' => set_value('contato'),
	);
        $this->load->view('empresa/empresa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'razao_social' => $this->input->post('razao_social',TRUE),
		'cnpj' => $this->input->post('cnpj',TRUE),
		'email' => $this->input->post('email',TRUE),
		'ddd1' => $this->input->post('ddd1',TRUE),
		'telefone1' => $this->input->post('telefone1',TRUE),
		'ddd2' => $this->input->post('ddd2',TRUE),
		'endereco' => $this->input->post('endereco',TRUE),
		'representante' => $this->input->post('representante',TRUE),
		'contato' => $this->input->post('contato',TRUE),
	    );

            $this->Empresa_model->insert($data);
            $this->session->set_flashdata('message', 'Cadastro deletado com sucesso');
            redirect(site_url('empresa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Empresa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('empresa/update_action'),
		'id' => set_value('id', $row->id),
		'razao_social' => set_value('razao_social', $row->razao_social),
		'cnpj' => set_value('cnpj', $row->cnpj),
		'email' => set_value('email', $row->email),
		'ddd1' => set_value('ddd1', $row->ddd1),
		'telefone1' => set_value('telefone1', $row->telefone1),
		'ddd2' => set_value('ddd2', $row->ddd2),
		'endereco' => set_value('endereco', $row->endereco),
		'representante' => set_value('representante', $row->representante),
		'contato' => set_value('contato', $row->contato),
	    );
            $this->load->view('empresa/empresa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Cadastro não encontrado');
            redirect(site_url('empresa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'razao_social' => $this->input->post('razao_social',TRUE),
		'cnpj' => $this->input->post('cnpj',TRUE),
		'email' => $this->input->post('email',TRUE),
		'ddd1' => $this->input->post('ddd1',TRUE),
		'telefone1' => $this->input->post('telefone1',TRUE),
		'ddd2' => $this->input->post('ddd2',TRUE),
		'endereco' => $this->input->post('endereco',TRUE),
		'representante' => $this->input->post('representante',TRUE),
		'contato' => $this->input->post('contato',TRUE),
	    );

            $this->Empresa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Cadastro atualizado com sucesso');
            redirect(site_url('empresa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Empresa_model->get_by_id($id);

        if ($row) {
            $this->Empresa_model->delete($id);
            $this->session->set_flashdata('message', 'Cadastro deletado com sucesso');
            redirect(site_url('empresa'));
        } else {
            $this->session->set_flashdata('message', 'Cadastro não encontrado');
            redirect(site_url('empresa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('razao_social', 'razao social', 'trim|required');
	$this->form_validation->set_rules('cnpj', 'cnpj', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('ddd1', 'ddd1', 'trim|required');
	$this->form_validation->set_rules('telefone1', 'telefone1', 'trim|required');
	$this->form_validation->set_rules('ddd2', 'ddd2', 'trim|required');
	$this->form_validation->set_rules('endereco', 'endereco', 'trim|required');
	$this->form_validation->set_rules('representante', 'representante', 'trim|required');
	$this->form_validation->set_rules('contato', 'contato', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Empresa.php */
/* Location: ./application/controllers/Empresa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
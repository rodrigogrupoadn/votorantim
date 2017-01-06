<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fornecedor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fornecedor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'fornecedor/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fornecedor/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fornecedor/index.html';
            $config['first_url'] = base_url() . 'fornecedor/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fornecedor_model->total_rows($q);
        $fornecedor = $this->Fornecedor_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fornecedor_data' => $fornecedor,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('fornecedor/fornecedor_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Fornecedor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'razao_social' => $row->razao_social,
		'cnpj' => $row->cnpj,
		'ddd1' => $row->ddd1,
		'telefone1' => $row->telefone1,
		'ddd2' => $row->ddd2,
		'telefone2' => $row->telefone2,
		'email' => $row->email,
		'ativo' => $row->ativo,
		'empresa_id' => $row->empresa_id,
	    );
            $this->load->view('fornecedor/fornecedor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fornecedor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fornecedor/create_action'),
	    'id' => set_value('id'),
	    'razao_social' => set_value('razao_social'),
	    'cnpj' => set_value('cnpj'),
	    'ddd1' => set_value('ddd1'),
	    'telefone1' => set_value('telefone1'),
	    'ddd2' => set_value('ddd2'),
	    'telefone2' => set_value('telefone2'),
	    'email' => set_value('email'),
	    'ativo' => set_value('ativo'),
	    'empresa_id' => set_value('empresa_id'),
	);
        $this->load->view('fornecedor/fornecedor_form', $data);
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
		'ddd1' => $this->input->post('ddd1',TRUE),
		'telefone1' => $this->input->post('telefone1',TRUE),
		'ddd2' => $this->input->post('ddd2',TRUE),
		'telefone2' => $this->input->post('telefone2',TRUE),
		'email' => $this->input->post('email',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
	    );

            $this->Fornecedor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fornecedor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fornecedor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fornecedor/update_action'),
		'id' => set_value('id', $row->id),
		'razao_social' => set_value('razao_social', $row->razao_social),
		'cnpj' => set_value('cnpj', $row->cnpj),
		'ddd1' => set_value('ddd1', $row->ddd1),
		'telefone1' => set_value('telefone1', $row->telefone1),
		'ddd2' => set_value('ddd2', $row->ddd2),
		'telefone2' => set_value('telefone2', $row->telefone2),
		'email' => set_value('email', $row->email),
		'ativo' => set_value('ativo', $row->ativo),
		'empresa_id' => set_value('empresa_id', $row->empresa_id),
	    );
            $this->load->view('fornecedor/fornecedor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fornecedor'));
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
		'ddd1' => $this->input->post('ddd1',TRUE),
		'telefone1' => $this->input->post('telefone1',TRUE),
		'ddd2' => $this->input->post('ddd2',TRUE),
		'telefone2' => $this->input->post('telefone2',TRUE),
		'email' => $this->input->post('email',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
	    );

            $this->Fornecedor_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fornecedor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Fornecedor_model->get_by_id($id);

        if ($row) {
            $this->Fornecedor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fornecedor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fornecedor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('razao_social', 'razao social', 'trim|required');
	$this->form_validation->set_rules('cnpj', 'cnpj', 'trim|required');
	$this->form_validation->set_rules('ddd1', 'ddd1', 'trim|required');
	$this->form_validation->set_rules('telefone1', 'telefone1', 'trim|required');
	$this->form_validation->set_rules('ddd2', 'ddd2', 'trim|required');
	$this->form_validation->set_rules('telefone2', 'telefone2', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
	$this->form_validation->set_rules('empresa_id', 'empresa id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Fornecedor.php */
/* Location: ./application/controllers/Fornecedor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contato extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contato_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'contato/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contato/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contato/index.html';
            $config['first_url'] = base_url() . 'contato/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Contato_model->total_rows($q);
        $contato = $this->Contato_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'contato_data' => $contato,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('contato/contato_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Contato_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nome' => $row->nome,
		'ramal' => $row->ramal,
		'setor' => $row->setor,
		'ativo' => $row->ativo,
		'fornecedor_id' => $row->fornecedor_id,
	    );
            $this->load->view('contato/contato_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contato'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('contato/create_action'),
	    'id' => set_value('id'),
	    'nome' => set_value('nome'),
	    'ramal' => set_value('ramal'),
	    'setor' => set_value('setor'),
	    'ativo' => set_value('ativo'),
	    'fornecedor_id' => set_value('fornecedor_id'),
	);
        $this->load->view('contato/contato_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nome' => $this->input->post('nome',TRUE),
		'ramal' => $this->input->post('ramal',TRUE),
		'setor' => $this->input->post('setor',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'fornecedor_id' => $this->input->post('fornecedor_id',TRUE),
	    );

            $this->Contato_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contato'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Contato_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('contato/update_action'),
		'id' => set_value('id', $row->id),
		'nome' => set_value('nome', $row->nome),
		'ramal' => set_value('ramal', $row->ramal),
		'setor' => set_value('setor', $row->setor),
		'ativo' => set_value('ativo', $row->ativo),
		'fornecedor_id' => set_value('fornecedor_id', $row->fornecedor_id),
	    );
            $this->load->view('contato/contato_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contato'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nome' => $this->input->post('nome',TRUE),
		'ramal' => $this->input->post('ramal',TRUE),
		'setor' => $this->input->post('setor',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'fornecedor_id' => $this->input->post('fornecedor_id',TRUE),
	    );

            $this->Contato_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contato'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Contato_model->get_by_id($id);

        if ($row) {
            $this->Contato_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contato'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contato'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nome', 'nome', 'trim|required');
	$this->form_validation->set_rules('ramal', 'ramal', 'trim|required');
	$this->form_validation->set_rules('setor', 'setor', 'trim|required');
	$this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
	$this->form_validation->set_rules('fornecedor_id', 'fornecedor id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Contato.php */
/* Location: ./application/controllers/Contato.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
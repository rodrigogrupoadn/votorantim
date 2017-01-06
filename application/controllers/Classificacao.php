<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Classificacao extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Classificacao_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'classificacao/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'classificacao/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'classificacao/index.html';
            $config['first_url'] = base_url() . 'classificacao/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Classificacao_model->total_rows($q);
        $classificacao = $this->Classificacao_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'classificacao_data' => $classificacao,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('classificacao/classificacao_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Classificacao_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'classificacao' => $row->classificacao,
		'usuario_id' => $row->usuario_id,
		'fornecedor_id' => $row->fornecedor_id,
	    );
            $this->load->view('classificacao/classificacao_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('classificacao'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('classificacao/create_action'),
	    'id' => set_value('id'),
	    'classificacao' => set_value('classificacao'),
	    'usuario_id' => set_value('usuario_id'),
	    'fornecedor_id' => set_value('fornecedor_id'),
	);
        $this->load->view('classificacao/classificacao_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'classificacao' => $this->input->post('classificacao',TRUE),
		'usuario_id' => $this->input->post('usuario_id',TRUE),
		'fornecedor_id' => $this->input->post('fornecedor_id',TRUE),
	    );

            $this->Classificacao_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('classificacao'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Classificacao_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('classificacao/update_action'),
		'id' => set_value('id', $row->id),
		'classificacao' => set_value('classificacao', $row->classificacao),
		'usuario_id' => set_value('usuario_id', $row->usuario_id),
		'fornecedor_id' => set_value('fornecedor_id', $row->fornecedor_id),
	    );
            $this->load->view('classificacao/classificacao_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('classificacao'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'classificacao' => $this->input->post('classificacao',TRUE),
		'usuario_id' => $this->input->post('usuario_id',TRUE),
		'fornecedor_id' => $this->input->post('fornecedor_id',TRUE),
	    );

            $this->Classificacao_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('classificacao'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Classificacao_model->get_by_id($id);

        if ($row) {
            $this->Classificacao_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('classificacao'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('classificacao'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('classificacao', 'classificacao', 'trim|required');
	$this->form_validation->set_rules('usuario_id', 'usuario id', 'trim|required');
	$this->form_validation->set_rules('fornecedor_id', 'fornecedor id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Classificacao.php */
/* Location: ./application/controllers/Classificacao.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Obra extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Obra_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'obra/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'obra/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'obra/index.html';
            $config['first_url'] = base_url() . 'obra/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Obra_model->total_rows($q);
        $obra = $this->Obra_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'obra_data' => $obra,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('obra/obra_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Obra_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nome' => $row->nome,
		'endereco' => $row->endereco,
		'data_inicio' => $row->data_inicio,
		'data_previsao' => $row->data_previsao,
		'ativo' => $row->ativo,
		'id_eng_resp' => $row->id_eng_resp,
		'empresa_id' => $row->empresa_id,
	    );
            $this->load->view('obra/obra_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obra'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('obra/create_action'),
	    'id' => set_value('id'),
	    'nome' => set_value('nome'),
	    'endereco' => set_value('endereco'),
	    'data_inicio' => set_value('data_inicio'),
	    'data_previsao' => set_value('data_previsao'),
	    'ativo' => set_value('ativo'),
	    'id_eng_resp' => set_value('id_eng_resp'),
	    'empresa_id' => set_value('empresa_id'),
	);
        $this->load->view('obra/obra_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nome' => $this->input->post('nome',TRUE),
		'endereco' => $this->input->post('endereco',TRUE),
		'data_inicio' => $this->input->post('data_inicio',TRUE),
		'data_previsao' => $this->input->post('data_previsao',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'id_eng_resp' => $this->input->post('id_eng_resp',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
	    );

            $this->Obra_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('obra'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Obra_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('obra/update_action'),
		'id' => set_value('id', $row->id),
		'nome' => set_value('nome', $row->nome),
		'endereco' => set_value('endereco', $row->endereco),
		'data_inicio' => set_value('data_inicio', $row->data_inicio),
		'data_previsao' => set_value('data_previsao', $row->data_previsao),
		'ativo' => set_value('ativo', $row->ativo),
		'id_eng_resp' => set_value('id_eng_resp', $row->id_eng_resp),
		'empresa_id' => set_value('empresa_id', $row->empresa_id),
	    );
            $this->load->view('obra/obra_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obra'));
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
		'endereco' => $this->input->post('endereco',TRUE),
		'data_inicio' => $this->input->post('data_inicio',TRUE),
		'data_previsao' => $this->input->post('data_previsao',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'id_eng_resp' => $this->input->post('id_eng_resp',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
	    );

            $this->Obra_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('obra'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Obra_model->get_by_id($id);

        if ($row) {
            $this->Obra_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('obra'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obra'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nome', 'nome', 'trim|required');
	$this->form_validation->set_rules('endereco', 'endereco', 'trim|required');
	$this->form_validation->set_rules('data_inicio', 'data inicio', 'trim|required');
	$this->form_validation->set_rules('data_previsao', 'data previsao', 'trim|required');
	$this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
	$this->form_validation->set_rules('id_eng_resp', 'id eng resp', 'trim|required');
	$this->form_validation->set_rules('empresa_id', 'empresa id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Obra.php */
/* Location: ./application/controllers/Obra.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
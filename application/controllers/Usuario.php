<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'usuario/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'usuario/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'usuario/index.html';
            $config['first_url'] = base_url() . 'usuario/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Usuario_model->total_rows($q);
        $usuario = $this->Usuario_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'usuario_data' => $usuario,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('usuario/usuario_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Usuario_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nome' => $row->nome,
		'email' => $row->email,
		'senha' => $row->senha,
		'cargo' => $row->cargo,
		'departamento' => $row->departamento,
		'ddd1' => $row->ddd1,
		'telefone1' => $row->telefone1,
		'ddd2' => $row->ddd2,
		'telefone2' => $row->telefone2,
		'chat_ativo' => $row->chat_ativo,
		'ativo' => $row->ativo,
		'empresa_id' => $row->empresa_id,
		'perfil_id' => $row->perfil_id,
	    );
            $this->load->view('usuario/usuario_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuario'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('usuario/create_action'),
	    'id' => set_value('id'),
	    'nome' => set_value('nome'),
	    'email' => set_value('email'),
	    'senha' => set_value('senha'),
	    'cargo' => set_value('cargo'),
	    'departamento' => set_value('departamento'),
	    'ddd1' => set_value('ddd1'),
	    'telefone1' => set_value('telefone1'),
	    'ddd2' => set_value('ddd2'),
	    'telefone2' => set_value('telefone2'),
	    'chat_ativo' => set_value('chat_ativo'),
	    'ativo' => set_value('ativo'),
	    'empresa_id' => set_value('empresa_id'),
	    'perfil_id' => set_value('perfil_id'),
	);
        $this->load->view('usuario/usuario_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nome' => $this->input->post('nome',TRUE),
		'email' => $this->input->post('email',TRUE),
		'senha' => $this->input->post('senha',TRUE),
		'cargo' => $this->input->post('cargo',TRUE),
		'departamento' => $this->input->post('departamento',TRUE),
		'ddd1' => $this->input->post('ddd1',TRUE),
		'telefone1' => $this->input->post('telefone1',TRUE),
		'ddd2' => $this->input->post('ddd2',TRUE),
		'telefone2' => $this->input->post('telefone2',TRUE),
		'chat_ativo' => $this->input->post('chat_ativo',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
		'perfil_id' => $this->input->post('perfil_id',TRUE),
	    );

            $this->Usuario_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usuario'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Usuario_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('usuario/update_action'),
		'id' => set_value('id', $row->id),
		'nome' => set_value('nome', $row->nome),
		'email' => set_value('email', $row->email),
		'senha' => set_value('senha', $row->senha),
		'cargo' => set_value('cargo', $row->cargo),
		'departamento' => set_value('departamento', $row->departamento),
		'ddd1' => set_value('ddd1', $row->ddd1),
		'telefone1' => set_value('telefone1', $row->telefone1),
		'ddd2' => set_value('ddd2', $row->ddd2),
		'telefone2' => set_value('telefone2', $row->telefone2),
		'chat_ativo' => set_value('chat_ativo', $row->chat_ativo),
		'ativo' => set_value('ativo', $row->ativo),
		'empresa_id' => set_value('empresa_id', $row->empresa_id),
		'perfil_id' => set_value('perfil_id', $row->perfil_id),
	    );
            $this->load->view('usuario/usuario_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuario'));
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
		'email' => $this->input->post('email',TRUE),
		'senha' => $this->input->post('senha',TRUE),
		'cargo' => $this->input->post('cargo',TRUE),
		'departamento' => $this->input->post('departamento',TRUE),
		'ddd1' => $this->input->post('ddd1',TRUE),
		'telefone1' => $this->input->post('telefone1',TRUE),
		'ddd2' => $this->input->post('ddd2',TRUE),
		'telefone2' => $this->input->post('telefone2',TRUE),
		'chat_ativo' => $this->input->post('chat_ativo',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
		'perfil_id' => $this->input->post('perfil_id',TRUE),
	    );

            $this->Usuario_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            
            redirect(site_url('usuario'));
            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Usuario_model->get_by_id($id);

        if ($row) {
            $this->Usuario_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usuario'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuario'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nome', 'nome', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('senha', 'senha', 'trim|required');
	$this->form_validation->set_rules('cargo', 'cargo', 'trim|required');
	$this->form_validation->set_rules('departamento', 'departamento', 'trim|required');
	$this->form_validation->set_rules('ddd1', 'ddd1', 'trim|required');
	$this->form_validation->set_rules('telefone1', 'telefone1', 'trim|required');
	$this->form_validation->set_rules('ddd2', 'ddd2', 'trim|required');
	$this->form_validation->set_rules('telefone2', 'telefone2', 'trim|required');
	$this->form_validation->set_rules('chat_ativo', 'chat ativo', 'trim|required');
	$this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
	$this->form_validation->set_rules('empresa_id', 'empresa id', 'trim|required');
	$this->form_validation->set_rules('perfil_id', 'perfil id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
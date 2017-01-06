<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_publicitario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_publicitario_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'post_publicitario/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'post_publicitario/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'post_publicitario/index.html';
            $config['first_url'] = base_url() . 'post_publicitario/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Post_publicitario_model->total_rows($q);
        $post_publicitario = $this->Post_publicitario_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'post_publicitario_data' => $post_publicitario,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('post_publicitario/post_publicitario_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Post_publicitario_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nome' => $row->nome,
		'data_criacao' => $row->data_criacao,
		'foto' => $row->foto,
		'texto' => $row->texto,
		'ativo' => $row->ativo,
		'largura_foto' => $row->largura_foto,
		'altura_foto' => $row->altura_foto,
		'id_usuario_criadro' => $row->id_usuario_criadro,
	    );
            $this->load->view('post_publicitario/post_publicitario_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post_publicitario'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('post_publicitario/create_action'),
	    'id' => set_value('id'),
	    'nome' => set_value('nome'),
	    'data_criacao' => set_value('data_criacao'),
	    'foto' => set_value('foto'),
	    'texto' => set_value('texto'),
	    'ativo' => set_value('ativo'),
	    'largura_foto' => set_value('largura_foto'),
	    'altura_foto' => set_value('altura_foto'),
	    'id_usuario_criadro' => set_value('id_usuario_criadro'),
	);
        $this->load->view('post_publicitario/post_publicitario_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nome' => $this->input->post('nome',TRUE),
		'data_criacao' => $this->input->post('data_criacao',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'texto' => $this->input->post('texto',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'largura_foto' => $this->input->post('largura_foto',TRUE),
		'altura_foto' => $this->input->post('altura_foto',TRUE),
		'id_usuario_criadro' => $this->input->post('id_usuario_criadro',TRUE),
	    );

            $this->Post_publicitario_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('post_publicitario'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Post_publicitario_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('post_publicitario/update_action'),
		'id' => set_value('id', $row->id),
		'nome' => set_value('nome', $row->nome),
		'data_criacao' => set_value('data_criacao', $row->data_criacao),
		'foto' => set_value('foto', $row->foto),
		'texto' => set_value('texto', $row->texto),
		'ativo' => set_value('ativo', $row->ativo),
		'largura_foto' => set_value('largura_foto', $row->largura_foto),
		'altura_foto' => set_value('altura_foto', $row->altura_foto),
		'id_usuario_criadro' => set_value('id_usuario_criadro', $row->id_usuario_criadro),
	    );
            $this->load->view('post_publicitario/post_publicitario_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post_publicitario'));
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
		'data_criacao' => $this->input->post('data_criacao',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'texto' => $this->input->post('texto',TRUE),
		'ativo' => $this->input->post('ativo',TRUE),
		'largura_foto' => $this->input->post('largura_foto',TRUE),
		'altura_foto' => $this->input->post('altura_foto',TRUE),
		'id_usuario_criadro' => $this->input->post('id_usuario_criadro',TRUE),
	    );

            $this->Post_publicitario_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('post_publicitario'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Post_publicitario_model->get_by_id($id);

        if ($row) {
            $this->Post_publicitario_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('post_publicitario'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post_publicitario'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nome', 'nome', 'trim|required');
	$this->form_validation->set_rules('data_criacao', 'data criacao', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('texto', 'texto', 'trim|required');
	$this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
	$this->form_validation->set_rules('largura_foto', 'largura foto', 'trim|required');
	$this->form_validation->set_rules('altura_foto', 'altura foto', 'trim|required');
	$this->form_validation->set_rules('id_usuario_criadro', 'id usuario criadro', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Post_publicitario.php */
/* Location: ./application/controllers/Post_publicitario.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
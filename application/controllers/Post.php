<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'post/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'post/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'post/index.html';
            $config['first_url'] = base_url() . 'post/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Post_model->total_rows($q);
        $post = $this->Post_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'post_data' => $post,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('post/post_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Post_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'texto' => $row->texto,
		'data_criacao' => $row->data_criacao,
		'largura_foto' => $row->largura_foto,
		'altura_foto' => $row->altura_foto,
		'usuario_id' => $row->usuario_id,
		'fase_obra_id' => $row->fase_obra_id,
		'empresa_id' => $row->empresa_id,
		'obra_id' => $row->obra_id,
		'grupo_material_obra_id' => $row->grupo_material_obra_id,
	    );
            $this->load->view('post/post_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('post/create_action'),
	    'id' => set_value('id'),
	    'texto' => set_value('texto'),
	    'data_criacao' => set_value('data_criacao'),
	    'largura_foto' => set_value('largura_foto'),
	    'altura_foto' => set_value('altura_foto'),
	    'usuario_id' => set_value('usuario_id'),
	    'fase_obra_id' => set_value('fase_obra_id'),
	    'empresa_id' => set_value('empresa_id'),
	    'obra_id' => set_value('obra_id'),
	    'grupo_material_obra_id' => set_value('grupo_material_obra_id'),
	);
        $this->load->view('post/post_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'texto' => $this->input->post('texto',TRUE),
		'data_criacao' => $this->input->post('data_criacao',TRUE),
		'largura_foto' => $this->input->post('largura_foto',TRUE),
		'altura_foto' => $this->input->post('altura_foto',TRUE),
		'usuario_id' => $this->input->post('usuario_id',TRUE),
		'fase_obra_id' => $this->input->post('fase_obra_id',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
		'obra_id' => $this->input->post('obra_id',TRUE),
		'grupo_material_obra_id' => $this->input->post('grupo_material_obra_id',TRUE),
	    );

            $this->Post_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('post'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('post/update_action'),
		'id' => set_value('id', $row->id),
		'texto' => set_value('texto', $row->texto),
		'data_criacao' => set_value('data_criacao', $row->data_criacao),
		'largura_foto' => set_value('largura_foto', $row->largura_foto),
		'altura_foto' => set_value('altura_foto', $row->altura_foto),
		'usuario_id' => set_value('usuario_id', $row->usuario_id),
		'fase_obra_id' => set_value('fase_obra_id', $row->fase_obra_id),
		'empresa_id' => set_value('empresa_id', $row->empresa_id),
		'obra_id' => set_value('obra_id', $row->obra_id),
		'grupo_material_obra_id' => set_value('grupo_material_obra_id', $row->grupo_material_obra_id),
	    );
            $this->load->view('post/post_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'texto' => $this->input->post('texto',TRUE),
		'data_criacao' => $this->input->post('data_criacao',TRUE),
		'largura_foto' => $this->input->post('largura_foto',TRUE),
		'altura_foto' => $this->input->post('altura_foto',TRUE),
		'usuario_id' => $this->input->post('usuario_id',TRUE),
		'fase_obra_id' => $this->input->post('fase_obra_id',TRUE),
		'empresa_id' => $this->input->post('empresa_id',TRUE),
		'obra_id' => $this->input->post('obra_id',TRUE),
		'grupo_material_obra_id' => $this->input->post('grupo_material_obra_id',TRUE),
	    );

            $this->Post_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('post'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $this->Post_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('post'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('texto', 'texto', 'trim|required');
	$this->form_validation->set_rules('data_criacao', 'data criacao', 'trim|required');
	$this->form_validation->set_rules('largura_foto', 'largura foto', 'trim|required');
	$this->form_validation->set_rules('altura_foto', 'altura foto', 'trim|required');
	$this->form_validation->set_rules('usuario_id', 'usuario id', 'trim|required');
	$this->form_validation->set_rules('fase_obra_id', 'fase obra id', 'trim|required');
	$this->form_validation->set_rules('empresa_id', 'empresa id', 'trim|required');
	$this->form_validation->set_rules('obra_id', 'obra id', 'trim|required');
	$this->form_validation->set_rules('grupo_material_obra_id', 'grupo material obra id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
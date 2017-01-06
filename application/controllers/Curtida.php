<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curtida extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Curtida_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'curtida/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'curtida/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'curtida/index.html';
            $config['first_url'] = base_url() . 'curtida/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Curtida_model->total_rows($q);
        $curtida = $this->Curtida_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'curtida_data' => $curtida,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('curtida/curtida_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Curtida_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'data_criacao' => $row->data_criacao,
		'usuario_id' => $row->usuario_id,
		'post_id' => $row->post_id,
	    );
            $this->load->view('curtida/curtida_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('curtida'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('curtida/create_action'),
	    'id' => set_value('id'),
	    'data_criacao' => set_value('data_criacao'),
	    'usuario_id' => set_value('usuario_id'),
	    'post_id' => set_value('post_id'),
	);
        $this->load->view('curtida/curtida_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'data_criacao' => $this->input->post('data_criacao',TRUE),
		'usuario_id' => $this->input->post('usuario_id',TRUE),
		'post_id' => $this->input->post('post_id',TRUE),
	    );

            $this->Curtida_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('curtida'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Curtida_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('curtida/update_action'),
		'id' => set_value('id', $row->id),
		'data_criacao' => set_value('data_criacao', $row->data_criacao),
		'usuario_id' => set_value('usuario_id', $row->usuario_id),
		'post_id' => set_value('post_id', $row->post_id),
	    );
            $this->load->view('curtida/curtida_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('curtida'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'data_criacao' => $this->input->post('data_criacao',TRUE),
		'usuario_id' => $this->input->post('usuario_id',TRUE),
		'post_id' => $this->input->post('post_id',TRUE),
	    );

            $this->Curtida_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('curtida'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Curtida_model->get_by_id($id);

        if ($row) {
            $this->Curtida_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('curtida'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('curtida'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('data_criacao', 'data criacao', 'trim|required');
	$this->form_validation->set_rules('usuario_id', 'usuario id', 'trim|required');
	$this->form_validation->set_rules('post_id', 'post id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Curtida.php */
/* Location: ./application/controllers/Curtida.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
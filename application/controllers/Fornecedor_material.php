<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fornecedor_material extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fornecedor_material_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'fornecedor_material/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fornecedor_material/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fornecedor_material/index.html';
            $config['first_url'] = base_url() . 'fornecedor_material/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fornecedor_material_model->total_rows($q);
        $fornecedor_material = $this->Fornecedor_material_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fornecedor_material_data' => $fornecedor_material,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('fornecedor_material/fornecedor_material_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Fornecedor_material_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'fornecedor_id' => $row->fornecedor_id,
		'grupo_material_obra_id' => $row->grupo_material_obra_id,
		'obra_id' => $row->obra_id,
	    );
            $this->load->view('fornecedor_material/fornecedor_material_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fornecedor_material'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fornecedor_material/create_action'),
	    'id' => set_value('id'),
	    'fornecedor_id' => set_value('fornecedor_id'),
	    'grupo_material_obra_id' => set_value('grupo_material_obra_id'),
	    'obra_id' => set_value('obra_id'),
	);
        $this->load->view('fornecedor_material/fornecedor_material_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'fornecedor_id' => $this->input->post('fornecedor_id',TRUE),
		'grupo_material_obra_id' => $this->input->post('grupo_material_obra_id',TRUE),
		'obra_id' => $this->input->post('obra_id',TRUE),
	    );

            $this->Fornecedor_material_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fornecedor_material'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fornecedor_material_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fornecedor_material/update_action'),
		'id' => set_value('id', $row->id),
		'fornecedor_id' => set_value('fornecedor_id', $row->fornecedor_id),
		'grupo_material_obra_id' => set_value('grupo_material_obra_id', $row->grupo_material_obra_id),
		'obra_id' => set_value('obra_id', $row->obra_id),
	    );
            $this->load->view('fornecedor_material/fornecedor_material_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fornecedor_material'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'fornecedor_id' => $this->input->post('fornecedor_id',TRUE),
		'grupo_material_obra_id' => $this->input->post('grupo_material_obra_id',TRUE),
		'obra_id' => $this->input->post('obra_id',TRUE),
	    );

            $this->Fornecedor_material_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fornecedor_material'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Fornecedor_material_model->get_by_id($id);

        if ($row) {
            $this->Fornecedor_material_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fornecedor_material'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fornecedor_material'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('fornecedor_id', 'fornecedor id', 'trim|required');
	$this->form_validation->set_rules('grupo_material_obra_id', 'grupo material obra id', 'trim|required');
	$this->form_validation->set_rules('obra_id', 'obra id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Fornecedor_material.php */
/* Location: ./application/controllers/Fornecedor_material.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
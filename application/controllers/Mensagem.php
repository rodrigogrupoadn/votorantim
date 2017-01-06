<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mensagem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mensagem_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mensagem/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mensagem/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mensagem/index.html';
            $config['first_url'] = base_url() . 'mensagem/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mensagem_model->total_rows($q);
        $mensagem = $this->Mensagem_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mensagem_data' => $mensagem,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mensagem/mensagem_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mensagem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'mensagem' => $row->mensagem,
		'chat_id' => $row->chat_id,
		'id_usuario_enviou' => $row->id_usuario_enviou,
	    );
            $this->load->view('mensagem/mensagem_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mensagem'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mensagem/create_action'),
	    'id' => set_value('id'),
	    'mensagem' => set_value('mensagem'),
	    'chat_id' => set_value('chat_id'),
	    'id_usuario_enviou' => set_value('id_usuario_enviou'),
	);
        $this->load->view('mensagem/mensagem_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'mensagem' => $this->input->post('mensagem',TRUE),
		'chat_id' => $this->input->post('chat_id',TRUE),
		'id_usuario_enviou' => $this->input->post('id_usuario_enviou',TRUE),
	    );

            $this->Mensagem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mensagem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mensagem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mensagem/update_action'),
		'id' => set_value('id', $row->id),
		'mensagem' => set_value('mensagem', $row->mensagem),
		'chat_id' => set_value('chat_id', $row->chat_id),
		'id_usuario_enviou' => set_value('id_usuario_enviou', $row->id_usuario_enviou),
	    );
            $this->load->view('mensagem/mensagem_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mensagem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'mensagem' => $this->input->post('mensagem',TRUE),
		'chat_id' => $this->input->post('chat_id',TRUE),
		'id_usuario_enviou' => $this->input->post('id_usuario_enviou',TRUE),
	    );

            $this->Mensagem_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mensagem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mensagem_model->get_by_id($id);

        if ($row) {
            $this->Mensagem_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mensagem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mensagem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('mensagem', 'mensagem', 'trim|required');
	$this->form_validation->set_rules('chat_id', 'chat id', 'trim|required');
	$this->form_validation->set_rules('id_usuario_enviou', 'id usuario enviou', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mensagem.php */
/* Location: ./application/controllers/Mensagem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
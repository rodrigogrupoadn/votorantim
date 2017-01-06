<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'chat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'chat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'chat/index.html';
            $config['first_url'] = base_url() . 'chat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Chat_model->total_rows($q);
        $chat = $this->Chat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'chat_data' => $chat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('chat/chat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Chat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'chatcol' => $row->chatcol,
		'id_usuario1' => $row->id_usuario1,
		'id_usuario2' => $row->id_usuario2,
	    );
            $this->load->view('chat/chat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('chat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('chat/create_action'),
	    'id' => set_value('id'),
	    'chatcol' => set_value('chatcol'),
	    'id_usuario1' => set_value('id_usuario1'),
	    'id_usuario2' => set_value('id_usuario2'),
	);
        $this->load->view('chat/chat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'chatcol' => $this->input->post('chatcol',TRUE),
		'id_usuario1' => $this->input->post('id_usuario1',TRUE),
		'id_usuario2' => $this->input->post('id_usuario2',TRUE),
	    );

            $this->Chat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('chat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Chat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('chat/update_action'),
		'id' => set_value('id', $row->id),
		'chatcol' => set_value('chatcol', $row->chatcol),
		'id_usuario1' => set_value('id_usuario1', $row->id_usuario1),
		'id_usuario2' => set_value('id_usuario2', $row->id_usuario2),
	    );
            $this->load->view('chat/chat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('chat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'chatcol' => $this->input->post('chatcol',TRUE),
		'id_usuario1' => $this->input->post('id_usuario1',TRUE),
		'id_usuario2' => $this->input->post('id_usuario2',TRUE),
	    );

            $this->Chat_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('chat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Chat_model->get_by_id($id);

        if ($row) {
            $this->Chat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('chat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('chat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('chatcol', 'chatcol', 'trim|required');
	$this->form_validation->set_rules('id_usuario1', 'id usuario1', 'trim|required');
	$this->form_validation->set_rules('id_usuario2', 'id usuario2', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Chat.php */
/* Location: ./application/controllers/Chat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:56:03 */
/* http://harviacode.com */
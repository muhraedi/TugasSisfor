<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('table_model');
    }

	public function index()
	{
		$this->load->view('dashboard');
    }

    public function create()
	{
        $data['query'] = false;
        $data['title'] = 'Tambah Data';
        $this->load->view('form', $data);
    }

    public function table()
	{
        $data['query'] = $this->table_model->get_all();
        $this->load->view('table', $data);
    }
   
    public function edit($id = 0)
    {
        $id = (int) $id;
        $data['title'] = 'Edit Data';
        $data['query'] = $this->table_model->get_data_by_id($id);
        $this->load->view('form', $data);
    }

    public function save()
    {
        $name = $this->input->post('name');
        $salary = $this->input->post('salary');
        $country = $this->input->post('country');
        $city = $this->input->post('city');
        $data_db = array(
            'name'=> $name,
            'salary' => $salary,
            'country' => $country,
            'city' => $city
        );
        $id = $this->input->post('id');
        if ($id !== NULL && $id !== '' && $id) {       
            $this->table_model->update_data($data_db, $id);
        }
        else {
            $this->table_model->insert_data($data_db);
        }
        $data['query'] = $this->table_model->get_all();
        $this->load->view('table', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($id !== NULL && $id !== '' && $id) {       
            $this->table_model->delete_data($id);
        }
        redirect(base_url('index.php/home/table'));
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_model extends CI_Model {

	public function get_all()
	{
		return $this->db->get('gaji')->result();
    }

    public function get_data_by_id($id)
    {
        return $this->db->where('id', $id)->get('gaji')->row();
    }
    public function insert_data($data)
    {
        return $this->db->insert('gaji', $data);
    }

    public function update_data($data, $id)
    {
        return $this->db->where('id', $id)->update('gaji', $data);
    }

    public function delete_data($id)
    {
        return $this->db->where('id', $id)->delete('gaji');
    }
}

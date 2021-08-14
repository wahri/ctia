<?php

class nonPemakalah_model extends CI_Model
{
    public function getAllNonPemakalah()
    {
        return $this->db->get('daftar_nonpemakalah')->result_array();
    }

    public function detailNonPemakalah($id)
    {
        return $this->db->get_where('daftar_nonpemakalah', ['id' => $id])->row_array();
    }
}

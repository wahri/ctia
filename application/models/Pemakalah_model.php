<?php

class Pemakalah_model extends CI_Model
{
    public function getAllPemakalah()
    {
        return $this->db->get('daftar_pemakalah')->result_array();
    }

    public function detailPemakalah($id)
    {
        return $this->db->get_where('daftar_pemakalah', ['id' => $id])->row_array();
    }

    public function getAllNonPemakalah()
    {
        return $this->db->get('daftar_nonpemakalah')->result_array();
    }

    public function detailNonPemakalah($id)
    {
        return $this->db->get_where('daftar_nonpemakalah', ['id' => $id])->row_array();
    }
}

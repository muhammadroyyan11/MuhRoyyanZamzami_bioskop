<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film_m extends CI_Model
{
    public function get($where = null)
    {
        $this->db->select('*');
        $this->db->from('film');
        if ($where != null) {
            $this->db->where('kd_film', $where);
        }
        return $this->db->get();
    }
}

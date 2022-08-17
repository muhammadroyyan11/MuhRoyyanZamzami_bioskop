<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bioskop_m extends CI_Model
{
    public function get($where = null)
    {
        $this->db->select('*');
        $this->db->from('bioskop');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function getLimit()
    {
        $this->db->select('*');
        $this->db->from('bioskop');
        $this->db->order_by('id_bioskop', 'DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function add($post)
    {
        $params = [
            'kd_bioskop' => $post['kd_bioskop'],
            'nama_bioskop' => $post['nama_bioskop'],
            'kota' => $post['kota'],
            'alamat_lengkap' => $post['alamat_lengkap'],
            'harga' => $post['harga'],
            'foto' => $post['foto']

        ];
        $this->db->insert('bioskop', $params);
    }
}

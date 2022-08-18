<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_m extends CI_Model
{
    public function get($where = null)
    {
        $this->db->select('*');
        $this->db->from('pesan');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function add($post)
    {
        $params = [
            'jadwal' => $post['id_jadwal'],
            'judul' => $post['nama_film'],
            'bioskop' => $post['nama_bioskop'],
            'kursi' => $post['kursi'],
        ];
        $this->db->insert('pesan', $params);
    }
}

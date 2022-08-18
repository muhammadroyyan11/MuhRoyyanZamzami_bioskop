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
        $this->db->join('jadwal', 'jadwal.id_jadwal = pesan.jadwal');
        $this->db->order_by('id_pesan', 'DESC');
        return $this->db->get();
    }

    public function add($post, $generate)
    {
        $params = [
            'kd_pesan' => $generate,
            'jadwal' => $post['id_jadwal'],
            'judul' => $post['nama_film'],
            'nama_bioskop' => $post['nama_bioskop'],
            'kursi' => $post['kursi'],
        ];
        $this->db->insert('pesan', $params);
    }
}

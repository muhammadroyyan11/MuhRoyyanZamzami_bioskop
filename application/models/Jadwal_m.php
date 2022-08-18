<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_m extends CI_Model
{
    public function get($where = null)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->join('film', 'film.id_film = jadwal.judul_film');
        $this->db->join('bioskop', 'bioskop.id_bioskop = jadwal.bioskop');
        return $this->db->get();
    }

    public function getLimit()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->order_by('id_jadwal', 'DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function add($post, $generate)
    {
        $params = [
            'kd_jadwal' => $generate,
            'judul_film' => $post['film'],
            'bioskop' => $post['bioskop'],
            'tgl_waktu_tayang' => $post['tgl_tayang'],
            'jumlah_kursi' => $post['kursi']

        ];
        $this->db->insert('jadwal', $params);
    }
}

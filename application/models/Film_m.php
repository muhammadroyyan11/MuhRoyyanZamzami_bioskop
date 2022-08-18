<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film_m extends CI_Model
{
    public function get($where = null)
    {
        $this->db->select('*');
        $this->db->from('film');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function getLimit()
    {
        $this->db->select('*');
        $this->db->from('film');
        $this->db->order_by('id_film', 'DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function add($post)
    {
        $params = [
            'kd_film' => $post['kd_film'],
            'judul_film' => $post['judul'],
            'tgl_launc' => $post['tgl_launc'],
            'synopsys' => $post['sipnosis'],
            'genre' => $post['genre'],
            'poster' => $post['poster']

        ];
        $this->db->insert('film', $params);
    }

    public function del($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_m extends CI_Model
{
    public function get($where = null)
    {
        $this->db->select(
            'j.id_jadwal, j.judul_film as jd, j.kd_jadwal, j.bioskop, ,tgl_waktu_tayang, j.jumlah_kursi, 
            f.kd_film, f.judul_film, f.tgl_launc, f.synopsys, f.genre, f.poster,
            b.kd_bioskop, b.nama_bioskop, b.kota, b.alamat_lengkap, b.harga, b.foto'
        );
        $this->db->from('jadwal as j');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->join('film as f', 'f.id_film = j.judul_film');
        $this->db->join('bioskop as b', 'b.id_bioskop = j.bioskop');
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

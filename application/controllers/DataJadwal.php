<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataJadwal extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model(['Jadwal_m' => 'jadwal', 'Bioskop_m' => 'bioskop', 'Film_m' => 'film']);
    }

    public function index()
    {
        $getJadwal = $this->jadwal->get()->result();
        $bioskop = $this->bioskop->get()->result();
        $film = $this->film->get()->result();

        $data = array(
            'title' => 'Data Jawdal Penayangan',
            'bioskop' => $bioskop,
            'film' => $film,
            'jadwal' => $getJadwal
        );

        $this->template->load('tempadmin', 'admin/jadwal', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);

        $getFilm = $this->film->get(['id_film' => $post['film']])->row();

        $getBioskop = $this->bioskop->get(['id_bioskop' => $post['bioskop']])->row();

        $newDate = date("dmYgi", strtotime($post['tgl_tayang']));

        $getCount = $this->jadwal->get()->num_rows();

        // Mengenerate Kode Film
        $kode_terakhir = $getCount;
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);

        // generate kode jadwal
        $generate = $getBioskop->kd_bioskop . $newDate . $getFilm->kd_film . $number;

        $this->jadwal->add($post, $generate);
        if ($this->db->affected_rows() > 0) {
            set_pesan('Film Berhasil Dismpan');
        }
        redirect('dataJadwal');
    }

    public function delete($id)
    {
        $this->film->del('jadwal', ['id_jadwal' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        }
        redirect('dataBioskop');
    }
}

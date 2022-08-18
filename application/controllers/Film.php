<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film extends CI_Controller
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
        $this->load->model(['Jadwal_m' => 'jadwal', 'Bioskop_m' => 'bioskop', 'Film_m' => 'film', 'Pesan_m' => 'pesan']);
    }

    public function index()
    {
        $get = $this->jadwal->get()->result();
        $data = array(
            'title' => 'List Film',
            'film' => $get
        );

        $this->template->load('template', 'film/film', $data);
    }

    public function pesan($id)
    {
        $get = $this->jadwal->get(['j.id_jadwal' => $id])->row();

        $getKursi = $this->jadwal->get(['j.judul_film' => $id])->row();
        $data = array(
            'title' => 'List Film',
            'row' => $get,
        );

        $this->template->load('template', 'film/formPesan', $data);
    }

    public function transaksi()
    {
        $post = $this->input->post(null, TRUE);

        $this->pesan->add($post);
        if ($this->db->affected_rows() > 0) {
            set_pesan('Film Berhasil Dismpan');
        }

        redirect('history');
    }

    public function showBioskop($id)
    {
        $get = $this->jadwal->get(['j.judul_film' => $id])->result();
        $getKursi = $this->jadwal->get(['j.judul_film' => $id])->row();
        $data = array(
            'title' => 'List Film',
            'film' => $get,
            'kursi' => $getKursi
        );

        $this->template->load('template', 'film/listBioskopTayang', $data);
    }

    public function detail($id)
    {

        $get = $this->film->get(['kd_film' => $id])->row();
        $data = array(
            'title' => 'Detil Film',
            'row' => $get
        );

        $this->template->load('template', 'film/detail', $data);
    }
}

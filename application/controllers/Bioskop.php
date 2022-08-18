<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bioskop extends CI_Controller
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
        $get = $this->bioskop->get()->result();
        $data = array(
            'title' => 'List Bioskop',
            'bioskop' => $get
        );

        $this->template->load('template', 'bioskop/bioskop', $data);
    }

    public function detail($id)
    {
        $get = $this->bioskop->get(['id_bioskop' => $id])->row();

        $getTayang = $this->jadwal->get(['j.bioskop' => $id])->result();

        // var_dump($getTayang);

        $data = array(
            'title' => 'List Film',
            'row' => $get,
            'film' => $getTayang
        );

        $this->template->load('template', 'bioskop/detail', $data);
    }
}

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
        $this->load->model('Film_m', 'film');
    }

    public function index()
    {
        $get = $this->film->get()->result();
        $data = array(
            'title' => 'List Film',
            'film' => $get
        );

        $this->template->load('template', 'film/film', $data);
    }

    public function delete($id)
    {
        // $id = $this->input->post('loket_id');
        $this->loket_m->del($id);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        }
        redirect('dataFilm');
    }
}

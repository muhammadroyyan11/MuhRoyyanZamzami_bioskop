<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBioskop extends CI_Controller
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
        $this->load->model('Bioskop_m', 'bioskop');
    }

    public function index()
    {
        $get = $this->bioskop->get()->result();
        $data = array(
            'title' => 'List Film',
            'bioskop' => $get
        );

        $this->template->load('template', 'bioskop/bioskop', $data);
    }

    public function detail($id)
    {
        $get = $this->bioskop->get(['kd_bioskop' => $id])->row();

        $data = array(
            'title' => 'List Film',
            'row' => $get
        );

        $this->template->load('template', 'bioskop/detail', $data);
    }
}

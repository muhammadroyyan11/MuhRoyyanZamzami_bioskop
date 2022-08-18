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
        $this->load->model('Film_m', 'film');
    }

    public function index()
    {
        $get = $this->bioskop->get()->result();
        $data = array(
            'title' => 'Data Bioskop',
            'bioskop' => $get
        );

        $this->template->load('tempadmin', 'admin/bioskop', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);

        $getCode = strtoupper(random_string('alpha', 3));

        $getCount = $this->bioskop->get()->num_rows();

        // Mengenerate Kode Film
        $kode_terakhir = $getCount;
        $kode_tambah = substr($kode_terakhir, -3, 3);
        $kode_tambah++;
        $number = $getCode . str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);

        $config['upload_path']          = './assets/uploads/bioskop/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = $post['nama_bisokop'] . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $post['foto'] = $this->upload->data('file_name');
            $post['kd_bioskop'] = $number;
            $this->bioskop->add($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('Film Berhasil Dismpan');
            }
            redirect('dataBiskop');
        } else {
            set_pesan('Terjadi kesalahan saat menyimpan film', false);
        }
    }

    public function delete($id)
    {
        $this->film->del('bioskop', ['id_bioskop' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        }
        redirect('dataBioskop');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataFilm extends CI_Controller
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
            'title' => 'Home',
            'film' => $get
        );

        $this->template->load('tempadmin', 'admin/film', $data);
    }

    public function check($a)
    {
        return !preg_match('/^[aiueo]/', $a);
    }

    public function checker($temporary)
    {
        $code = '';

        if (count($temporary) > 1) {
            $codeOne = $temporary[0];
            $codeTwo = $temporary[count($temporary) - 1];

            if (isset($codeOne['consonant']) && isset($codeTwo['consonant'])) {
                $code .= $codeOne['consonant'][0];
                $code .= $codeTwo['consonant'][0];
            } else if (isset($codeOne['consonant']) && !isset($codeTwo['consonant'])) {
                if (isset($codeOne['vocal'])) {
                    $code .= $codeOne['consonant'][0];
                    $code .= $codeOne['vocal'][0];
                } else {
                    if (count($codeOne['consonant']) >= 2) {
                        for ($con = 0; $con < 2; $con++) {
                            $code .= $codeOne['consonant'][$con];
                        }
                    }
                }
            } else if (!isset($codeOne['consonant']) && !isset($codeTwo['consonant'])) {
                if (isset($codeOne['vocal'])) {
                    if (count($codeOne['vocal']) >= 2) {
                        for ($con = 0; $con < 2; $con++) {
                            $code .= $codeOne['vocal'][$con];
                        }
                    }
                }
            }
        } else {
            if (isset($temporary[0]['consonant']) && isset($temporary[0]['vocal'])) {
                if (count($temporary[0]['consonant']) >= 2) {
                    for ($con = 0; $con < 2; $con++) {
                        $code .= $temporary[0]['consonant'][$con];
                    }
                } else {
                    $code .= $temporary[0]['consonant'][0];
                    $code .= $temporary[0]['vocal'][0];
                }
            } else if (!isset($temporary[0]['consonant']) && isset($temporary[0]['vocal'])) {
                if (count($temporary[0]['vocal']) >= 2) {
                    for ($con = 0; $con < 2; $con++) {
                        $code .= $temporary[0]['vocal'][$con];
                    }
                }
            }
        }

        return strtoupper($code);
    }

    public function getCode($words)
    {
        $sentence = [];

        foreach ($words as $index => $items) {
            $toCheck = str_split(strtolower($items));
            foreach ($toCheck as $item) {
                if ($this->check($item)) {
                    $sentence[$index]['consonant'][] = $item;
                } else {
                    $sentence[$index]['vocal'][] = $item;
                }
            }
        }

        $checkers = $this->checker($sentence);
        return $checkers == '' ? false : $checkers;
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);

        $newArray = explode(" ", strtolower($post['judul']));

        $getCode = $this->getCode($newArray);

        $getCount = $this->film->get()->num_rows();

        // Mengenerate Kode Film
        $kode_terakhir = $getCount;
        $kode_tambah = substr($kode_terakhir, -3, 3);
        $kode_tambah++;
        $number = $getCode . str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);

        $config['upload_path']          = './assets/uploads/poster/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = $number . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('poster')) {
            $post['poster'] = $this->upload->data('file_name');
            $post['kd_film'] = $number;
            $this->film->add($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('Film Berhasil Dismpan');
            }
            redirect('dataFilm');
        } else {
            set_pesan('Terjadi kesalahan saat menyimpan film', false);
        }
    }

    public function delete($id)
    {
        // $id = $this->input->post('loket_id');
        $this->film->del($id);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        }
        redirect('dataFilm');
    }
}

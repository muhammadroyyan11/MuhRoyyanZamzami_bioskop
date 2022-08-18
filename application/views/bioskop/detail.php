<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url() ?>assets/uploads/bioskop/<?= $row->foto ?>" class="card-img-top">
            </div>
            <div class="col-md-8">
                <h3 class="text-center mb-4"><?= $row->nama_bioskop ?></h3>
                <table style="width:100%" class="mb-4">
                    <tr>
                        <td>Kode Bioskop</td>
                        <td>:</td>
                        <td><?= $row->kd_bioskop ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>Aktif</td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td>:</td>
                        <td><?= $row->kota ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>:</td>
                        <td><?= $row->alamat_lengkap ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<section>
    <section>
        <div class="container">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md text-center">
                        <h2>Sedang tayang di <?= $row->nama_bioskop ?></h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($film as $key => $data) { ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= base_url() ?>assets/uploads/poster/<?= $data->poster ?>" class="card-img-top" style="weight: 300px; height:400px;">
                                <div class="card-body">
                                    <h5 class="card-title mb-4 text-center"><a href="<?= site_url('film/detail/') . $data->kd_film ?>" class="text-dark"><?= $data->judul_film ?></a></h5>
                                    <p class="card-text mb-1"><i class="fa clock-o fa-clock-o"></i> 199 min</p>
                                    <p class="card-text">Now Playing</p>
                                    <a href="<?= site_url('film/detail/') . $data->kd_film ?>" class="btn btn-primary">Detail Fllm</a>
                                    <a href="<?= site_url('film/showBioskop/') . $data->jd ?>" class="btn btn-success">Pesan tiket</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</section>
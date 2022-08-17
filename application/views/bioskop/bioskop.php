<section>
    <div class="container">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md text-center">
                    <h2>Bioskop</h2>
                    <small>Temukan bioskop terdekat</small>
                </div>
            </div>
            <div class="row">
                <?php foreach ($bioskop as $key => $data) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?= base_url() ?>assets/uploads/poster/<?= $data->foto ?>" class="card-img-top" style="weight: 300px; height:400px;">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-center"><a href="<?= site_url('film/detail/') . $data->kd_bioskop ?>" class="text-dark"><?= $data->nama_bioskop ?></a></h5>
                                <p class="card-text mb-1"><i class="fa fa-map-marker"></i> <?= $data->kota ?></p>
                                <p class="card-text"><?= character_limiter($data->alamat_lengkap, 40) ?></p>
                                <a href="<?= site_url('dataBioskop/detail/') . $data->kd_bioskop ?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
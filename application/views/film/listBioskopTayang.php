<section>
    <div class="container">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md text-center">
                    <h2>Pilih Bioskop!</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($film as $key => $data) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?= base_url() ?>assets/uploads/bioskop/<?= $data->foto ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-center"><a href="<?= site_url('film/detail/') . $data->kd_film ?>" class="text-dark"><?= $data->nama_bioskop ?></a></h5>
                                <p class="card-text mb-1"><i class="fa fa-money"></i> Rp. <?= number_format($data->harga, 2, ',', '.'); ?></p>
                                <p class="card-text">Kursi tersedia adalah <?= $data->jumlah_kursi ?></p>
                                <a href="<?= site_url('film/showBioskop/') . $data->jd ?>" class="btn btn-primary">Pesan tiket</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
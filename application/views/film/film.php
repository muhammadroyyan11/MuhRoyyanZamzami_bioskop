<section>
    <div class="container">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md text-center">
                    <h2>Film yang sedang</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($film as $key => $data) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?= base_url() ?>assets/img/spiderman.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-center"><a href="" class="text-dark"><?= $data->judul_film ?></a></h5>
                                <p class="card-text mb-1"><i class="fa clock-o fa-clock-o"></i> 199 min</p>
                                <p class="card-text">Now Playing</p>
                                <a href="<?= site_url('film/detail/') . $data->kd_film ?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
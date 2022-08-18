<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="<?= base_url() ?>assets/uploads/poster/<?= $row->poster ?>" class="card-img-top">
            </div>
            <div class="col-md-9">
                <h3 class="text-center mb-4"><?= $row->judul_film ?></h3>
                <table style="width:100%" class="mb-4">
                    <tr>
                        <td>Kode Film</td>
                        <td>:</td>
                        <td><?= $row->kd_film ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>Now Playing</td>
                    </tr>
                    <tr>
                        <td>Nama Bioskop</td>
                        <td>:</td>
                        <td>Mandala</td>
                    </tr>
                    <tr>
                        <td>Genre</td>
                        <td>:</td>
                        <td><?= $row->genre ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Rilis</td>
                        <td>:</td>
                        <td><?= longdate_indo($row->tgl_launc); ?></td>
                    </tr>
                </table>
                <a href="<?= site_url('film/showBioskop/') . $row->id_film ?>" class="btn btn-primary">Pesan kursi</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h5 class="mb-4">Sinopsis</h5>
                        <hr>
                        <p><?= $row->synopsys ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
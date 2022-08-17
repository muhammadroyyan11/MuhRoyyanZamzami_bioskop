<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="<?= base_url() ?>assets/uploads/bioskop/<?= $row->foto ?>" class="card-img-top">
            </div>
            <div class="col-md-9">
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
                <a href="#" class="btn btn-primary">Pesan kursi</a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <img src="<?= base_url() ?>assets/uploads/poster/<?= $row->poster ?>" class="card-img-top mb-3">
                <h5 class="text-center mb-4">Now Playing</h5>

            </div>
            <div class="col-md-8">
                <form action="<?= site_url('film/transaksi') ?>" method="post">
                    <h3 class="text-center mb-4">Pemesanan Tiket</h3>

                    <label for="inputPassword5" class="form-label">Judul Film :</label>
                    <input type="text" name="nama_film" id="inputPassword5" class="form-control mb-4" value="<?= $row->judul_film ?>" readonly>
                    <input type="hidden" name="id_jadwal" id="inputPassword5" class="form-control mb-4" value="<?= $row->id_jadwal ?>" readonly>

                    <label for="inputPassword5" class="form-label">Jam Tayang :</label>
                    <input type="text" name="jam_tayang" id="inputPassword5" class="form-control mb-4" value="<?= $row->tgl_waktu_tayang ?>" readonly>

                    <label for="inputPassword5" class="form-label">Bioskop Yang dipilih :</label>
                    <input type="text" name="nama_bioskop" id="inputPassword5" class="form-control mb-4" value="<?= $row->nama_bioskop ?>" readonly>

                    <label for="inputPassword5" class="form-label">Alamat Bioskop :</label>
                    <input type="text" id="inputPassword5" class="form-control mb-4" value="<?= $row->alamat_lengkap ?>" readonly>

                    <label for="inputPassword5" class="form-label">Pilih Kursi :</label>
                    <select name="kursi" class="form-control mb-4">
                        <?php
                        for ($i = 1; $i <= $row->jumlah_kursi; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php }
                        ?>

                    </select>

                    <button type="submit" class="btn btn-primary">
                        pesan
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>
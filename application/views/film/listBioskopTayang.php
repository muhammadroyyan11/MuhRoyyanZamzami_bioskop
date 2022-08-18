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
                                <h5 class="card-title mb-4 text-center"><a href="#" class="text-dark"><?= $data->nama_bioskop ?></a></h5>
                                <p class="card-text mb-1"><i class="fa fa-money"></i> Rp. <?= number_format($data->harga, 2, ',', '.'); ?></p>
                                <p class="card-text">Kursi tersedia adalah <?= $data->jumlah_kursi ?></p>
                                <a href="<?= site_url('film/pesan/') . $data->id_jadwal ?>" class="btn btn-primary">
                                    Pesan Tiket
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open_multipart('dataFilm/proses'); ?>
            <div class="modal-body">
                <label>Pilih Kursi : </label>
                <small>(Pilih angka kursi)</small>
                <div class="form-group mb-3">
                    <input type="number" name="tgl_launc" id="name" placeholder="name" min="1" max="50" class="form-control">
                </div>

                <label>Tanggal Rilis : </label>
                <div class="form-group mb-3">
                    <input type="date" name="tgl_launc" id="name" placeholder="name" class="form-control">
                </div>

                <label>Sinopsis : </label>
                <div class="form-group mb-3">
                    <textarea name="sipnosis" id="" cols="60" rows="10"></textarea>
                </div>

                <label>Poster Film : </label>
                <div class="form-group mb-3 mt-4">
                    <input type="file" name="poster" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#exampleModal', function() {
            var kursi = $(this).data('jumlah_kursi');

            $('$jml_kursi').text(kursi);
        })
    })
</script>
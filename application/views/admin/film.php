<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <h4 class="text-center">Data Film</h4>
                <div class="float-start">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Film
                    </button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Tanggal Rilis</th>
                            <th>Sinopsis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($film as $key => $data) {
                        ?>
                            <tr>
                                <td><?= $data->kd_film ?></td>
                                <td><?= $data->judul_film ?></td>
                                <td><?= $data->tgl_launc ?></td>
                                <td><?= $data->synopsys ?></td>
                                <td>
                                    <a href="<?= base_url('film/detail/') . $data->kd_film ?>" class="btn btn-circle btn-sm btn-primary">detail</a>
                                    <a href="<?= base_url('film/detail/') . $data->kd_film ?>" class="btn btn-circle btn-sm btn-danger">hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('dataFilm/proses') ?>" method="POST">
                <div class="modal-body">

                    <label>Judul Film : </label>
                    <div class="form-group mb-3">
                        <input type="text" name="judul" id="name" placeholder="name" class="form-control">
                    </div>

                    <label>Tanggal Launching : </label>
                    <div class="form-group mb-3">
                        <input type="date" name="tgl_lauch" id="name" placeholder="name" class="form-control">
                    </div>

                    <label>Sinopsis : </label>
                    <div class="form-group mb-3">
                        <textarea name="sinopsis" id="" cols="60" rows="10"></textarea>
                    </div>

                    <label>Poster Film : </label>
                    <div class="form-group mb-3">
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
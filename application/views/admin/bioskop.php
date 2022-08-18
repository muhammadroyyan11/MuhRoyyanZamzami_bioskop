<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <h4 class="text-center"><?= $title ?></h4>
                <div class="float-start">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Bioskop
                    </button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <?= $this->session->flashdata('pesan'); ?>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Bioskop</th>
                            <th>Kota</th>
                            <th>Alamat Lengkap</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($bioskop as $key => $data) {
                        ?>
                            <tr>
                                <td><?= $data->kd_bioskop ?></td>
                                <td><?= $data->nama_bioskop ?></td>
                                <td><?= $data->kota ?></td>
                                <td><?= $data->alamat_lengkap ?></td>
                                <td>
                                    <a href="<?= base_url('bioskop/detail/') . $data->id_bioskop ?>" class="btn btn-circle btn-sm btn-primary">detail</a>
                                    <a href="<?= base_url('dataBioskop/delete/') . $data->id_bioskop ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-circle btn-sm btn-danger">hapus</a>
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
            <?php echo form_open_multipart('dataBioskop/proses'); ?>
            <div class="modal-body">
                <label>Nama Bioskop : </label>
                <div class="form-group mb-3">
                    <input type="text" name="nama_bioskop" id="name" placeholder="name" class="form-control">
                </div>

                <label>Kota : </label>
                <div class="form-group mb-3">
                    <input type="text" name="kota" id="name" placeholder="kota" class="form-control">
                </div>

                <label>Alamat Lengkap : </label>
                <div class="form-group mb-3">
                    <textarea name="alamat_lengkap" id="" cols="60" rows="10"></textarea>
                </div>

                <label>Harga Nonton : </label>
                <div class="form-group mb-3">
                    <input type="text" name="harga" placeholder="harga" class="form-control">
                </div>

                <label>Foto Bioskop : </label>
                <div class="form-group mb-3 mt-4">
                    <input type="file" name="foto" class="form-control">
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
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
                <?= $this->session->flashdata('pesan'); ?>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Film</th>
                            <th>Tanggal dan Waktu Tayang</th>
                            <th>Nama Bioskop</th>
                            <th>Jumlah Kursi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jadwal as $key => $data) {
                            $newDate = date("g:i A", strtotime($data->tgl_waktu_tayang));
                        ?>
                            <tr>
                                <td><?= $data->kd_jadwal ?></td>
                                <td><?= $data->judul_film ?></td>
                                <td><?= date_indo('2017-09-5') . '&nbsp&nbsp' . $newDate ?></td>
                                <td><?= $data->nama_bioskop ?></td>
                                <td><?= $data->jumlah_kursi ?></td>
                                <td>
                                    <a href="<?= base_url('jadwal/detail/') . $data->kd_jadwal ?>" class="btn btn-circle btn-sm btn-primary">detail</a>
                                    <a href="<?= base_url('jadwal/detail/') . $data->kd_jadwal ?>" class="btn btn-circle btn-sm btn-danger">hapus</a>
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
            <?php echo form_open_multipart('dataJadwal/proses'); ?>
            <div class="modal-body">

                <label>Pilih Film : </label>
                <div class="form-group mb-3">
                    <select name="film" id="" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($film as $key => $data) { ?>
                            <option value="<?= $data->id_film ?>"><?= $data->judul_film ?></option>
                        <?php } ?>
                    </select>
                </div>

                <label>Pilih Bioskop : </label>
                <div class="form-group mb-3">
                    <select name="bioskop" id="" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($bioskop as $key => $data) { ?>
                            <option value="<?= $data->id_bioskop ?>"><?= $data->nama_bioskop ?></option>
                        <?php } ?>
                    </select>
                </div>

                <label>Tanggal & Waktu tayang : </label>
                <div class="form-group mb-3">
                    <input type="datetime-local" name="tgl_tayang" id="name" placeholder="name" class="form-control">
                </div>

                <label>Jumlah kursi : </label>
                <div class="form-group mb-3">
                    <input type="text" name="kursi" class="form-control" placeholder="Jumlah kursi">
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
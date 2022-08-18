<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md">
                <?= $this->session->flashdata('pesan'); ?>
                <table class="display" style="width:100%">
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
                                    <a href="<?= base_url('bioskop/detail/') . $data->kd_bioskop ?>" class="btn btn-circle btn-sm btn-primary">detail</a>
                                    <a href="<?= base_url('bisokd/detail/') . $data->kd_bioskop ?>" class="btn btn-circle btn-sm btn-danger">hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
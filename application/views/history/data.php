<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <h4 class="text-center">History Pemesanan Tiket</h4><br><br>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <?= $this->session->flashdata('pesan'); ?>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Tiket</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pesan as $key => $data) {
                        ?>
                            <tr>
                                <td><?= $data->kd_pesan ?></td>
                                <td><?= $data->judul ?></td>
                                <td><?= $data->tgl_waktu_tayang ?></td>
                                <td><?= $data->nama_bioskop ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
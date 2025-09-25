<div class="col-lg-9 col-12">
    <h4 class="mb-4">Hasil Tracking Pengerjaan Mobil - Cabang <?= $data->unit->nama_cabang; ?></h4>
    <!-- Hasil Tracking -->
    <div class="row g-3">

        <!-- Informasi Unit -->
        <div class="col">
            <div class="card shadow-sm p-3">
                <h6 class="fw-bold">Informasi Unit</h6>
                <table>
                    <tbody>
                        <tr>
                            <th scope="row">Nomor Polisi</th>
                            <td>: <?= $data->unit->nomor_polisi; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Model</th>
                            <td>: <?= $data->unit->model_unit; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Warna</th>
                            <td>: <?= $data->unit->warna_unit; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Informasi Pekerjaan -->
        <div class="col">
            <div class="card shadow-sm p-3">
                <h6 class="fw-bold">Informasi Pekerjaan</h6>
                <table>
                    <tbody>
                        <tr>
                            <th scope="row">Tanggal Masuk</th>
                            <td>: <?= $data->unit->tanggal_masuk; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Estimasi Selesai</th>
                            <td>: <?= $data->unit->estimasi_selesai; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>: <?= $data->unit->status ? '<span class="badge bg-success">Selesai</span>' : '<span class="badge bg-primary">Sedang Proses</span>' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h6 class="fw-bold mb-3">Detail Pengerjaan</h6>
        <?= $data->unit->detail_pengerjaan; ?>
    </div>

    <!-- Progress Pekerjaan -->
    <div class="mt-4 p-4 bg-light rounded shadow-sm">
        <h6 class="fw-bold mb-4">Progress Pekerjaan</h6>
        <div class="d-flex justify-content-between text-center overflow-auto gap-5">
            <?php foreach ($data->progres as $row): ?>
                <?php if ($row->tanggal_update): ?>
                    <div>
                        <div style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:auto;font-weight:bold;font-size:1.2rem;color:#fff;background-color:#28a745;">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="small mt-2"><?= $row->nama_status; ?></span>
                    </div>
                <?php else: ?>
                    <div>
                        <div style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:auto;font-weight:bold;font-size:1.2rem;color:#fff;background-color:#6c757d;">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <span class="small mt-2"><?= $row->nama_status; ?></span>
                    </div>
                <?php endif;  ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Riwayat Aktivitas -->
    <div class="mt-4">
        <h6 class="fw-bold mb-3">Riwayat Aktivitas</h6>
        <div class="table-responsive">
            <table class="table text-nowrap w-100">
                <tbody>
                    <?php foreach ($data->aktivitas as $row): ?>
                        <tr>
                            <td><?= $row->aktifitas; ?></td>
                            <td class="text-end"><?= $row->tanggal; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row team-active">
        <?php foreach ($data->progres as $row): ?>
            <?php if ($row->gambar_status): ?>
                <div class="col-xl-4">
                    <div class="single-team mb-40">
                        <div class="team-thumb">
                            <div class="brd">
                                <img src="<?= $row->gambar_status; ?>" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;  ?>
        <?php endforeach; ?>
    </div>
</div>
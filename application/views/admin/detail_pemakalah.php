<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Pemakalah
                </div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><?= $pemakalah['nama'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $pemakalah['email'] ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted mb-3"><?= $pemakalah['nomor'] ?></h6>
                    <div class="row">
                        <div class="col-lg-4">Instituisi Afiliasi</div>
                        <div class="col-lg-8">: <?= $pemakalah['instituisi'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">Co-Author</div>
                        <div class="col-lg-8">: <?= $pemakalah['co-author'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">Alamat</div>
                        <div class="col-lg-8">: <?= $pemakalah['alamat'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">Status</div>
                        <div class="col-lg-8">: <?= $pemakalah['status'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">Judul Artikel</div>
                        <div class="col-lg-8">: <?= $pemakalah['judul'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">Topik</div>
                        <div class="col-lg-8">: <?= $pemakalah['topik'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">File</div>
                        <div class="col-lg-8"><a href="<?= base_url('uploads/pemakalah/files/') . $pemakalah['file']; ?>">: <?= $pemakalah['file'] ?></a></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">Bukti</div>
                        <div class="col-lg-8"><a href="<?= base_url('uploads/pemakalah/bukti/') . $pemakalah['bukti']; ?>">: <?= $pemakalah['bukti'] ?></a></div>
                    </div>
                    <a href="<?= base_url('admin/pemakalah'); ?>" class="btn btn-secondary mt-3">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
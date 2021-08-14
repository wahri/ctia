<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Peserta Pemakalah</h1>

    <div class="container">

        <!-- <div class="row mt-3">
        <div class="col-md-6">
        <form action="" method="post">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari data peserta..." name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </div>
            </div>
        </form>
        </div>
    </div> -->

        <div class="row mt-3">
            <div class="col-md-6">
                <!-- <h3>Daftar Peserta Pemakalah</h3> -->
                <?php if (empty($pemakalah)) : ?>
                    <div class="alert alert-danger" rolle="alert">
                        Data tidak ditemukan!
                    </div>
                <?php endif; ?>
                <ul class="list-group">
                    <?php foreach ($pemakalah as $mhs) : ?>
                        <li class="list-group-item">
                            <?= $mhs['nama']; ?>
                            <a href="<?= base_url(); ?>admin/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ml-1">detail</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
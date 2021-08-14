<div class="page-header"></div>

<div class="container">
    <div class="row">
        <div class="col-xl-10 col-sm-12 mx-auto my-5">

            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('Daftar/upload_pemakalah'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <?= $this->session->flashdata('message_error'); ?>
                    <small class=" text-danger float-right">* Wajib Diisi!</small>
                    <br>
                    <div class="form-group">
                        <label for="nama">Nama dan Gelar <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Institusi Afiliasi <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="instituisi" name="instituisi" value="<?= set_value('instituisi'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('instituisi') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Nama Co-author</label>
                        <textarea type="text" class="form-control" id="co-author" name="co-author" rows="3"><?= set_value('co-author'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Email Korespondensi <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('email') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nomor Kontak <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nomor" name="nomor" value="<?= set_value('nomor'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('nomor') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('alamat') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="status">Pemakalah <sup class="text-danger">*</sup></label>
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('status') ?></small>
                        <small id="emailHelp" class="form-text text-muted mb-2">Pilih status pemakalah sebagai Dosen/Peniliti atau Mahasiswa</small>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="Dosen/Peneliti" <?= set_value('status') == 'Dosen/Peneliti' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                Dosen/Peneliti
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="Mahasiswa" <?= set_value('status') == 'Mahasiswa' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                Mahasiswa
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Judul">Judul Artikel <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('judul') ?></small>
                    </div>

                    <div class="form-group">
                        <label for="Topik">Topik <sup class="text-danger">*</sup></label>
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('topik') ?></small>
                        <small class="form-text text-muted mb-2">Pilih salah satu topic track artikel</small>
                        <div class="form-group">
                            <select name="topik" class="form-control">
                                <option value="">Pilih topik...</option>
                                <?php foreach ($topik as $t) : ?>
                                    <option value="<?= $t ?>" <?= set_value('topik') == $t ? 'selected' : '' ?>><?= $t ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- <?php foreach ($topik as $t) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="topik" id="topik" value="<?= $t ?>">
                                <label class="form-check-label" for="exampleRadios1">
                                    <?= $t ?>
                                </label>
                            </div>
                        <?php endforeach; ?> -->
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleFormControlFile1">Unggah Artikel <sup class="text-danger">*</sup></label>
                        <input type="file" class="form-control-file" id="file" name="file">
                        <small id="emailHelp" class="form-text text-danger"><?= $error; ?></small>
                        <small id="emailHelp" class="form-text text-muted">File dikirim dalam bentuk .doc/.docx/.odt </small>
                    </div> -->

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Unggah bukti pembayaran<sup class="text-danger">*</sup></label>
                        <input type="file" class="form-control-file" id="bukti" name="bukti">
                        <small id="emailHelp" class="form-text text-danger"><?= $error; ?></small>
                        <small id="emailHelp" class="form-text text-muted">File dikirim dalam bentuk .jpg/.jpeg/.png/.pdf </small>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
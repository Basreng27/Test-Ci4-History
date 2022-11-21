<?= $this->extend('pages\layouts\layout_login'); ?>

<?= $this->section('content_login'); ?>
<section>
    <?php if (session()->getFlashdata('pesan')) { //mengambil flash data
    ?>
        <div class="alert alert-success" role="alert">
            <!-- <?php session()->getFlashdata('pesan') ?> -->
            Data Berhasil Disimpan
        </div>
    <?php } ?>
    <div class="container-fluid col-lg-6">
        <div class="row">
            <div class="col">
                <div class="row head">
                    <h1>Regist History</h1>
                </div>
                <hr>
                <div class="row">
                    <form action="Regist/prosesRegist" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="name" class="form-control" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary" name="tombol" value="back">Back</button>
                        ||
                        <button type="submit" class="btn btn-primary" name="tombol" value="regist">Regist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
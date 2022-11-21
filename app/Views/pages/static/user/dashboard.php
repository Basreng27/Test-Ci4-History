<?= $this->extend('pages\layouts\layout_login'); ?>

<?= $this->section('content_login'); ?>
<section>
    <div class="container-fluid col-lg-6">
        <div class="row">
            <div class="col">
                <div class="row head">
                    <h1>Ini user</h1>
                </div>
                <hr>
                <div class="row">
                    <form action="Login/prosesLogin" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <a href="/Login/logout" type="submit" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
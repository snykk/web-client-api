<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
                                </div>

                                <form method="post" action="<?= base_url("auth/register"); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" name="submit" value="1" class="btn btn-info btn-block">
                                        Buat Akun
                                    </button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url("auth/index"); ?>">Sudah memiliki akun? login sekarang!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
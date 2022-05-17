<div class="container">
    <h1 class="text-center">Hello, <?= $username; ?>!</h1>
    
    <a href="<?= base_url("auth/logout"); ?>"  class="btn btn-primary float-right tombol-keluar">Keluar</a>
    <a href="<?= base_url('todo'); ?>" class="btn btn-primary float-right mx-3">Buat todo</a> 
</div>

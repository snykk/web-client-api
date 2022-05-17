<div class="container">

    <?php
    echo $this->session->flashdata('message');
    unset($_SESSION['message']);
    ?>


    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>todo/tambah" class="btn btn-primary">Tambah
                Data Todo</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="<?= base_url('todo'); ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data todo.." name="cariTodo">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Todo</h3>
            <?php if (empty($todo)) : ?>
                <div class="alert alert-danger" role="alert">
                data todo tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($todo as $row) : ?>
                <li class="list-group-item">
                    <?= $row['todo']; ?>
                    <a href="<?= base_url(); ?>todo/hapus/<?= $row['id']; ?>"
                        class="badge badge-danger float-right tombol-hapus">hapus</a>
                    <a href="<?= base_url(); ?>todo/ubah/<?= $row['id']; ?>"
                        class="badge badge-success float-right">ubah</a>
                    <a href="<?= base_url(); ?>todo/detail/<?= $row['id']; ?>"
                        class="badge badge-primary float-right">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>
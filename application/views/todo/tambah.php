<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Todo
                </div>
                <div class="card-body">
                    <form action="<?= base_url("todo/tambah"); ?>" method="post">
                        <div class="form-group">
                            <label for="todo">Todo</label>
                            <input type="text" name="todo" class="form-control" id="todo" value="<?= set_value('todo'); ?>">
                            <small class="form-text text-danger"><?= form_error('todo'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Level</label>
                            <input type="text" name="level" class="form-control" id="level" value="<?= set_value('level'); ?>">
                            <small class="form-text text-danger"><?= form_error('level'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                        <a href="<?= base_url('todo/'); ?>"><button type="button" class="btn btn-primary float-right mx-3">Kembali</button></a> 
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>
<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Todo
                </div>
                <div class="card-body">
                    <form action="<?= base_url("todo/ubah/")?>" method="post">
                        <input type="hidden" name="id" value="<?= $todo['id']; ?>">
                        <div class="form-group">
                            <label for="todo">Todo</label>
                            <input type="text" name="todo" class="form-control" id="todo" value="<?= $todo['todo']; ?>">
                            <small class="form-text text-danger"><?= form_error('todo'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="text" name="level" class="form-control" id="level" value="<?= $todo['level']; ?>">
                            <small class="form-text text-danger"><?= form_error('level'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                        <a href="<?= base_url('todo/'); ?>"><button type="button" class="btn btn-primary float-right mx-3">Kembali</button></a> 
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Todo
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $todo['todo']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $todo['level']; ?></h6>
                    <p class="card-text">Create at: <?= $todo['createdAt']; ?></p>
                    <p class="card-text">Update at: <?= $todo['updatedAt']; ?></p>
                    <a href="<?= base_url(); ?>todo" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>
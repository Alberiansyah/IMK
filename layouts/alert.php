<?php if (isset($_SESSION['berhasil'])) : ?>
    <div class="alert alert-<?= ($_SESSION['berhasil']['type']) ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['berhasil']['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['berhasil']); ?>
<?php endif; ?>
<?php
require __DIR__ . '/../koneksi/koneksi.php';

function cariObat($request)
{
    global $pdo;
    $keyword = $_GET['keyword'];
    $query = $pdo->prepare($request);
    $query->execute(["%$keyword%"]);
    $row = $query->fetchAll(PDO::FETCH_OBJ);

    return $row;
}

$queryObat = cariObat("SELECT * FROM tb_obat WHERE namaObat LIKE ?");

$rows = count($queryObat);
$no = 1;

?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card mt-n3">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="float-right">
                        <a href="<?= $hostToRoot ?>tambah-obat"><button class="btn btn-primary text-white" title="Tambah Obat"><i class="fa fa-plus"></i></button></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Stok Obat</th>
                                <th>Jenis Obat</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($rows < 1) : ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Data tidak ditemukan.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($queryObat as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->namaObat ?></td>
                                        <td><?= $row->stokObat ?></td>
                                        <td><?= $row->jenisObat ?></td>
                                        <td><?= $row->hargaObat ?></td>
                                        <td>
                                            <a href="<?= $hostToRoot ?>edit-data-obat?idObat=<?= $row->idObat ?>" class="text-white"><button class="btn btn-info button-indent" id="btnEditDokter"><i class="fa fa-edit"></i> Ubah</button></a>
                                            <a href="<?= $hostToRoot ?>functions/hapus-obat?idObat=<?= $row->idObat ?>" id="hapusObat"><button class="btn btn-danger button-indent" id="btnHapusObat" data-nama="<?= $row->namaObat ?>"><i class="fa fa-trash text-white"></i></a> Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
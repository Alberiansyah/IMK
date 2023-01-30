<?php
require __DIR__ . '/../koneksi/koneksi.php';

function cariResep($request)
{
    global $pdo;
    $keyword = $_GET['keyword'];
    $query = $pdo->prepare($request);
    $query->execute(["%$keyword%"]);
    $row = $query->fetchAll(PDO::FETCH_OBJ);

    return $row;
}

$queryResep = cariResep("SELECT * FROM tb_resep INNER JOIN tb_obat WHERE tb_obat.idObat = tb_resep.idObat
                                                                    AND namaObat LIKE ?    
                                                                    ");

$rows = count($queryResep);
$no = 1;

?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card mt-n3">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="float-right">
                        <a href="<?= $hostToRoot ?>tambah-resep"><button class="btn btn-primary text-white" title="Tambah Resep"><i class="fa fa-plus"></i></button></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Resep Info</th>
                                <th>Resep Dosis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($rows < 1) : ?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">Data tidak ditemukan.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($queryResep as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->namaObat ?></td>
                                        <td><?= $row->resepInfo ?></td>
                                        <td><?= $row->resepDosis ?></td>
                                        <td>
                                            <a href="<?= $hostToRoot ?>edit-data-resep?idResep=<?= $row->idResep ?>" class="text-white"><button class="btn btn-info button-indent" id="btnEditDokter"><i class="fa fa-edit"></i> Ubah</button></a>
                                            <a href="<?= $hostToRoot ?>functions/hapus-resep?idResep=<?= $row->idResep ?>" id="hapusResep"><button class="btn btn-danger button-indent" id="btnHapusResep" data-nama="<?= $row->namaObat ?>"><i class="fa fa-trash text-white"></i></a> Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
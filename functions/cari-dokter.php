<?php
require __DIR__ . '/../koneksi/koneksi.php';

function cariDokter($request)
{
    global $pdo;
    $keyword = $_GET['keyword'];
    $query = $pdo->prepare($request);
    $query->execute(["%$keyword%"]);
    $row = $query->fetchAll(PDO::FETCH_OBJ);

    return $row;
}

$query = cariDokter("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel 
                                                                AND tb_level.namaLevel = 'DOKTER' 
                                                                AND email LIKE ?
                        ");

$rows = count($query);
$no = 1;

?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card mt-n3">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="float-right">
                        <a href="<?= $hostToRoot ?>tambah-dokter"><button class="btn btn-primary text-white" title="Tambah Dokter"><i class="fa fa-plus"></i></button></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($rows < 1) : ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Data tidak ditemukan.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($query as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
                                        <td><?= $row->jk ?></td>
                                        <td><?= $row->noTelp ?></td>
                                        <td><?= $row->alamat ?></td>
                                        <td>
                                            <a href="<?= $hostToRoot ?>edit-data-dokter?idUser=<?= $row->idUser ?>" class="text-white"><button class="btn btn-info button-indent" id="btnEditDokter"><i class="fa fa-edit"></i> Ubah</button></a>
                                            <a href="<?= $hostToRoot ?>functions/hapus-dokter?idUser=<?= $row->idUser ?>" id="hapusDokter"><button class="btn btn-danger button-indent" id="btnHapusDokter" data-nama="<?= $row->nama ?>"><i class="fa fa-trash text-white"></i></a> Hapus</button>
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
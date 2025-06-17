<?php include('db.php'); ?>
<?php include('includes/header.php'); ?>
<div class="container my-5">
    <h2 class="text-center mb-4">Kelola Data Paket</h2>
    <form action="proses_tambah_paket.php" method="POST" class="row g-3 mb-5">
        <div class="col-md-4"><input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" required></div>
        <div class="col-md-3"><input type="number" name="durasi_bulan" class="form-control" placeholder="Durasi (bulan)" required></div>
        <div class="col-md-3"><input type="number" name="harga" class="form-control" placeholder="Harga" required></div>
        <div class="col-md-2"><button type="submit" class="btn btn-success w-100">Tambah Paket</button></div>
    </form>
    <table class="table table-bordered table-striped"><thead class="table-dark">
        <tr><th>ID Paket</th><th>Nama Paket</th><th>Durasi (bulan)</th><th>Harga</th></tr></thead><tbody>
        <?php $result = $conn->query("SELECT * FROM paket"); while ($row = $result->fetch_assoc()) { ?>
        <tr><td><?= $row['id_paket'] ?></td><td><?= $row['nama_paket'] ?></td><td><?= $row['durasi_bulan'] ?></td><td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td></tr>
        <?php } ?>
        </tbody></table></div><?php include('includes/footer.php'); ?>
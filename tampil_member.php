<?php include('db.php'); ?>
<?php include('includes/header.php'); ?>
<div class="container my-5">
    <h2 class="text-center mb-4">Data Member Fitness</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM member ORDER BY id_member ASC");
            $no = 1;
            $today = date('Y-m-d');
            while ($row = $result->fetch_assoc()) :
                $kadaluarsa = $row['tanggal_kadaluarsa'];
                $isExpired = strtotime($kadaluarsa) < strtotime($today);
            ?>
            <tr<?= $isExpired ? " style='background-color:#f8d7da'" : "" ?>>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['no_telepon'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['tanggal_daftar'] ?></td>
                <td><strong><?= $kadaluarsa ?></strong><?= $isExpired ? " <span class='text-danger'>(Kadaluarsa)</span>" : "" ?></td>
                <td><?= $row['status'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include('includes/footer.php'); ?>

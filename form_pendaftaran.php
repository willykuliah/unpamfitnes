<?php include('db.php'); ?>
<?php include('includes/header.php'); ?>
<?php $query_paket = mysqli_query($conn, "SELECT * FROM paket"); ?>
<div class="container my-5">
    <h2 class="text-center mb-4">Form Pendaftaran Member</h2>
    <form action="proses_daftar.php" method="POST">
        <input type="text" name="nama" required class="form-control mb-2" placeholder="Nama Lengkap">
        <input type="text" name="no_telepon" required class="form-control mb-2" placeholder="No. Telepon">
        <textarea name="alamat" required class="form-control mb-2" placeholder="Alamat"></textarea>
        <select name="paket" id="paket" class="form-select mb-2" onchange="hitungKadaluarsa()">
            <option value="">-- Pilih Paket --</option>
            <?php while($row = mysqli_fetch_assoc($query_paket)) : ?>
            <option value="<?= $row['id_paket'] ?>" data-durasi="<?= $row['durasi_bulan'] ?>">
                <?= $row['nama_paket'] ?> - <?= $row['durasi_bulan'] ?> bulan (Rp<?= number_format($row['harga'], 0, ',', '.') ?>)
            </option>
            <?php endwhile; ?>
        </select>
        <input type="date" name="tanggal_daftar" id="tanggal_daftar" onchange="hitungKadaluarsa()" class="form-control mb-2">
        <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" readonly class="form-control mb-2">
        <input type="hidden" name="status" value="Aktif">
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
<script>
function hitungKadaluarsa() {
    const paket = document.getElementById('paket');
    const tanggalDaftar = document.getElementById('tanggal_daftar');
    const tanggalKadaluarsa = document.getElementById('tanggal_kadaluarsa');
    const selectedOption = paket.options[paket.selectedIndex];
    const durasi = parseInt(selectedOption.getAttribute('data-durasi'));
    const tanggal = new Date(tanggalDaftar.value);
    if (!isNaN(durasi) && tanggal.toString() !== 'Invalid Date') {
        tanggal.setMonth(tanggal.getMonth() + durasi);
        const yyyy = tanggal.getFullYear();
        const mm = String(tanggal.getMonth() + 1).padStart(2, '0');
        const dd = String(tanggal.getDate()).padStart(2, '0');
        tanggalKadaluarsa.value = `${yyyy}-${mm}-${dd}`;
    }
}
</script>
<?php include('includes/footer.php'); ?>

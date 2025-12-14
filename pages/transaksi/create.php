<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

        <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Tambah Transaksi</h2>

        <div class="form-box">
            <form method="POST">

                <label>Kode Transaksi</label>
                <input type="text" name="kode_transaksi" required>

                <label>Jumlah Total</label>
                <input type="number" name="jumlah_total" required>

                <label>Jumlah Pembayaran</label>
                <input type="number" name="jumlah_pembayaran" required>

                <button type="submit" name="submit" class="btn btn-add">Simpan</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $kode = $_POST['kode_transaksi'];
                $total = $_POST['jumlah_total'];
                $bayar = $_POST['jumlah_pembayaran'];
                $kembalian = $bayar - $total;
                $tgl = date('Y-m-d H:i:s');

                mysqli_query($conn, "INSERT INTO transaksi VALUES(
                    NULL,
                    '$kode',
                    '$total',
                    '$bayar',
                    '$kembalian',
                    '$tgl'
                )");

                echo "<script>alert('Data berhasil disimpan!');location='index.php';</script>";
            }
            ?>
        </div>

    </div>
</div>

<?php include "../../includes/footer.php"; ?>

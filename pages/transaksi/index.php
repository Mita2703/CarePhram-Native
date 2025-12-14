<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

         <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Data Transaksi</h2>

        <a href="create.php" class="btn btn-add">+ Tambah Transaksi</a>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th><th>Kode</th><th>Total</th>
                    <th>Pembayaran</th><th>Kembalian</th>
                    <th>Tanggal</th><th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "../../config/db.php";
                $result = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC");
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['kode_transaksi'] ?></td>
                    <td><?= $row['jumlah_total'] ?></td>
                    <td><?= $row['jumlah_pembayaran'] ?></td>
                    <td><?= $row['perubahan_jumlah'] ?></td>
                    <td><?= $row['tanggal_transaksi'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-del" onclick="return confirm('Hapus transaksi?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

</div>

<?php include "../../includes/footer.php"; ?>

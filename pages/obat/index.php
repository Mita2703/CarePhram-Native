<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

         <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Data Obat</h2>
        <a href="create.php" class="btn btn-add">+ Tambah Obat</a>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th><th>Nama</th><th>Stock</th>
                    <th>Harga Beli</th><th>Harga Jual</th>
                    <th>Kategori</th><th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "../../config/db.php";
                $data = mysqli_query($conn, "SELECT * FROM obat ORDER BY id DESC");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?= $d['id'] ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['stock'] ?></td>
                    <td><?= $d['harga_beli'] ?></td>
                    <td><?= $d['harga_jual'] ?></td>
                    <td><?= $d['kategori'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $d['id'] ?>" class="btn btn-del">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</div>

<?php include "../../includes/footer.php"; ?>

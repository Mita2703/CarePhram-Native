<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

         <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Data Pembeli</h2>
        <a href="create.php" class="btn btn-add">+ Tambah Pembeli</a>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th><th>Nama</th><th>No. Telp</th>
                    <th>Alamat</th><th>Kategori</th><th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "../../config/db.php";
                $result = mysqli_query($conn, "SELECT * FROM pembeli ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['no_telp'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['kategori'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-del" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</div>

<?php include "../../includes/footer.php"; ?>

<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

         <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Data Users</h2>

        <a href="create.php" class="btn btn-add">+ Tambah User</a>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th><th>Username</th><th>Dibuat Pada</th><th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "../../config/db.php";
                $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-del" onclick="return confirm('Yakin hapus user?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

</div>

<?php include "../../includes/footer.php"; ?>

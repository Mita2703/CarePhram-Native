<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

        <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Tambah Pembeli</h2>

        <div class="form-box">
            <form method="POST">

                <label>Nama</label>
                <input type="text" name="nama" required>

                <label>No. Telepon</label>
                <input type="text" name="no_telp" required>

                <label>Alamat</label>
                <textarea name="alamat" required></textarea>

                <label>Kategori</label>
                <input type="text" name="kategori" required>

                <button type="submit" name="save" class="btn btn-add">Simpan</button>
            </form>

            <?php
            if(isset($_POST['save'])){
                mysqli_query($conn, "INSERT INTO pembeli VALUES(
                    NULL,
                    '$_POST[nama]',
                    '$_POST[no_telp]',
                    '$_POST[alamat]',
                    '$_POST[kategori]',
                    NOW()
                )");

                echo "<script>alert('Data berhasil disimpan!');location='index.php';</script>";
            }
            ?>
        </div>

    </div>
</div>

<?php include "../../includes/footer.php"; ?>

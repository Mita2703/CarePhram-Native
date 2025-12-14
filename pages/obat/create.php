<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

        <div class="top-right-user">
            <?php echo $_SESSION['username']; ?>
        </div>

        <h2>Tambah Obat</h2>

        <div class="form-box">
            <form method="POST">

                <label>Nama Obat</label>
                <input type="text" name="nama" required>

                <label>Stock</label>
                <input type="number" name="stock" required>

                <label>Harga Beli</label>
                <input type="number" name="harga_beli" required>

                <label>Harga Jual</label>
                <input type="number" name="harga_jual" required>

                <label>Kategori</label>
                <input type="text" name="kategori" required>

                <button type="submit" name="save" class="btn btn-add">Simpan</button>
            </form>
        </div>

        <?php
        if(isset($_POST['save'])){
            mysqli_query($conn, "INSERT INTO obat VALUES(
                NULL,
                '".$_POST['nama']."',
                '".$_POST['stock']."',
                '".$_POST['harga_beli']."',
                '".$_POST['harga_jual']."',
                '".$_POST['kategori']."',
                NOW()
            )");
            echo "<script>alert('Data berhasil disimpan!');location='index.php';</script>";
        }
        ?>

    </div>
</div>

<?php include "../../includes/footer.php"; ?>

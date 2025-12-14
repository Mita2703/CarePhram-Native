<?php 
include "../../includes/header.php"; 
?>

<style>
/* CSS UNTUK SEMUA FORM EDIT */
.edit-form {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    max-width: 800px;
    margin: 0 auto;
}

.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
}

.form-group {
    flex: 1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #555;
    font-size: 14px;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group input[type="password"],
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    background: #fff;
    color: #333;
    transition: border-color 0.3s;
    box-sizing: border-box;
}

.form-group textarea {
    min-height: 100px;
    resize: vertical;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #4CAF50;
    outline: none;
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.1);
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 15px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.btn {
    padding: 12px 25px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-edit {
    background: #4CAF50;
    color: white;
}

.btn-edit:hover {
    background: #45a049;
}

.btn-cancel {
    background: #6c757d;
    color: white;
}

.btn-cancel:hover {
    background: #5a6268;
}

/* Responsive */
@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
        gap: 15px;
    }
    
    .edit-form {
        padding: 20px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

        <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Edit Obat</h2>

        <?php
        include "../../config/db.php";
        $id = $_GET['id'];
        $data = mysqli_query($conn, "SELECT * FROM obat WHERE id='$id'");
        $d = mysqli_fetch_assoc($data);
        ?>

        <form method="POST" class="edit-form">
            <div class="form-row">
                <div class="form-group">
                    <label>Nama Obat:</label>
                    <input type="text" name="nama" value="<?= $d['nama'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Stock:</label>
                    <input type="number" name="stock" value="<?= $d['stock'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Harga Beli:</label>
                    <input type="number" name="harga_beli" value="<?= $d['harga_beli'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Harga Jual:</label>
                    <input type="number" name="harga_jual" value="<?= $d['harga_jual'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kategori:</label>
                    <input type="text" name="kategori" value="<?= $d['kategori'] ?>" required>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" name="update" class="btn btn-edit">Update</button>
                <a href="index.php" class="btn btn-cancel">Kembali</a>
            </div>
        </form>

        <?php
        if(isset($_POST['update'])){
            mysqli_query($conn, "UPDATE obat SET 
                nama='$_POST[nama]',
                stock='$_POST[stock]',
                harga_beli='$_POST[harga_beli]',
                harga_jual='$_POST[harga_jual]',
                kategori='$_POST[kategori]'
                WHERE id='$id'
            ");
            echo "<script>alert('Data berhasil diperbarui!');location='index.php';</script>";
        }
        ?>

    </div>

</div>

<?php include "../../includes/footer.php"; ?>
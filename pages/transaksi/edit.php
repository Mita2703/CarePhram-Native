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

        <h2>Edit Transaksi</h2>

        <?php
        include "../../config/db.php";
        $id = $_GET['id'];
        $get = mysqli_query($conn, "SELECT * FROM transaksi WHERE id=$id");
        $data = mysqli_fetch_assoc($get);
        ?>

        <form method="POST" class="edit-form">
            <div class="form-row">
                <div class="form-group">
                    <label>Kode Transaksi:</label>
                    <input type="text" name="kode_transaksi" value="<?= $data['kode_transaksi'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jumlah Total:</label>
                    <input type="number" name="jumlah_total" value="<?= $data['jumlah_total'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Jumlah Pembayaran:</label>
                    <input type="number" name="jumlah_pembayaran" value="<?= $data['jumlah_pembayaran'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kembalian:</label>
                    <input type="number" value="<?= $data['perubahan_jumlah'] ?>" readonly style="background:#f5f5f5; width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; color: #333; box-sizing: border-box;">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-edit">Update</button>
                <a href="index.php" class="btn btn-cancel">Kembali</a>
            </div>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $kode = $_POST['kode_transaksi'];
            $total = $_POST['jumlah_total'];
            $bayar = $_POST['jumlah_pembayaran'];
            $kembalian = $bayar - $total;

            mysqli_query($conn, "UPDATE transaksi SET
                kode_transaksi='$kode',
                jumlah_total='$total',
                jumlah_pembayaran='$bayar',
                perubahan_jumlah='$kembalian'
                WHERE id=$id
            ");

            header("Location: index.php");
            exit;
        }
        ?>

    </div>

</div>

<?php include "../../includes/footer.php"; ?>
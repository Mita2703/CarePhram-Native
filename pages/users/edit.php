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

        <h2>Edit User</h2>

        <?php
        include "../../config/db.php";
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
        $user = mysqli_fetch_assoc($query);
        ?>

        <form method="POST" class="edit-form">
            <div class="form-row">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?= $user['username'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Password Baru (opsional):</label>
                    <input type="password" name="password">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" name="update" class="btn btn-edit">Update</button>
                <a href="index.php" class="btn btn-cancel">Kembali</a>
            </div>
        </form>

        <?php
        if(isset($_POST['update'])){
            $username = $_POST['username'];

            if(!empty($_POST['password'])){
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                mysqli_query($conn, "UPDATE users SET username='$username', password='$password' WHERE id='$id'");
            } else {
                mysqli_query($conn, "UPDATE users SET username='$username' WHERE id='$id'");
            }

            echo "<script>alert('User berhasil diperbarui!');location='index.php';</script>";
        }
        ?>

    </div>

</div>

<?php include "../../includes/footer.php"; ?>
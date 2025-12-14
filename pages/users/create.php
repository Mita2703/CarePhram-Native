<?php include "../../includes/header.php"; ?>

<div class="wrapper">

    <?php include "../../includes/navbar.php"; ?>

    <div class="content">

        <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Tambah User</h2>

        <div class="form-box">
            <form method="POST">

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit" name="save" class="btn btn-add">Simpan</button>
            </form>

            <?php
            if(isset($_POST['save'])){
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                mysqli_query($conn, "INSERT INTO users VALUES(
                    NULL,
                    '$username',
                    '$password',
                    NOW()
                )");

                echo "<script>alert('User berhasil dibuat!');location='index.php';</script>";
            }
            ?>
        </div>

    </div>
</div>

<?php include "../../includes/footer.php"; ?>

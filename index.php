<?php include "includes/header.php"; ?>

<div class="wrapper">

    <?php include "includes/navbar.php"; ?>

    <div class="content">

        <div class="top-right-user">
            <?= $_SESSION['username'] ?? "User"; ?>
        </div>

        <h2>Dashboard</h2>

        <div class="dashboard-grid">

            <a href="/carepharm/pages/obat/index.php" class="card-box">
                 Obat
            </a>

            <a href="/carepharm/pages/pembeli/index.php" class="card-box">
                 Pembeli
            </a>

            <a href="/carepharm/pages/transaksi/index.php" class="card-box">
                 Transaksi
            </a>

            <a href="/carepharm/pages/users/index.php" class="card-box">
                 Users
            </a>

        </div>

    </div>

</div>

<?php include "includes/footer.php"; ?>

<?php
session_start();
require("connection.php");
// if (!isset($_SESSION['user_id'])) {
//     header("location:admin_login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title> <?php echo $title; ?></title>
</head>

<style>
    .nav-item .admin {
        position: fixed;
        float: right;
        width: 12px;
    }
    .dropdown-toggle::after {
        display: none;
    }
</style>


<!-- THIS IS THE ADMIN HEADER -->

<body class="main">
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            <a href="#" class="navbar-brand fs-3 ms-3" id="navbar-title">TRINITAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <div class="dropdown">
                        <?php if (isset($_SESSION['user_id'])) { ?>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM users where user_id = '$_SESSION[user_id]'");
                            $stmt->execute();
                            $users = $stmt->fetchAll();
                            foreach ($users as $user) {
                            ?>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="admin">ADMIN</a>
                                    <ul class="dropdown-menu dropdown-menu-end text-small shadow">
                                        <li><a class="dropdown-item" href="#"> <?php echo $user['name']; ?></a></li>
                                        <li><a class="dropdown-item" href="#"> <?php echo $user['email']; ?></a></li>
                                        <li><a class="dropdown-item" href="#">Post an update</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                                    </ul>
                                </li>
                        <?php }
                        } ?>
                </ul>
            </div>
        </div>
    </nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>


<?php
$title = 'Login';
include("header.php");
$invalid = 0;
$no_user = 0;
error_reporting(E_ALL);



if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $query->bindValue(1, $email);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {

        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            header('location:index.php');
        } else {
            $invalid = 1;
        }
    } else {
        $no_user = 1;
    }
}


?>

<style>
    #login {
        font-weight: bolder;
    }
    .form-control:focus {
        border-color: #ced4da;
        box-shadow: none;
    }
</style>

<!-- THIS IS THE LOGIN FORM -->

<?php
if ($invalid) {
    echo '<div class="alert alert-danger" style="text-align:center; font-size: 1.2rem;">
            <strong><i class="fa-solid fa-triangle-exclamation" style="margin-right: 12px";></i>Incorrect e-mail or password!</strong>
            </div>';
}

if ($no_user) {
    echo '<div class="alert alert-danger" style="text-align:center; font-size: 1.2rem;">
            <strong><i class="fa-solid fa-triangle-exclamation" style="margin-right: 12px";></i>No user found!</strong>
            </div>';
}
?>

<body class="main">
    <section class="container-fluid">
        <form action="" class="mx-auto" method="POST" id="input-form">
            <img src="./imgs/logo_trinitas.png" id="logo-trinitas" class="img-fluid">
            <p class="text-center" id="form-title">Log in to avail our services.</p>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                <label for="floatingInput">Password</label>
            </div>
            <button class="w-100 btn btn-primary" id="login-btn" type="submit" name="submit">LOGIN</button>

            <div class="form-link mb-3">
                <span id="validation">Don't have an account yet? <a href="signup.php" class="forgot-password text-center">Sign up here</a> </span>
            </div>

            <p class="text-center" id="or">OR</p>

            <div class="form-link">
                <span id="validation"><a href="index.php" class="forgot-password text-center">Continue browsing</a> </span>
            </div>

            <div class="text-center">
                <span class="copyright">&copy Copyright 2023 Trinitas Home of Contemplation. </br> All rights reserved.</span>
            </div>


        </form>
    </section>
</body>
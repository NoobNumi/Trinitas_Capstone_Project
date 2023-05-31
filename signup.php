<?php
$title = "Sign up";
include("header.php");
$invalid = 0;
$user_exist = 0;


if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $cpassword = ($_POST['cpassword']);

    if ($password === $cpassword) {

        $query = $conn->prepare("SELECT * FROM `users` WHERE first_name = ? AND last_name = ?");
        $query->bindValue(1, $first_name);
        $query->bindValue(2, $last_name);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0) {
            $user_exist = 1;
        } else {
            $query = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
            $run_query = $conn->prepare($query);

            $data = [
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':password' => $passwordHash
                
            ];

            $query_execute = $run_query->execute($data);
            if ($query_execute) {
                echo
                '<script>
                    Swal.fire({
                        title: "Success!",
                        text: "You have successfully signed up!",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2500
                    }).then(() => {
                        window.location.href = "login.php";
                    });
                </script>';
            }
        }
    } else {
        $invalid = 1;
    }
}

?>

<style>
    #signup {
        font-weight: bolder;

    }
    .form-control:focus {
        border-color: #ced4da;
        box-shadow: none;
    }
</style>

<!-- THIS IS THE REGISTRATION / SIGNUP FORM -->

<?php
if ($invalid) {
    echo '<div class="alert alert-danger" style="text-align:center; font-size: 1.2rem;">
            <strong><i class="fa-solid fa-triangle-exclamation" style="margin-right: 12px"></i>Passwords dont match!</strong>
            </div>';
}
if ($user_exist) {
    echo '<div class="alert alert-danger" style="text-align:center; font-size: 1.2rem;">
            <strong><i class="fa-solid fa-triangle-exclamation" style="margin-right: 12px";></i>User already exists!</strong>
            </div>';
}
?>

<body class="main">

    <section class="container-fluid">
        <form action="" class="mx-auto" method="POST" id="input-form">
            <h4 class="text-center" style="font-weight: 700;" id="form-title">Sign Up</h4>
            <p class="text-center" id="form-title">All fields are required.</p>
            <div class="row g-1">
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="first_name" required>
                        <label for="floatingInput">First Name</label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="last_name" required>
                        <label for="floatingInput">Last Name</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                        <label for="floatingInput">Password</label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="cpassword" required>
                        <label for="floatingInput">Confirm Password</label>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                    I have read and agreed to the terms and conditions
                </label>
            </div>

            <button class="w-100 btn btn-primary" id="signup-btn" type="submit" name="submit">SIGN UP</button>

            <div class="form-link mb-3">
                <span id="validation">Already have an account? <a href="login.php" class="forgot-password text-center">Log in here</a> </span>

            </div>

            <div class="text-center">
                <span class="copyright">&copy Copyright 2023 Trinitas Home of Contemplation.</br> All rights reserved.</span>
            </div>


        </form>
    </section>

</body>
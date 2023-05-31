<?php
require("connection.php");
session_start();
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
  <link href="https://fonts.cdnfonts.com/css/circular-std" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title> <?php echo $title; ?></title>
</head>

<style>
  .navbar-collapse {
    transition: all 0.5s ease;
  }

  .nav-link::after {
    display: none;
  }

  .nav-link:hover {
    font-size: 1.2rem;
    transition: 0.5s;
  }

  .navbar-expand-md .navbar-nav .dropdown-menu {
    padding: 10px 20px 19px 11px;
  }

  .form-select:focus,
  .form-control:focus {
    border-color: #ced4da;
    box-shadow: none;
  }

  .label-focus {
    background-color: yellow;
  }

  @media (max-width: 768px) {

    .nav-link {
      padding: 0 0.6rem 0;
      font-size: 1.1rem;
      height: 20px;
    }

  }
</style>


<!-- THIS IS THE GUEST HEADER -->

<body class="main">
  <nav class="navbar navbar-expand-md">
    <div class="container-fluid">
      <a href="#" class="navbar-brand fs-3" id="navbar-title"><img class="logo-mary" src="./imgs/logo_mary.png">TRINITAS</a>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['user_id'])) { ?>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="admin">
              <img class="user-icon" src="./imgs/guest.png">
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small shadow" style="position: absolute;">
              <li>
                <a class="dropdown-item" href="#">
                  <i class="fa-solid fa-user fa-lg me-2"></i>
                  Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="fa-solid fa-message me-2"></i>
                  Messages
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="fa-solid fa-comments fa-sm me-2"></i>
                  Feedback
                </a>
              </li>
              <li>
                <a class="dropdown-item" id="logou" href="logout.php">
                  <i class="fa-solid fa-right-from-bracket me-2"></i>
                  Log out
                </a>
              </li>
            </ul>
          </li>
      </ul> 
    <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Sign up</a>
      </li>
    <?php } ?>
    </ul>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
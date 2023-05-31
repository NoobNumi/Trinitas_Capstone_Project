<?php
$title = "Appointment form";
require("header.php");
$already_filed = 0;
$success = 0;

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $street_add = $_POST['street_add'];
    $city_municipality = $_POST['city_municipality'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];
    $contact_no = $_POST['contact_no'];
    $appoint_sched = $_POST['appoint_sched'];
    $appoint_description = $_POST['appoint_description'];



    $query = $conn->prepare("SELECT * FROM `appoinment_record` WHERE user_id = ?");
    $query->bindValue(1, $user_id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {
        $already_filed = 1;
    } else {
        $query = "INSERT INTO appoinment_record (user_id, first_name, last_name, street_add, city_municipality, province, postal_code, contact_no, appoint_sched, appoint_description) VALUES (:user_id, :first_name, :last_name, :street_add, :city_municipality, :province, :postal_code, :contact_no, :appoint_sched, :appoint_description)";
        $run_query = $conn->prepare($query);

        $data = [
            ':user_id' => $user_id,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':street_add' => $street_add,
            ':city_municipality' => $city_municipality,
            ':province' => $province,
            ':postal_code' => $postal_code,
            ':contact_no' => $contact_no,
            ':appoint_sched' => $appoint_sched,
            ':appoint_description' => $appoint_description
        ];

        $query_execute = $run_query->execute($data);
        if ($query_execute) {
            $success = 1;
        }
    }
}

?>
<style>
    #user-btn {
        cursor: pointer;
    }

</style>

<?php
if ($already_filed) {
    echo '<div class="alert alert-danger" style="text-align:center; font-size: 1.2rem;">
            <strong><i class="fa-solid fa-triangle-exclamation" style="margin-right: 12px";></i>You already filed an appointment!</strong>
            </div>';
}
if ($success) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Appointment successful',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php } ?>

<body class="main">

    <?php
    require("second-header.php");
    ?>
    <section class="container-fluid">

        <a href="index.php" class="back my-5"><i class="fa-solid fa-chevron-left" id="prev-icon"></i></a>
        <div class="row" id="appointment-row">
            <!-- APPOINTMENT STARTS HERE -->

            <form action="" class="mx-auto" method="POST" id="reserve-n-appoint-form">
                <!-- Calendar -->

                <div class="col-md-6" id="calendar" style="float: left;">
                    <h4 class="text-center" style="font-weight: 700;" id="form-title">Available Schedule</h4>
                    <?php include "calendar.php"; ?>
                </div>

                <!-- Appointment Form-->
                <div class="col-md-6" id="reservation">
                    <h4 class="text-center" style="font-weight: 700;" id="form-title">Appointment Form</h4>
                    <p class="text-center" id="form-title">Input details about your appointment</p>
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="first_name" required>
                                <label for="floatingInput" class="form-label">First Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="last_name" required>
                                <label for="floatingInput">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="street" name="street_add" required>
                                <label for="floatingInput">Street</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="municipality" name="city_municipality" required>
                                <label for="floatingInput">Municipality</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-8">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="province" name="province" required>
                                <label for="floatingInput">Province</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Postal Code" name="postal_code" required>
                                <label for="floatingInput">Postal Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="contact_no" id="floatingInput" d="phone" placeholder="Contact Number" required>
                                <label for="floatingInput">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="datetime-local" class="form-control" id="floatingInput" style="padding-bottom: 0px;" name="appoint_sched" required>
                                <label for="floatingInput" style="top: -0.2rem; opacity: 1;">Schedule</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="appoint_description" id="floatingInput" style="height: 100px" required></textarea>
                        <label for="floatingInput" style="transition: all 0.4s;">Appointment Description</label>
                    </div>
                    <?php
                    $select_query = 'SELECT * FROM `users` WHERE user_id = :user_id';
                    $stmt = $conn->prepare($select_query);
                    $stmt->bindParam(':user_id', $_SESSION['user_id']);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($stmt->rowCount() > 0) {
                    ?>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <?php
                    }
                    ?>
                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <a class="w-100 btn btn-primary" id="signup-btn" data-modal-target="modal1">Make an Appointment</a>
                    <?php } else { ?>
                        <button class="w-100 btn btn-primary" id="signup-btn" type="submit" name="submit">Make an Appointment</button>
                    <?php } ?>
                </div>
            </form>

        </div>

    </section>

    <?php require("footer.php"); ?>

</body>
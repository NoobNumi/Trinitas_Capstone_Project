<?php
$title = "Reservation Form";
require("header.php");

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $street_add = $_POST['street_add'];
    $city_municipality = $_POST['city_municipality'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];
    $contact_no = $_POST['contact_no'];
    $catering = isset($_POST['catering']) ? $_POST['catering'] : 'No';
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $price = $_POST['price'] ?? 0;

    $payment_method = $_POST['payment_method'];

    // if ($payment_Method == 'Gcash') {
    //     $howToPay = $_SESSION['how_to_pay'];
    //     $proofOfPayment = $_SESSION['proof_of_payment'];

    $query = "INSERT INTO training_reservation_record (user_id, first_name, last_name, street_add, city_municipality, province, postal_code, contact_no, check_in, check_out, catering, price, payment_method) VALUES (:user_id,:first_name, :last_name, :street_add, :city_municipality, :province, :postal_code, :contact_no, :check_in, :check_out, :catering, :price, :payment_method)";
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
        ':check_in' => $check_in,
        ':check_out' => $check_out,
        ':catering' => $catering,
        ':price' => $price,
        ':payment_method' => $payment_method
    ];

    $query_execute = $run_query->execute($data);
    if ($query_execute) {
        echo '
                <script>
                    Swal.fire({
                        title: "Success!",
                        text: "Reservation created successfully! Please wait for the confirmation",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2500
                    });
                </script>';
    } else {
        echo '
                <script>
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to create reservation",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2500
                    });
                </script>';
    }
}
//}

?>
<style>
    #user-btn {
        cursor: pointer;
    }
</style>

<body class="main">

    <?php
    require("block-modal.php");
    require("send-payment_modal.php");
    require("second-header.php");
    ?>
    <section class="container-fluid">

        <a href="index.php" class="back my-5"><i class="fa-solid fa-chevron-left" id="prev-icon"></i></a>
        <div class="row" id="reservation-row">
            <form action="" class="mx-auto" method="POST" id="reserve-n-appoint-form" enctype="multipart/form-data">
                <!-- Calendar -->

                <div class="col-md-6" id="calendar" style="float: left;">
                    <h4 class="text-center" style="font-weight: 700;" id="form-title">Available Schedule</h4>
                    <?php include "calendar.php"; ?>
                </div>

                <!-- Reservation -->
                <div class="col-md-6" id="services">
                    <h4 class="text-center" style="font-weight: 700;" id="form-title">Reservation Form</h4>
                    <p class="text-center" id="form-title">Trainings</p>
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
                                <label for="floatingInput">Street and Brgy.</label>
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
                                <input type="text" class="form-control" id="floatingInput" placeholder="Postal Code" name="postal_code" required>
                                <label for="floatingInput">Postal Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="tel" class="form-control" name="contact_no" id="floatingInput" d="phone" placeholder="Contact Number" required>
                            <label for="floatingInput">Contact Number</label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="datetime-local" class="form-control check-in" id="floatingInput" style="padding-bottom: 0px;" name="check_in" required>
                                <label for="floatingInput" style="top: -0.2rem; opacity: 1;">Check-in</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="datetime-local" class="form-control check-out" id="floatingInput" style="padding-bottom: 0px;" name="check_out" required>
                                <label for="floatingInput" style="top: -0.2rem; opacity: 1;">Check-out</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <label class="form-check-label" style="margin-top: 19px; margin-left: 4px;" required>Avail catering:</label>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input catering" type="radio" name="catering" id="cateringYes" value="Yes">
                                <label class="form-check-label" for="cateringYes">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input catering" type="radio" name="catering" id="cateringNo" value="No">
                                <label class="form-check-label" for="cateringNo">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="guest-list" style="margin-left: 10px;">
                            <div class="form-floating" style="margin-top: 10px;">
                                <div class="col">
                                    <p style="padding: 2px; float:left;">Price</p>
                                </div>
                                <div class="col price" id="guest-count-box" name="price">
                                    ₱ 0
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="price" id="hidden-price" value="0">
                        <div class="col-5">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="payment_method" required>
                                    <option value="Pay-On-Site">Pay-On-Site</option>
                                    <option value="Gcash">Gcash</option>
                                </select>
                                <label for="floatingSelect">Mode of Payment</label>
                            </div>
                        </div>
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
                    <div class="row">
                        <div class="col">
                            <a class="btn" style="float:left;" id="next-btn" href="index.php">Back</a>
                        </div>
                        <div class="col">
                            <button class="confirm-btn" type="submit" name="submit">Ok</button>
                        </div>
                    </div>

                </div>
                <script>
                    $(document).ready(function() {
                        $("form").submit(function(event) {
                            event.preventDefault();
                            var payment_method = $("#floatingSelect").val();

                            if (payment_method == 'Pay-On-Site') {
                                $("#myModal1").modal("show");
                            } else if (payment_method == 'Gcash') {
                                const modal = document.getElementById('myReserveModal');
                                modal.style.display = 'block';
                            }
                        });

                        $("#myModal1").on('shown.bs.modal', function() {
                            $("#confirmReservationBtn").click(function() {
                                $("form").off('submit').submit();
                            });
                        });

                        $("#myReserveModal").on('shown.bs.modal', function() {
                            $("#gcashConfirmBtn").click(function() {
                                $("form").off('submit').submit();
                            });
                        });
                    });
                    (function updatePrice() {
                        var cateringYesInput = document.querySelector("#cateringYes");
                        var cateringNoInput = document.querySelector("#cateringNo");
                        var checkInInput = document.querySelector(".check-in");
                        var checkOutInput = document.querySelector(".check-out");
                        var priceElement = document.querySelector("#guest-list .price");
                        var hiddenPriceInput = document.querySelector("#hidden-price");

                        function calculatePrice() {
                            var cateringPrice = cateringYesInput.checked ? 800 : 0;
                            var checkIn = new Date(checkInInput.value.replace("T", " "));
                            var checkOut = new Date(checkOutInput.value.replace("T", " "));
                            var days = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));

                            if (isNaN(days)) {
                                priceElement.textContent = "₱ 0";
                                hiddenPriceInput.value = 0;
                            } else {
                                var totalPrice = (days * 8000) + (cateringPrice * days);
                                priceElement.textContent = "₱ " + totalPrice;
                                hiddenPriceInput.value = totalPrice;
                            }
                        }
                        cateringYesInput.addEventListener("change", calculatePrice);
                        cateringNoInput.addEventListener("change", calculatePrice);
                        checkInInput.addEventListener("input", calculatePrice);
                        checkOutInput.addEventListener("input", calculatePrice);

                        calculatePrice();
                    })();
                </script>
                <div class="modal fade" id="myModal1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Confirm reservation now?</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6 class="text-center">Service Type: Trainings</h6>
                                <div class="row g-2">
                                    <div class="col">
                                        <a class="btn" id="next-btn" href="reservation.php">Cancel</a>
                                    </div>
                                    <div class="col">
                                        <button class="confirm-btn" type="submit" name="submit" id="confirmReservationBtn">Confirm</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php require("footer.php"); ?>

</body>
<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $paymentOption = $_POST['how-to-pay'];

//     if (isset($_FILES['proof_of_payment'])) {
//         $file = $_FILES['proof_of_payment'];

//         if ($file['error'] === UPLOAD_ERR_OK) {
//             $fileName = $file['name'];
//             $filePath = $file['tmp_name'];
//             move_uploaded_file($filePath, 'uploads/' . $fileName);
//         }
//     }

// }
?>

<body>
    <div id="myReserveModal" class="reserve-modal">
        <div class="reserve-modal-content">
            <span class="reserve-close">&times;</span>
            <center><img src="./imgs/gcash-logo.png" style="width: 200px"></center>
            <h1 class="text-center">Send your Payment to this number:</h1>
            <p class="text-center" style="font-weight: 700; font-size: 20px;">09123456789</p>
            <p class="text-center" style="color: rgb(247, 46, 46); font-weight: 600; font-size: 18px">*Please double check your Payment. We don't allow refunds.</p>
            <div class="mt-3 w-100">
                <p style="font-weight: 600;">Choose how to pay:</p>
            </div>
            <div class="row g-2">
                <div class="col-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="how-to-pay" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pay Full Now
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="how-to-pay" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pay Half First
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="input-group mb-0 mt-3">
                    <input type="file" name="proof_of_payment" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                </div>
                <div class="row g-2">
                    <div class="col">
                        <a class="btn" id="next-btn" href="recollection_form.php">Cancel</a>
                    </div>
                    <div class="col">
                        <button class="confirm-btn" type="submit" name="gcash_submit" id="gcashConfirmBtn">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var modal = document.getElementById("myReserveModal");
        var span = document.getElementsByClassName("reserve-close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        };
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>
</body>
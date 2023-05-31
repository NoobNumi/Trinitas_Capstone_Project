<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $selectedOption = $_POST['service_type'];

  switch ($selectedOption) {
    case 'Recollection':
      header('Location: recollection_form.php');
      exit;
    case 'Reception':
      header('Location: reception_form.php');
      exit;
    case 'Trainings':
      header('Location: trainings_form.php');
      exit;
    case 'Seminar':
      header('Location: seminar_form.php');
      exit;
    case 'Retreat':
      header('Location: retreat_form.php');
      exit;
    default:
      header('Location: reservation.php');
      break;
  }
}

?>
  <form action="" method="POST">
    <div id="myReserveModal" class="reserve-modal">
      <div class="reserve-modal-content">
        <span class="reserve-close">&times;</span>
        <h1 class="text-center">Choose a service that you like</h1>
        <div class="form-floating">
          <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="service_type">
            <option value="Recollection">Recollection</option>
            <option value="Reception">Reception</option>
            <option value="Trainings">Trainings</option>
            <option value="Seminar">Seminar</option>
            <option value="Retreat">Retreat</option>
          </select>
          <label for="floatingSelect">Service Category</label>
        </div>
        <div class="row g-2">
          <div class="col">
            <a class="btn" id="next-btn" href="reservation.php">Cancel</a>
          </div>
          <div class="col">
            <button class="confirm-btn" type="submit" name="submit">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  </form>
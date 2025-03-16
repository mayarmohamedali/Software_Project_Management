<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserve a Pet</title>
  <link rel="stylesheet" href="reservation.css">
</head>
<body>
  <div class="feedback-container">
    <h2>Reserve Your New Friend</h2>
    <form id="reservation-form">
      <div class="input_field">
        <label for="pet-name">Pet Name:</label>
        <input type="text" id="pet-name" name="pet-name" placeholder="Enter pet name" required>
      </div>

      <div class="input_field">
        <label for="day">Choose a Day:</label>
        <input type="date" id="day" name="day" required>
      </div>

      <div class="input_field">
        <label for="time">Choose a Time:</label>
        <input type="time" id="time" name="time" required>
      </div>

      <div class="input_field">
        <label for="store">Choose a Store:</label>
        <select id="store" name="store" required>
          <option value="">Select a store</option>
          <option value="store-1">Store 1 - Fifth Settlement</option>
          <option value="store-2">Store 2 - Nasr City</option>
          <option value="store-3">Store 3 - Maadi</option>
        </select>
      </div>

      <div class="btn">
        <input type="submit" value="Reserve Now">
      </div>
    </form>
  </div>

  <!-- Thank You Modal -->
  <div class="modal" id="thankYouModal">
    <div class="modal-content">
      <h2>Thank You!</h2>
      <p>Your Reservation has been saved</p>
      <div class="btn">
        <input type="button" id="closeModalBtn" value="Close">
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const reservationForm = document.getElementById("reservation-form");
      const modal = document.getElementById("thankYouModal");
      const closeModalBtn = document.getElementById("closeModalBtn");

      // Handle form submission
      reservationForm.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent form submission

        // Validate inputs
        const petName = document.getElementById("pet-name").value;
        const day = document.getElementById("day").value;
        const time = document.getElementById("time").value;
        const store = document.getElementById("store").value;

        if (!petName || !day || !time || !store) {
          alert("Please fill out all fields.");
          return;
        }

        // Show the Thank You modal
        modal.style.display = "flex";
      });

      // Close modal button logic
      closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
        // Redirect to rating.php after closing the modal
        window.location.href = "rating.php";
      });
    });
  </script>
</body>
</html>
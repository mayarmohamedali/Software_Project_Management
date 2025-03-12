<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Page</title>
  <link rel="stylesheet" href="rating.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

</head>
<body>

  <div class="rating-box">
    <header>How was your experience?</header>
    <div class="stars">
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
    </div>
    <form method="POST" id="feedbackForm" action="">
      <div class="input_field">
        <textarea id="feedback"  name="feedback" placeholder="Your Feedback"></textarea>
      </div>
      <div class="btn">
     
      </div>
    </form>
    <button class="submit-btn">Submit</button>
  </div>

  <!-- Modal HTML -->
  <div class="modal" id="thankYouModal">
    <div class="modal-content">
      <h2>Thank You!</h2>
      <p>We appreciate your feedback.</p>
      <button class="close-btn">Close</button>
    </div>
  </div>
  <script>

document.addEventListener("DOMContentLoaded", () => {
  const stars = document.querySelectorAll(".stars i");
  const submitBtn = document.querySelector(".submit-btn");
  const modal = document.getElementById("thankYouModal");
  const closeModalBtn = document.querySelector(".close-btn");
  let submitted = false;

  // Star rating logic
  stars.forEach((star, index1) => {
    star.addEventListener("click", () => {
      if (!submitted) {
        stars.forEach((star, index2) => {
          index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
        });
      }
    });
  });

  // Submit button logic to show the modal
  submitBtn.addEventListener("click", () => {
    if (!submitted) {
      submitted = true;
      modal.style.display = "flex"; // Show the modal
    }
  });

  // Close modal button logic and redirect to index.html
  closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
    // Redirect to index.html
    window.location.href = "index.php";
  });
});
    </script>
 
</body>
</html>
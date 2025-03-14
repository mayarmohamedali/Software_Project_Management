<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choose</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

</head>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
    
  }
  body{
   background: rgb(255, 230, 180);
  }
  
.all{
    margin: 15px auto 0 auto;
    background: white; /* White background */
    padding: 20px; /* Optional: Adds spacing inside the div */
    max-width: 90%; /* Adjusts the width to take up to 80% of the viewport */
    border-radius: 10px; /* Optional: Gives rounded edges */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Adds a soft shadow effect */
}

.org {
    text-align: center;
    font-size: 43px;
    font-weight: bold;
    background: linear-gradient(to right, #9B6A2F, #F7C873);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; /* Creates a gradient text effect */
    margin-bottom: 20px;
    font-family: 'Dancing Script', cursive; /* Gives an elegant look */
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.25);
    letter-spacing: 2px;
    padding: 10px 0;
    border-radius: 8px;
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

  .head {
    font-size: 24px; /* Larger text */
    font-weight: bold; /* Make it stand out */
    text-align: center;
    color: #fff; /* Dark color for readability */
    background: rgb(255, 198, 43); /* Matching background */
    padding: 20px 20px;
    border-radius: 15px; /* Rounded edges to match the wrapper */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
    width: 100%;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.options-container {
    display: flex;
    gap: 20px; /* Increased gap between cards */
    flex-wrap: wrap;
    justify-content: center;
}

.card {
    background: rgb(255, 230, 180);
    border-radius: 12px; /* Increased border-radius for a more modern look */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Stronger shadow */
    padding: 20px;
    width: 250px; /* Increased width */
    text-align: center;
    margin: 40px 10px;
}
.card:hover{
    transform: scale(1.07); /* Slightly enlarge the button */
    transition: transform 0.3s ease-in-out, background-color 0.3s;
}
.card img {
    width: 100%;
    height: 200px; /* Increased height for better visibility */
    object-fit: cover; /* Ensures the image fills the area without stretching */
    border-radius: 10px;
}

.card h3 {
    font-size: 20px; /* Slightly larger title */
    margin: 15px 0;
}

.add-to-cart {
    background-color: rgb(255, 198, 43); /* Set button background to yellow */
    color: black; /* Set text color */
    font-size: 18px;
    padding: 12px 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease-in-out; /* Smooth transition for hover effect */
    width: 80%;
    margin: 10px auto;
    font-weight: bold;
    text-transform: uppercase;
}

.add-to-cart:hover {
    background-color: white; /* Change background color to white */
    color: black; /* Optional: Change text color if needed */
    
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3); /* Enhance shadow effect */
}

</style>



<body>
    
<div class="all" >
<div class="container">  
    <p class="org">Pet World! is thrilled to help you</p>
<p class="head"> please choose which category would you like to shop</p>
</div>
<div class="options-container">
<div class="card">
    <a href="dogs.php" style="text-decoration: none; color: inherit;">
        <img src="dog.webp" alt="dog">
        <h3>Dogs</h3>
        <button class="add-to-cart">shop</button>
    </a>
</div>

            <div class="card">
            <a href="cats.php" style="text-decoration: none; color: inherit;">
                <img src="cats.png" alt="cat">
                <h3>Cats</h3>
                <button class="add-to-cart">shop</button>
            </div>

            <div class="card">
            <a href="turtles.php" style="text-decoration: none; color: inherit;">
                <img src="turtle.jpg" alt="turtle">
                <h3>Turtles</h3>
                <button class="add-to-cart">shop</button>
            </div>
        </div>
    </div>
</body>
</html>
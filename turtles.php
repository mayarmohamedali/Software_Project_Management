<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turtles - Pet World!</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            background: rgb(255, 230, 180);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .all {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .org {
            text-align: center;
            font-size: 43px;
            font-weight: bold;
            background: linear-gradient(to right, #9B6A2F, #F7C873);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            font-family: 'Dancing Script', cursive;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.25);
            letter-spacing: 2px;
            padding: 10px 0;
            border-radius: 8px;
            animation: fadeIn 1s ease-in-out;
        }

        .head {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background: rgb(255, 198, 43);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
        }

        .search-bar input[type="text"]::placeholder {
            color: #999;
        }

        /* Turtle Container */
        .turtle-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .turtle-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .turtle-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .turtle-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .turtle-card h3 {
            font-size: 20px;
            margin: 15px 0;
            color: #333;
        }

        .turtle-card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .price {
            font-size: 18px;
            color: #333;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Reserve Now Button */
        .reserve-button {
            display: inline-block;
            background-color: rgb(255, 198, 43);
            color: black;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            margin-top: 10px;
        }

        .reserve-button:hover {
            background-color: white;
            color: black;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .turtle-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .search-bar input[type="text"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="all">
        <div class="container">
            <p class="org">Pet World! - Turtles</p>
            <p class="head">Explore our selection of turtles</p>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="search" placeholder="Search for a turtle type...">
        </div>

        <!-- Turtle Container -->
        <div class="turtle-container">
            <?php
            // Sample data for turtles
            $turtles = [
                [
                    'name' => 'Red-Eared Slider',
                    'image' => 'RedEar.jpg',
                    'description' => 'Popular aquatic turtle with distinctive red markings.',
                    'price' => '$50'
                ],
                [
                    'name' => 'Box Turtle',
                    'image' => 'boxturtle.jpg',
                    'description' => 'Land-dwelling turtle with a hinged shell.',
                    'price' => '$100'
                ],
                [
                    'name' => 'Painted Turtle',
                    'image' => 'paintedturtle.Webp',
                    'description' => 'Colorful turtle native to North America.',
                    'price' => '$70'
                ],
                [
                    'name' => 'Snapping Turtle',
                    'image' => 'snapping.jpg',
                    'description' => 'Large, aggressive turtle with a powerful bite.',
                    'price' => '$120'
                ],
                [
                    'name' => 'Green Sea Turtle',
                    'image' => 'Greensea.jpg',
                    'description' => 'Marine turtle known for its greenish-colored fat.',
                    'price' => '$200'
                ]
            ];

            // Loop through the turtles array and display each turtle
            foreach ($turtles as $turtle) {
                echo '
                <div class="turtle-card" data-name="' . strtolower($turtle['name']) . '">
                    <img src="' . $turtle['image'] . '" alt="' . $turtle['name'] . '">
                    <h3>' . $turtle['name'] . '</h3>
                    <p>' . $turtle['description'] . '</p>
                    <p class="price"><strong>Price:</strong> ' . $turtle['price'] . '</p>
                    <a href="turtle_details.php?type=' . urlencode($turtle['name']) . '" class="reserve-button">Reserve Now</a>
                </div>';
            }
            ?>
        </div>
    </div>

    <!-- JavaScript for Search Functionality -->
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const turtleCards = document.querySelectorAll('.turtle-card');

            turtleCards.forEach(card => {
                const name = card.getAttribute('data-name');
                if (name.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
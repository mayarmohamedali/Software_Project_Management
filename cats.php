<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats - Pet World!</title>
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

        /* Cat Container */
        .cat-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .cat-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .cat-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .cat-card h3 {
            font-size: 20px;
            margin: 15px 0;
            color: #333;
        }

        .cat-card p {
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
            .cat-container {
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
            <p class="org">Pet World! - Cats</p>
            <p class="head">Explore our selection of cats</p>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="search" placeholder="Search for a cat breed...">
        </div>

        <!-- Cat Container -->
        <div class="cat-container">
            <?php
            // Sample data for cats
            $cats = [
                [
                    'name' => 'Siamese',
                    'image' => 'siamesecat.jpg',
                    'description' => 'Elegant and vocal, known for their striking blue eyes.',
                    'price' => '$800'
                ],
                [
                    'name' => 'Persian',
                    'image' => 'persian.jpg',
                    'description' => 'Luxurious long fur and a calm, gentle temperament.',
                    'price' => '$1200'
                ],
                [
                    'name' => 'Maine Coon',
                    'image' => 'mainecoon.jpg',
                    'description' => 'Large, friendly, and known for their tufted ears.',
                    'price' => '$1500'
                ],
                [
                    'name' => 'Bengal',
                    'image' => 'bengal.jpg',
                    'description' => 'Energetic and playful with a wild, leopard-like appearance.',
                    'price' => '$1000'
                ],
                [
                    'name' => 'Ragdoll',
                    'image' => 'ragdollcat.Webp',
                    'description' => 'Docile and affectionate, often going limp when held.',
                    'price' => '$1100'
                ]
            ];

            // Loop through the cats array and display each cat
            foreach ($cats as $cat) {
                echo '
                <div class="cat-card" data-name="' . strtolower($cat['name']) . '">
                    <img src="' . $cat['image'] . '" alt="' . $cat['name'] . '">
                    <h3>' . $cat['name'] . '</h3>
                    <p>' . $cat['description'] . '</p>
                    <p class="price"><strong>Price:</strong> ' . $cat['price'] . '</p>
                    <a href="cat_details.php?breed=' . urlencode($cat['name']) . '" class="reserve-button">Reserve Now</a>
                </div>';
            }
            ?>
        </div>
    </div>

    <!-- JavaScript for Search Functionality -->
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const catCards = document.querySelectorAll('.cat-card');

            catCards.forEach(card => {
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
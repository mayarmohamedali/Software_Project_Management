<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogs - Pet World!</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
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

        /* Search and Filter Section */
        .search-filter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-filter input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .search-filter select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        /* Dog Container */
        .dog-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .dog-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .dog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .dog-card h3 {
            font-size: 20px;
            margin: 15px 0;
            color: #333;
        }

        .dog-card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .dog-card a {
            text-decoration: none;
            color: white;
            background: rgb(255, 198, 43);
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .dog-card a:hover {
            background: rgb(255, 180, 43);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        .pagination a {
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .pagination a:hover {
            background: #f0f0f0;
        }

        .pagination a.active {
            background: rgb(255, 198, 43);
            color: white;
            border-color: rgb(255, 198, 43);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dog-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .search-filter {
                flex-direction: column;
            }

            .search-filter input[type="text"],
            .search-filter select {
                width: 100%;
            }
            .price {
            font-size: 18px;
            color: #333;
            font-weight: bold;
            margin-top: 10px;
        }
        }
    </style>
</head>
<body>
    <div class="all">
        <div class="container">
            <p class="org">Pet World! - Dogs</p>
            <p class="head">Explore our selection of dogs</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="search-filter">
            <input type="text" id="search" placeholder="Search for a dog breed...">
            <select id="filter">
                <option value="">All Breeds</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>

        <!-- Dog Container -->
        <div class="dog-container">
            <?php
            // Sample data for dogs (can be replaced with database or API data)
            $dogs = [
                [
                    'name' => 'Golden Retriever',
                    'image' => 'GoldenRetriever.jpg',
                    'description' => 'Outgoing, trustworthy, and eager-to-please family dogs, and relatively easy to train.',
                    'size' => 'large',
                    'price' => '$1200'
                ],
                [
                    'name' => 'German Shepherd',
                    'image' => 'GermanShpherd.avif',
                    'description' => 'Large, agile, muscular dog of noble character and high intelligence.',
                    'size' => 'large',
                    'price' => '$1500'
                ],
                [
                    'name' => 'Bulldog',
                    'image' => 'Bulldog.jpg',
                    'description' => 'thick-set, low-slung, well-muscled bruiser .',
                    'size' => 'medium',
                    'price' => '$1000'
                ],
                [
                    'name' => 'Poodle',
                    'image' => 'Poodle.jpg',
                    'description' => 'leggy appearance and a long muzzle combined with dropped ears.',
                    'size' => 'medium',
                    'price' => '$1100'
                ],
                [
                    'name' => 'Chihuahua',
                    'image' => 'Chinhanuha.avif',
                    'description' => ' a balanced, graceful dog of terrier-like demeanor, weighing no more than 6 pounds.',
                    'size' => 'small',
                    'price' => '$800'
                ]
            ];

            // Loop through the dogs array and display each dog
            foreach ($dogs as $dog) {
                echo '
                <div class="dog-card" data-size="' . $dog['size'] . '">
                    <img src="' . $dog['image'] . '" alt="' . $dog['name'] . '">
                    <h3>' . $dog['name'] . '</h3>
                    <p>' . $dog['description'] . '</p>
                    <p class="price"><strong>Price:</strong> ' . $dog['price'] . '</p>
                    <a href="dog_details.php?breed=' . urlencode($dog['name']) . '"> Reserve Now</a>
     
                </div>';
            }
            ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
        </div>
    </div>

    <!-- JavaScript for Search and Filter -->
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const dogCards = document.querySelectorAll('.dog-card');

            dogCards.forEach(card => {
                const name = card.querySelector('h3').textContent.toLowerCase();
                if (name.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        document.getElementById('filter').addEventListener('change', function() {
            const filterValue = this.value;
            const dogCards = document.querySelectorAll('.dog-card');

            dogCards.forEach(card => {
                const size = card.getAttribute('data-size');
                if (filterValue === '' || size === filterValue) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
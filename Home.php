<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogs & Stores - Pet World!</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        }

        /* Dog & Store Container */
        .container-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card h3 {
            font-size: 20px;
            margin: 15px 0;
            color: #333;
        }

        .card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .card a {
            text-decoration: none;
            color: white;
            background: rgb(255, 198, 43);
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .card a:hover {
            background: rgb(255, 180, 43);
        }
    </style>
</head>
<body>
    <div class="all">
        <div class="container">
            <p class="org">Pet World! - Dogs & Stores</p>
        </div>

        <div class="container-grid">
    <?php
    $stores = [
        ['name' => 'Pet World', 'image' => 'https://images.pexels.com/photos/8640437/pexels-photo-8640437.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'description' => 'Your one-stop shop for all pet needs.', 'link' => 'category.php'],
        ['name' => 'Paws', 'image' => 'https://media.istockphoto.com/id/1892103156/photo/a-young-man-and-his-pup-at-the-pet-shop.jpg?s=1024x1024&w=is&k=20&c=dot03TmQPMH49UcFSUGAnjVA3-r5Q14cdjRqBf_JJwM=', 'description' => 'Find everything your furry friend loves.', 'link' => 'store_paws.php'],
        ['name' => 'Adopt It', 'image' => 'https://images.pexels.com/photos/31115532/pexels-photo-31115532/free-photo-of-adorable-cocker-spaniel-looking-upward.jpeg?auto=compress&cs=tinysrgb&w=600', 'description' => 'Adopt a loving pet today!', 'link' => 'store_adoptit.php']
    ];
    
    foreach ($stores as $store) {
        echo '<div class="card">
            <img src="' . $store['image'] . '" alt="' . $store['name'] . '">
            <h3>' . $store['name'] . '</h3>
            <p>' . $store['description'] . '</p>
            <a href="' . $store['link'] . '">Visit Store</a>
        </div>';
    }
    ?>
</div>

</body>
</html>
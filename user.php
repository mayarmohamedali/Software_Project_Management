<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard">
        <header class="header">
            <h1>Welcome to CampusCravingHub Dashboard</h1>
            <form action="logout.php" method="POST" id="logout-form">
    <button class="logout-btn" type="button">Logout</button>
</form>
        </header>
        <div class="restaurant-gallery">
            <div class="restaurant" onclick="showMenu(1)">
                <h3>R2GO</h3>
            </div>
            <div class="restaurant" onclick="showMenu(2)">
                <h3>GYRO</h3>
            </div>
            <div class="restaurant" onclick="showMenu(3)">
                <h3>SHABRAWY</h3>
            </div>
            <div class="restaurant" onclick="showMenu(4)">
                <h3>BATATES&ZALABYA</h3>
            </div>
            <div class="restaurant" onclick="showMenu(5)">
                <h3>MAN2OCHA</h3>
            </div>
            <div class="restaurant" onclick="showMenu(6)">
                <h3>SBARO</h3>
            </div>
            <div class="restaurant" onclick="showMenu(7)">
                <h3>TBS</h3>
            </div>
            <div class="restaurant" onclick="showMenu(8)">
                <h3>CINNABON</h3>
            </div>
            <div class="restaurant" onclick="showMenu(9)">
                <h3>FRESKO</h3>
            </div>
        </div>
        <div id="menu-container" class="menu-container">
            <h2 id="menu-title">Menu</h2>
            <div id="menu-items">
                <!-- Dynamic menu items will be shown here -->
            </div>
        </div>
    </div>

    <!-- Cart Section -->
    <div class="cart" id="cart">
        <h3>Your Cart</h3>
        <ul id="cart-items">
            <!-- Cart items will be listed here -->
        </ul>
        <button class="cart-btn" onclick="viewCart()">View Cart</button>
    </div>

    <script>
        let cart = [];
        
        function showMenu(restaurantId) {
            const menuContainer = document.getElementById("menu-container");
            const menuItemsContainer = document.getElementById("menu-items");
            const menuTitle = document.getElementById("menu-title");

            // Set dynamic title for each restaurant
            menuTitle.innerText = `Menu for Restaurant ${restaurantId}`;

            // Clear previous menu items
            menuItemsContainer.innerHTML = '';

            let menuData = [];

            switch (restaurantId) {
                case 1:
                    menuData = [{ name: 'Brownies', img: 'The Best Fudge Brownies (with Crackly Tops) -.jpg', price: 50 }];
                    break;
                case 2:
                    menuData = [{ name: 'Crispy chicken sandwich', img: 'Crispy Buffalo Chicken Sandwich Recipe.jpg', price: 110 }, { name: 'Fries', img: 'Crispy Air Fryer Sweet Potato Fries (Easy, Healthy Snack Idea!).jpg', price: 55 }];
                    break;
                case 3:
                    menuData = [
                        { name: 'Cheese with tomato', img: 'Grilled Cheese, Bacon and Oven-Dried Tomato Sandwich.jpg', price: 25 },
                        { name: 'Falafel sandwich', img: 'Falafel Sandwich - Fufus Kitchen.jpg', price: 8 },
                        { name: 'Fool sandwich', img: 'IMG_0266-Edit-2-600x400.jpg', price: 8 },
                        { name: 'Fries sandwich', img: 'Polish-boy-cleveland.jpg', price: 17 },
                    ];
                    break;
                case 4:
                    menuData = [{ name: 'Batates', img: 'batates.jpg', price: 45 }, { name: 'Corn dog', img: 'corndog.jpg', price: 35 }];
                    break;
                case 5:
                    menuData = [
                        { name: 'Man2ocha labna', img: 'labna.jpg', price: 90 },
                        { name: 'Man2ocha meat', img: 'download (1).jpg', price: 110 },
                        { name: 'Man2ocha za3tar', img: 'Easy Manakish Zaatar.jpg', price: 60 },
                    ];
                    break;
                case 6:
                    menuData = [{ name: 'Pizza', img: 'Screenshot 2024-12-23 124200.png', price: 60 }, { name: 'Salad', img: 'salad.jpg', price: 80 }];
                    break;
                case 7:
                    menuData = [
                        { name: 'Coffee', img: 'coffe.jpg', price: 110 },
                        { name: 'Croissont', img: 'Chocolate Almond Croissants.jpg', price: 70 },
                        { name: 'Donut', img: 'donut.jpg', price: 60 },
                    ];
                    break;
                case 8:
                    menuData = [
                        { name: 'Coffee', img: 'coffe.jpg', price: 100},
                        { name: 'Caramel peacan cinnabon', img: 'Caramel Pecan Rolls.jpg', price: 120 },
                        { name: 'Chocolcate cinnabon', img: 'Chocolate Cinnamon Rolls.jpg', price: 100 },
                        { name: 'Cinnabon bites', img: 'cinnabon bites.jpg', price: 85 },
                    ];
                    break;
                case 9:
                    menuData = [
                        { name: 'Coffee', img: 'coffe.jpg', price: 35 },
                        { name: 'Cookies', img: 'cookies.jpg', price: 35 },
                        { name: 'Croissont Turkey with cheese', img: 'Baked Turkey & Cheese Croissant Delight.jpg', price: 55 },
                        { name: 'Cupcake', img: 'cupcake.jpg', price: 45},
                    ];
                    break;
                default:
                    break;
            }

             // Display menu items dynamically
        menuData.forEach(item => {
            const menuItem = document.createElement("div");
            menuItem.classList.add("menu-item");
            menuItem.innerHTML = `
                <img src="${item.img}" alt="${item.name}">
                <h4>${item.name}</h4>
                <p>Price: $${item.price}</p>
                <button class="add-to-cart-btn" onclick="addToCart('${item.name}', ${item.price})">Add to Cart</button>
            `;
            menuItemsContainer.appendChild(menuItem);
        });

        // Display the menu container
        menuContainer.style.display = "block";
    }

    // Add item to cart
    function addToCart(name, price) {
        cart.push({ name, price });
        updateCart();
    }

    // Update the cart
    function updateCart() {
        const cartItemsContainer = document.getElementById("cart-items");
        cartItemsContainer.innerHTML = '';
        let total = 0;

        cart.forEach(item => {
            const cartItem = document.createElement("li");
            cartItem.innerHTML = `${item.name} - $${item.price}`;
            cartItemsContainer.appendChild(cartItem);
            total += item.price;
        });

        // Show the cart
        const cartContainer = document.getElementById("cart");
        cartContainer.style.display = cart.length > 0 ? "block" : "none";
    }

    // View the cart (redirect to checkout page)
    function viewCart() {
        // Save the cart data to sessionStorage
        sessionStorage.setItem('cart', JSON.stringify(cart));

        // Redirect to the checkout page
        window.location.href = 'checkout.php';
    }

    // Logout functionality
    document.querySelector('.logout-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default action (form submission)
    
    // Redirect to logout.php
    window.location.href = 'logout.php'; // This will go to logout.php
});
    </script>
</body>
</html>

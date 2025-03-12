<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(246, 236, 208);
            color: black;
            padding: 20px;
        }

        .checkout-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: rgb(255, 211, 91);
            text-align: center;
            margin-bottom: 30px;
        }

        .order-summary {
            margin-bottom: 30px;
        }

        .order-summary h2 {
            font-size: 24px;
            color: rgb(255, 211, 91);
        }

        .order-summary ul {
            list-style: none;
            padding: 0;
        }

        .order-summary li {
            margin-bottom: 10px;
        }

        .order-summary .total {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            color: rgb(255, 211, 91);
        }

        .section {
            margin-bottom: 20px;
        }

        .section h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: rgb(255, 211, 91);
        }

        .select-option {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
        }

        .checkout-btn {
            background-color: rgb(255, 211, 91);
            color: black;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            margin-top: 20px;
        }

        .checkout-btn:hover {
            background-color: rgb(255, 181, 37);
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h1>Checkout</h1>

        <!-- Order Summary -->
        <div class="order-summary">
            <h2>Order Summary</h2>
            <ul id="order-list">
                <!-- Dynamically populated list of items -->
            </ul>
            <div class="total">
                Total: $<span id="order-total">0</span>
            </div>
        </div>

        <!-- Delivery Options -->
        <div class="section">
            <h3>Delivery Option</h3>
            <select class="select-option" id="delivery-option">
                <option value="pickup">Pickup</option>
                <option value="delivery">Delivery</option>
            </select>

            <div id="building-options" style="display: none;">
                <h3>Select Building for Delivery</h3>
                <select class="select-option" id="delivery-building">
                    <option value="N">Building N</option>
                    <option value="S">Building S</option>
                    <option value="R">Building R</option>
                    <option value="K">Building K</option>
                    <option value="MAIN">Building MAIN</option>
                    <option value="PHARMACY">Building PHARMACY</option>
                </select>
            </div>
        </div>

        <!-- Payment Options -->
        <div class="section">
            <h3>Payment Option</h3>
            <select class="select-option" id="payment-option">
                <option value="cash">Cash</option>
                <option value="visa">Visa</option>
                <option value="telda">Telda</option>
                <option value="instapay">InstaPay</option>
                <option value="digital-wallet">Digital Wallet (Future Support)</option>
            </select>
        </div>

        <!-- Checkout Button -->
        <button class="checkout-btn" onclick="submitCheckout()">Checkout</button>
    </div>

    <script>
    // Retrieve cart from sessionStorage
    const cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    // Function to populate order summary dynamically
    function populateOrderSummary() {
        const orderList = document.getElementById("order-list");
        let total = 0;

        cart.forEach(item => {
            const li = document.createElement("li");
            li.innerText = `${item.name} - $${item.price}`;
            orderList.appendChild(li);
            total += item.price;
        });

        // Display total price
        document.getElementById("order-total").innerText = total;
    }

    // Show delivery building options if the delivery option is selected
    document.getElementById("delivery-option").addEventListener("change", function () {
        const buildingOptions = document.getElementById("building-options");
        if (this.value === "delivery") {
            buildingOptions.style.display = "block";
        } else {
            buildingOptions.style.display = "none";
        }
    });

    // Function to handle checkout
    function submitCheckout() {
        const deliveryOption = document.getElementById("delivery-option").value;
        const paymentOption = document.getElementById("payment-option").value;
        const buildingOption =
            deliveryOption === "delivery" ? document.getElementById("delivery-building").value : "N/A"; // Pickup doesn't need a building

        const totalAmount = document.getElementById("order-total").innerText;

        // Send order details to the server
        fetch("save_order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                cart: cart,
                deliveryOption: deliveryOption,
                paymentOption: paymentOption,
                buildingOption: buildingOption,
                totalAmount: totalAmount,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    alert("Order placed successfully!");
                    sessionStorage.removeItem("cart"); // Clear the cart
                    window.location.href = "order_summary.php"; // Redirect to confirmation page
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("An error occurred. Please try again.");
            });
    }

    // Populate the order summary when the page loads
    window.onload = function () {
        populateOrderSummary();
    };
</script>

</body>
</html>

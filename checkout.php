<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ovo&display=swap');

        body {
            font-family: 'Ovo', serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #cab273;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        #checkout-list {
            width: 50%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .checkout-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .checkout-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 10px;
        }

        .checkout-container {
            width: 50%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .billing-details {
            background: #FFFDD0;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .billing-details label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .billing-details input,
        .billing-details select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background:rgb(221, 255, 0);
            color: black;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background:rgb(179, 173, 0);
        }

        .payment-icons {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 10px;
        }

        .payment-icons img {
            width: 50px;
            height: auto;
            margin: 5px;
        }
    </style>
</head>
<body>

    <h1>Checkout</h1>

    <!-- Cart Items at the Top -->
    <div id="checkout-list">
        <h2>Your Cart</h2>
        <div id="cart-items">
            <p>Loading cart...</p>
        </div>
    </div>

    <!-- Checkout Form -->
    <div class="checkout-container">
        <h2>Billing Details</h2>
        <div class="billing-details">
            <form id="checkout-form" action="place_order.php" method="POST">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" required>
                  <option value="Google Pay">Google Pay</option>
                  <option value="Paytm">Paytm</option>
                  <option value="CRED">CRED</option>
                  <option value="Cash on Delivery">Cash on Delivery</option>
                </select>

                <!-- Payment Icons -->
                <div class="payment-icons">
                    <img src="images/google pay.png" alt="Google Pay">
                    <img src="images/paytm.png" alt="Paytm">
                    <img src="images/cred.jpeg" alt="CRED">
                    <img src="images/cash on delivery.png" alt="COD">
                </div>

                
                <form id="checkout-form" action="place_order.php" method="POST">
    <button type="submit" id="place-order-btn" class="submit-btn">Place Order</button>
</form>

   
            </form>
        </div>
    </div>

    <div id="total-container">
        <p>Total Quantity: <span id="total-quantity">0</span></p>
        <p>Total Price: $<span id="total-price">0.00</span></p>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const files = ['earings.json', 'chains.json', 'rings.json', 'necklaces.json', 'bracelates.json'];

    Promise.all(files.map(file => fetch(file).then(res => res.json())))
        .then(dataArrays => {
            const products = dataArrays.flat(); // Combine all products
            const cart = JSON.parse(localStorage.getItem("cart-earings")) || [];
            const cartItemsContainer = document.getElementById("cart-items");
            const totalQuantityElement = document.getElementById("total-quantity");
            const totalPriceElement = document.getElementById("total-price");

            let totalPrice = 0;
            let totalQuantity = 0;

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = "<p>Your cart is empty.</p>";
                return;
            }

            let html = '';
            cart.forEach(cartItem => {
                let product = products.find(p => p.id == cartItem.product_id);
                if (product) {
                    let itemTotal = parseFloat(product.price) * cartItem.quantity;
                    totalPrice += itemTotal;
                    totalQuantity += cartItem.quantity;

                    html += `
                        <div class="checkout-item">
                            <img src="${product.image}" alt="${product.name}">
                            <div class="name"><strong>${product.name}</strong></div>
                            <div class="price">₹${parseFloat(product.price).toFixed(2)} x ${cartItem.quantity} = ₹${itemTotal.toFixed(2)}</div>
                        </div>
                    `;
                }
            });

            cartItemsContainer.innerHTML = html;
            totalQuantityElement.innerText = totalQuantity;
            totalPriceElement.innerText = totalPrice.toFixed(2);
        })
        .catch(error => {
            console.error('Error loading products:', error);
            document.getElementById("cart-items").innerHTML = "<p>Error loading cart items.</p>";
        });

    document.getElementById("checkout-form").addEventListener("submit", function () {
        localStorage.removeItem("cart-earings"); // Clear cart after order placement
    });

    let placeOrderBtn = document.getElementById("place-order-btn");
    if (placeOrderBtn) {
        placeOrderBtn.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default form submission
            document.getElementById("checkout-form").submit(); // Submit form manually
        });
    }
});

document.getElementById("checkout-form").addEventListener("submit", function () {
    localStorage.removeItem("cart"); // Clear cart after order placement
});

document.addEventListener("DOMContentLoaded", function () {
        let placeOrderBtn = document.getElementById("place-order-btn");
        if (placeOrderBtn) {
             placeOrderBtn.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default form submission
                window.location.href = "place order.html"; // Redirect to place_order.php
            });
        }
    });
</script>

</body>
</html>
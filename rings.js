let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let listCartHTML = document.querySelector('.listCart');
let iconCartSpan = document.querySelector('.icon-cart span');
let listProductHTML = document.querySelector('.listProduct');
let cartTab = document.querySelector('.cartTab');

let listProducts = [];
let carts = [];

const storageKey = 'cart-earings';

// Toggle cart visibility
iconCart.addEventListener('click', () => {
    cartTab.classList.toggle('active');
});
closeCart.addEventListener('click', () => {
    cartTab.classList.remove('active');
});

// Add products to HTML
const addDataToHtml = () => {
    listProductHTML.innerHTML = '';
    if (listProducts.length > 0) {
        listProducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('item');
            newProduct.dataset.id = product.id;

            newProduct.innerHTML = `
                <img src="${product.image}" alt="earing">
                <h2>${product.name}</h2>
                <div class="price">₹${product.price}</div>
                <button class="addCart">Add to Cart</button>
            `;

            listProductHTML.appendChild(newProduct);
        });
    }
};

// Handle "Add to Cart" button clicks
listProductHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('addCart')) {
        let product_id = positionClick.closest('.item').dataset.id;
        addToCart(product_id);
    }
});

// Add product to cart
const addToCart = (product_id) => {
    let positionInCart = carts.findIndex(value => value.product_id == product_id);

    if (positionInCart < 0) {
        carts.push({ product_id: product_id, quantity: 1 });
    } else {
        carts[positionInCart].quantity += 1;
    }

    addCartToHTML();
    addCartToMemory();
};

// Save cart to localStorage
const addCartToMemory = () => {
    localStorage.setItem(storageKey, JSON.stringify(carts));
};

// Update cart HTML
const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;

    if (carts.length > 0) {
        carts.forEach(cart => {
            totalQuantity += cart.quantity;
            let positionProduct = listProducts.findIndex(value => value.id == cart.product_id);
            let info = listProducts[positionProduct];

            let newCart = document.createElement('div');
            newCart.classList.add('item');
            newCart.dataset.id = cart.product_id;

            newCart.innerHTML = `
                <div class="image">
                    <img src="${info.image}" alt="">
                </div>
                <div class="name">${info.name}</div>
                <div class="total-price">₹${info.price * cart.quantity}</div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>${cart.quantity}</span>
                    <span class="plus">></span>
                </div>
            `;

            listCartHTML.appendChild(newCart);
        });
    }

    iconCartSpan.innerText = totalQuantity;
};

// Handle quantity changes
listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;

    if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
        let product_id = positionClick.closest('.item').dataset.id;
        let type = positionClick.classList.contains('plus') ? 'plus' : 'minus';
        changeQuantity(parseInt(product_id, 10), type);
    }
});

// Change quantity
const changeQuantity = (product_id, type) => {
    let positionItemInCart = carts.findIndex(value => value.product_id == product_id);

    if (positionItemInCart >= 0) {
        if (type === 'plus') {
            carts[positionItemInCart].quantity += 1;
        } else {
            let newQuantity = carts[positionItemInCart].quantity - 1;
            if (newQuantity > 0) {
                carts[positionItemInCart].quantity = newQuantity;
            } else {
                carts.splice(positionItemInCart, 1);
            }
        }
    }

    addCartToMemory();
    addCartToHTML();
};

// Initialize app
const initApp = () => {
    if (localStorage.getItem(storageKey)) {
        carts = JSON.parse(localStorage.getItem(storageKey)) || [];
    }

    fetch('rings.json')
        .then(response => response.json())
        .then(data => {
            listProducts = data;
            addDataToHtml();
            addCartToHTML();
        });
};

initApp();

// Checkout redirect
document.addEventListener("DOMContentLoaded", () => {
    let checkoutButton = document.querySelector('.checkOut');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', () => {
            window.location.href = 'checkout.php';
        });
    }
});

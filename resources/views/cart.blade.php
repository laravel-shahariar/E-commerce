@extends('template.basic')
@section('title', 'Shopping Cart')
@section('style')
    <style>
.page-title {
    font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--text-dark);
}

/* Cart Layout */
        .cart-layout {
    display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
}

/* Cart Items */
        .cart-items {
    background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
}

.cart-header {
    display: grid;
            grid-template-columns: 100px 1fr 80px 80px 60px;
            gap: 20px;
            padding: 20px;
            background-color: var(--light-gray);
            border-bottom: 2px solid var(--border-color);
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
}

.cart-item {
    display: grid;
            grid-template-columns: 100px 1fr 80px 80px 60px;
            gap: 20px;
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            align-items: center;
}

.cart-item:last-child {
    border-bottom: none;
}

.product-image-cart {
    width: 100px;
            height: 100px;
            background-color: var(--light-gray);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
}

.product-details {
    display: flex;
            flex-direction: column;
            gap: 8px;
}

.product-description {
    font-size: 12px;
            color: var(--text-light);
}

.qty-btn {
    width: 28px;
            height: 28px;
            border: none;
            background-color: var(--light-gray);
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
}

.qty-input {
    width: 40px;
            text-align: center;
            border: none;
            font-size: 12px;
            font-weight: 600;
}

.item-total {
    text-align: right;
            font-weight: 600;
            font-size: 14px;
}

.remove-btn {
    background: none;
            border: none;
            color: var(--danger-color);
            cursor: pointer;
            font-size: 20px;
            transition: color 0.3s ease;
}

.remove-btn:hover {
    color: #a02834;
}

/* Empty Cart */
        .empty-cart {
    text-align: center;
            padding: 60px 20px;
            background-color: var(--white);
            border-radius: 8px;
}

.summary-row {
    display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
}

.summary-row.total {
    font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            border-top: 2px solid var(--border-color);
            padding-top: 12px;
            margin-top: 12px;
}

.promo-section {
    margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
}

.promo-input {
    display: flex;
            gap: 8px;
            margin-bottom: 15px;
}

.promo-input input {
    flex: 1;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 12px;
}

.promo-input button {
    padding: 10px 15px;
            background-color: var(--light-gray);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
}

.promo-input button:hover {
    background-color: var(--border-color);
}

.checkout-btn {
    width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
}

.checkout-btn:hover {
    background-color: #0052a3;
}

.checkout-btn:disabled {
    background-color: var(--text-light);
            cursor: not-allowed;
}

.security-info {
    display: flex;
            gap: 10px;
            margin-top: 15px;
            padding: 10px;
            background-color: #e3f2fd;
            border-radius: 4px;
            font-size: 11px;
            color: var(--text-dark);
}

.security-icon {
    font-size: 16px;
}

/* Responsive */
        @media (max-width: 768px) {
    .cart-layout {
                grid-template-columns: 1fr;
            }

            .order-summary {
                position: static;
            }

            .cart-header,
            .cart-item {
                grid-template-columns: 80px 1fr;
                gap: 15px;
            }

            .cart-header > :nth-child(n+3),
            .cart-item > :nth-child(n+3) {
                display: none;
            }
}
</style>
@endsection

@section('content')
    <!-- Main Container -->
    <div class="container">
        <h1 class="page-title">🛒 Shopping Cart</h1>

        <div class="cart-layout">
            <!-- Cart Items -->
            <div class="cart-items" id="cartContainer">
                <!-- Items will be loaded here -->
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="summary-title">Order Summary</div>
                
                <div class="summary-row label">
                    <span>Subtotal</span>
                    <span id="subtotal">₹0</span>
                </div>
                <div class="summary-row label">
                    <span>Shipping</span>
                    <span id="shipping">Free</span>
                </div>
                <div class="summary-row label">
                    <span>Tax</span>
                    <span id="tax">₹0</span>
                </div>
                <div class="summary-row label">
                    <span>Discount</span>
                    <span id="discount" style="color: var(--success-color);">-₹0</span>
                </div>
                <div class="summary-row total">
                    <span>Total</span>
                    <span id="total">₹0</span>
                </div>

                <div class="promo-section">
                    <div style="font-size: 13px; font-weight: 600; margin-bottom: 10px;">Promo Code</div>
                    <div class="promo-input">
                        <input type="text" placeholder="Enter promo code" id="promoCode">
                        <button onclick="applyPromo()">Apply</button>
                    </div>
                </div>

                <button class="checkout-btn" id="checkoutBtn" onclick="proceedToCheckout()">
                    Proceed to Checkout
                </button>

                <div class="security-info">
                    <span class="security-icon">🔒</span>
                    <span>Your payment is secure and encrypted</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        let cartItems = [];
        let discountApplied = 0;

        function loadCart() {
            const stored = localStorage.getItem('cartItems');
            cartItems = stored ? JSON.parse(stored) : [];
            renderCart();
            updateSummary();
        }

        function renderCart() {
            const container = document.getElementById('cartContainer');
            
            if (cartItems.length === 0) {
                container.innerHTML = `
                    <div class="empty-cart">
                        <div class="empty-icon">🛒</div>
                        <div class="empty-title">Your Cart is Empty</div>
                        <div class="empty-text">Add items to your cart to get started</div>
                        <a href="index.html" class="continue-shopping-btn">Continue Shopping</a>
                    </div>
                `;
                document.getElementById('checkoutBtn').disabled = true;
                return;
            }

            document.getElementById('checkoutBtn').disabled = false;

            let html = '<div class="cart-header"><div>Product</div><div>Details</div><div>Price</div><div>Quantity</div><div>Total</div></div>';
            
            cartItems.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                html += `
                    <div class="cart-item">
                        <div class="product-image-cart">${item.emoji}</div>
                        <div class="product-details">
                            <div class="product-name">${item.title}</div>
                            <div class="product-description">SKU: ${item.id}</div>
                        </div>
                        <div class="product-price">₹${item.price.toLocaleString()}</div>
                        <div class="quantity-control">
                            <button class="qty-btn" onclick="updateQuantity(${index}, -1)">−</button>
                            <input type="number" class="qty-input" value="${item.quantity}" readonly>
                            <button class="qty-btn" onclick="updateQuantity(${index}, 1)">+</button>
                        </div>
                        <div class="item-total">
                            ₹${itemTotal.toLocaleString()}
                        </div>
                        <button class="remove-btn" onclick="removeItem(${index})">✕</button>
                    </div>
                `;
            });
            
            container.innerHTML = html;
        }

        function updateQuantity(index, change) {
            cartItems[index].quantity += change;
            if (cartItems[index].quantity < 1) {
                removeItem(index);
                return;
            }
            if (cartItems[index].quantity > 10) {
                cartItems[index].quantity = 10;
            }
            saveCart();
            renderCart();
            updateSummary();
        }

        function removeItem(index) {
            cartItems.splice(index, 1);
            saveCart();
            renderCart();
            updateSummary();
        }

        function saveCart() {
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }

        function updateSummary() {
            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = Math.round(subtotal * 0.18);
            const shipping = 0;
            const discount = discountApplied;
            const total = subtotal + tax + shipping - discount;

            document.getElementById('subtotal').textContent = '₹' + subtotal.toLocaleString();
            document.getElementById('tax').textContent = '₹' + tax.toLocaleString();
            document.getElementById('discount').textContent = '-₹' + discount.toLocaleString();
            document.getElementById('total').textContent = '₹' + total.toLocaleString();
        }

        function applyPromo() {
            const promoCode = document.getElementById('promoCode').value.toUpperCase();
            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);

            if (promoCode === 'SAVE10') {
                discountApplied = Math.round(subtotal * 0.10);
                alert('✓ Promo code applied! You saved ₹' + discountApplied.toLocaleString());
            } else if (promoCode === 'SAVE20') {
                discountApplied = Math.round(subtotal * 0.20);
                alert('✓ Promo code applied! You saved ₹' + discountApplied.toLocaleString());
            } else if (promoCode === '') {
                alert('Please enter a promo code');
            } else {
                alert('Invalid promo code');
                discountApplied = 0;
            }

            updateSummary();
        }

        function proceedToCheckout() {
            if (cartItems.length === 0) {
                alert('Your cart is empty!');
                return;
            }
            window.location.href = 'checkout.html';
        }

        // Load cart on page load
        window.addEventListener('load', loadCart);
    </script>
@endsection

@extends('template.basic')
@section('title', 'Checkout')
@section('style')
    <style>
/* Progress Bar */
        .progress-bar {
    background-color: var(--white);
            padding: 20px 40px;
            border-bottom: 1px solid var(--border-color);
}

.progress-steps {
    max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
}

.step {
    display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
}

.step-number {
    width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--text-light);
}

.step.active .step-number {
    background-color: var(--primary-color);
            color: var(--white);
}

.step.completed .step-number {
    background-color: var(--success-color);
            color: var(--white);
}

.step-line {
    flex: 1;
            height: 2px;
            background-color: var(--border-color);
            margin: 0 10px;
}

.step:last-child .step-line {
    display: none;
}

/* Checkout Layout */
        .checkout-layout {
    display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
}

/* Form Section */
        .form-section {
    background-color: var(--white);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.section-title {
    font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
}

.radio-group {
    display: flex;
            gap: 20px;
            margin-bottom: 20px;
}

.radio-option {
    display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            flex: 1;
            padding: 12px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            transition: all 0.3s ease;
}

.radio-option:hover {
    border-color: var(--primary-color);
}

.radio-option input {
    width: auto;
}

.radio-option.selected {
    border-color: var(--primary-color);
            background-color: #e3f2fd;
}

.payment-methods {
    display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
}

.payment-method {
    padding: 15px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
}

.payment-method:hover {
    border-color: var(--primary-color);
}

.payment-method.selected {
    border-color: var(--primary-color);
            background-color: #e3f2fd;
}

.payment-icon {
    font-size: 30px;
            margin-bottom: 8px;
}

.payment-label {
    font-weight: 600;
            font-size: 13px;
}

.summary-item {
    display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 13px;
}

.summary-item-img {
    width: 50px;
            height: 50px;
            background-color: var(--light-gray);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
}

.summary-item-detail {
    display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
}

.summary-item-info {
    flex: 1;
}

.summary-item-name {
    font-weight: 600;
            font-size: 13px;
            color: var(--text-dark);
}

.summary-item-qty {
    font-size: 12px;
            color: var(--text-light);
}

.summary-row {
    display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 13px;
}

.summary-row.total {
    font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            border-top: 2px solid var(--border-color);
            padding-top: 12px;
            margin-top: 12px;
}

.place-order-btn {
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

.place-order-btn:hover {
    background-color: #0052a3;
}

.security-badge {
    display: flex;
            gap: 8px;
            margin-top: 15px;
            padding: 10px;
            background-color: #e8f5e9;
            border-radius: 4px;
            font-size: 12px;
            color: #2e7d32;
}

/* Responsive */
        @media (max-width: 768px) {
    .checkout-layout {
                grid-template-columns: 1fr;
            }

            .order-summary {
                position: static;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .payment-methods {
                grid-template-columns: 1fr;
            }
}
</style>
@endsection
@section('content')

    <!-- Progress Bar -->
    <div class="progress-bar">
        <div class="progress-steps">
            <div class="step completed">
                <div class="step-number">✓</div>
                <span>Cart</span>
            </div>
            <div class="step-line"></div>
            <div class="step active">
                <div class="step-number">2</div>
                <span>Checkout</span>
            </div>
            <div class="step-line"></div>
            <div class="step">
                <div class="step-number">3</div>
                <span>Order</span>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <div class="checkout-layout">
            <!-- Checkout Form -->
            <div>
                <!-- Shipping Address -->
                <div class="form-section">
                    <h2 class="section-title">📍 Shipping Address</h2>
                    
                    <div class="form-group">
                        <label>Full Name *</label>
                        <input type="text" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" placeholder="your@email.com" required>
                        </div>
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="tel" placeholder="+91 98765 43210" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address *</label>
                        <input type="text" placeholder="House No., Building Name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>City *</label>
                            <input type="text" placeholder="Enter city" required>
                        </div>
                        <div class="form-group">
                            <label>State *</label>
                            <input type="text" placeholder="Enter state" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Pincode *</label>
                            <input type="text" placeholder="Enter pincode" required>
                        </div>
                        <div class="form-group">
                            <label>Country *</label>
                            <select required>
                                <option>India</option>
                                <option>USA</option>
                                <option>UK</option>
                                <option>Canada</option>
                            </select>
                        </div>
                    </div>

                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 400;">
                        <input type="checkbox" checked>
                        <span>This is my primary address</span>
                    </label>
                </div>

                <!-- Shipping Method -->
                <div class="form-section">
                    <h2 class="section-title">🚚 Shipping Method</h2>
                    
                    <div class="radio-group">
                        <label class="radio-option selected" onclick="selectShipping(this, 'standard')">
                            <input type="radio" name="shipping" value="standard" checked>
                            <div>
                                <div style="font-weight: 600; font-size: 14px;">Standard</div>
                                <div style="font-size: 12px; color: var(--text-light);">3-5 Business Days</div>
                            </div>
                        </label>
                        <label class="radio-option" onclick="selectShipping(this, 'express')">
                            <input type="radio" name="shipping" value="express">
                            <div>
                                <div style="font-weight: 600; font-size: 14px;">Express</div>
                                <div style="font-size: 12px; color: var(--text-light);">1-2 Business Days</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="form-section">
                    <h2 class="section-title">💳 Payment Method</h2>
                    
                    <div class="payment-methods" id="paymentMethods">
                        <div class="payment-method selected" onclick="selectPayment(this, 'card')">
                            <div class="payment-icon">💳</div>
                            <div class="payment-label">Credit/Debit Card</div>
                        </div>
                        <div class="payment-method" onclick="selectPayment(this, 'upi')">
                            <div class="payment-icon">📱</div>
                            <div class="payment-label">UPI</div>
                        </div>
                        <div class="payment-method" onclick="selectPayment(this, 'wallet')">
                            <div class="payment-icon">👛</div>
                            <div class="payment-label">Digital Wallet</div>
                        </div>
                        <div class="payment-method" onclick="selectPayment(this, 'emi')">
                            <div class="payment-icon">📊</div>
                            <div class="payment-label">EMI</div>
                        </div>
                    </div>

                    <!-- Card Details -->
                    <div id="cardDetails" style="display: block;">
                        <div class="form-group">
                            <label>Card Number *</label>
                            <input type="text" placeholder="1234 5678 9012 3456" maxlength="19" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Expiry Date *</label>
                                <input type="text" placeholder="MM/YY" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <label>CVV *</label>
                                <input type="text" placeholder="123" maxlength="3" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Cardholder Name *</label>
                            <input type="text" placeholder="Name on card" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="summary-title">Order Summary</div>
                
                <div id="orderItems">
                    <!-- Items will be loaded here -->
                </div>

                <div class="summary-row label">
                    <span>Subtotal</span>
                    <span id="summarySubtotal">₹0</span>
                </div>
                <div class="summary-row label">
                    <span>Shipping</span>
                    <span id="summarySummaryShipping">Free</span>
                </div>
                <div class="summary-row label">
                    <span>Tax (18%)</span>
                    <span id="summaryTax">₹0</span>
                </div>
                <div class="summary-row total">
                    <span>Total</span>
                    <span id="summaryTotal">₹0</span>
                </div>

                <button class="place-order-btn" onclick="placeOrder()">Place Order</button>

                <div class="security-badge">
                    <span>🔒</span>
                    <span>Secure encrypted payment</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        let cartItems = [];

        function loadCart() {
            const stored = localStorage.getItem('cartItems');
            cartItems = stored ? JSON.parse(stored) : [];
            renderOrderSummary();
        }

        function renderOrderSummary() {
            const container = document.getElementById('orderItems');
            let html = '';

            cartItems.forEach(item => {
                const itemTotal = item.price * item.quantity;
                html += `
                    <div class="summary-item-detail">
                        <div class="summary-item-img">${item.emoji}</div>
                        <div class="summary-item-info">
                            <div class="summary-item-name">${item.title}</div>
                            <div class="summary-item-qty">Qty: ${item.quantity}</div>
                        </div>
                        <div style="font-weight: 600;">₹${itemTotal.toLocaleString()}</div>
                    </div>
                `;
            });

            container.innerHTML = html;

            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = Math.round(subtotal * 0.18);
            const total = subtotal + tax;

            document.getElementById('summarySubtotal').textContent = '₹' + subtotal.toLocaleString();
            document.getElementById('summaryTax').textContent = '₹' + tax.toLocaleString();
            document.getElementById('summaryTotal').textContent = '₹' + total.toLocaleString();
        }

        function selectShipping(element, type) {
            document.querySelectorAll('.radio-option').forEach(opt => opt.classList.remove('selected'));
            element.classList.add('selected');
        }

        function selectPayment(element, type) {
            document.querySelectorAll('.payment-method').forEach(opt => opt.classList.remove('selected'));
            element.classList.add('selected');

            const cardDetails = document.getElementById('cardDetails');
            if (type === 'card') {
                cardDetails.style.display = 'block';
            } else {
                cardDetails.style.display = 'none';
            }
        }

        function placeOrder() {
            const fullName = document.querySelector('input[placeholder="Enter your full name"]').value;
            const email = document.querySelector('input[placeholder="your@email.com"]').value;
            const address = document.querySelector('input[placeholder="House No., Building Name"]').value;

            if (!fullName || !email || !address) {
                alert('Please fill in all required fields');
                return;
            }

            if (cartItems.length === 0) {
                alert('Your cart is empty!');
                return;
            }

            // Save order details to localStorage
            const orderData = {
                orderDate: new Date().toISOString(),
                orderNumber: 'ORD-' + Date.now(),
                customerName: fullName,
                customerEmail: email,
                items: cartItems,
                subtotal: cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0),
                tax: Math.round(cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0) * 0.18),
                total: cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0) + 
                       Math.round(cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0) * 0.18),
                status: 'Confirmed'
            };

            localStorage.setItem('lastOrder', JSON.stringify(orderData));
            localStorage.removeItem('cartItems');

            // Redirect to order confirmation
            window.location.href = 'order-confirmation.html';
        }

        window.addEventListener('load', loadCart);
    </script>
@endsection

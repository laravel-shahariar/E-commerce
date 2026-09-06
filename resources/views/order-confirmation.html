<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - emox</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #0066cc;
            --secondary-color: #00a8cc;
            --success-color: #17a2b8;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --light-gray: #f8f9fa;
            --border-color: #dee2e6;
            --text-dark: #212529;
            --text-light: #6c757d;
            --white: #ffffff;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 40px;
            border-bottom: 1px solid var(--border-color);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            text-decoration: none;
        }

        .header-center {
            flex: 1;
            max-width: 400px;
            margin: 0 20px;
        }

        .search-bar {
            display: flex;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            overflow: hidden;
        }

        .search-bar input {
            flex: 1;
            padding: 10px 15px;
            border: none;
            outline: none;
        }

        .search-bar button {
            padding: 10px 15px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            cursor: pointer;
        }

        .header-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .header-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 12px;
        }

        .header-icon:hover {
            color: var(--primary-color);
        }

        .icon {
            font-size: 20px;
            margin-bottom: 4px;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Success Banner */
        .success-banner {
            background: linear-gradient(135deg, #17a2b8 0%, #0d5f6d 100%);
            color: var(--white);
            border-radius: 8px;
            padding: 40px;
            margin-bottom: 30px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .success-icon {
            font-size: 60px;
            margin-bottom: 15px;
        }

        .success-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .success-text {
            font-size: 16px;
            opacity: 0.95;
        }

        /* Order Details */
        .order-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .detail-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .detail-card-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 15px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--border-color);
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .detail-label {
            color: var(--text-light);
            font-weight: 600;
        }

        .detail-value {
            color: var(--text-dark);
            font-weight: 600;
        }

        .order-number {
            color: var(--primary-color);
            font-size: 16px;
            font-weight: 700;
        }

        /* Order Status */
        .order-status {
            background-color: var(--white);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .status-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline-item {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
        }

        .timeline-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 20px;
            top: 50px;
            width: 2px;
            height: 50px;
            background-color: var(--border-color);
        }

        .timeline-dot {
            width: 42px;
            height: 42px;
            background-color: #e8f5e9;
            border: 3px solid var(--success-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 20px;
        }

        .timeline-dot.active {
            background-color: var(--success-color);
            color: var(--white);
        }

        .timeline-dot.pending {
            background-color: var(--light-gray);
            border-color: var(--border-color);
            color: var(--text-light);
        }

        .timeline-content {
            flex: 1;
            padding-top: 8px;
        }

        .timeline-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .timeline-date {
            font-size: 13px;
            color: var(--text-light);
        }

        /* Order Items */
        .order-items {
            background-color: var(--white);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .items-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
        }

        .order-item {
            display: grid;
            grid-template-columns: 100px 1fr 100px 100px;
            gap: 20px;
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            align-items: center;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .product-image {
            width: 100px;
            height: 100px;
            background-color: var(--light-gray);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .product-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .product-sku {
            font-size: 12px;
            color: var(--text-light);
        }

        .product-qty {
            font-size: 14px;
            color: var(--text-dark);
        }

        .product-price {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .order-summary {
            display: flex;
            justify-content: flex-end;
            gap: 40px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid var(--border-color);
        }

        .summary-item {
            text-align: right;
        }

        .summary-label {
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 4px;
        }

        .summary-value {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .summary-total {
            background-color: var(--light-gray);
            padding: 10px 20px;
            border-radius: 4px;
        }

        .summary-total .summary-label {
            font-size: 14px;
        }

        .summary-total .summary-value {
            font-size: 20px;
            color: var(--primary-color);
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            flex: 1;
        }

        .btn-primary:hover {
            background-color: #0052a3;
        }

        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--text-dark);
            border: 2px solid var(--border-color);
            flex: 1;
        }

        .btn-secondary:hover {
            background-color: var(--border-color);
        }

        /* Info Box */
        .info-box {
            background-color: #e3f2fd;
            border-left: 4px solid var(--primary-color);
            padding: 15px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .info-box-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .info-box-text {
            font-size: 13px;
            color: #0d5f6d;
        }

        /* Footer */
        footer {
            background-color: var(--text-dark);
            color: var(--white);
            padding: 40px 20px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section h4 {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .footer-section a {
            display: block;
            color: #aaa;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--white);
        }

        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            text-align: center;
            color: #aaa;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .order-details {
                grid-template-columns: 1fr;
            }

            .order-item {
                grid-template-columns: 80px 1fr;
                gap: 15px;
            }

            .order-item > :nth-child(n+3) {
                display: none;
            }

            .order-summary {
                flex-direction: column;
                gap: 15px;
            }

            .actions {
                flex-direction: column;
            }

            .header-top {
                flex-wrap: wrap;
                padding: 10px 20px;
            }

            .header-center {
                order: 3;
                flex-basis: 100%;
                max-width: 100%;
                margin: 10px 0 0 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-top">
            <a href="index.html" class="logo">emox</a>
            <div class="header-center">
                <div class="search-bar">
                    <input type="text" placeholder="Search for any product or brand">
                    <button>🔍</button>
                </div>
            </div>
            <div class="header-right">
                <a href="#" class="header-icon">
                    <span class="icon">🌐</span>
                    <span>English</span>
                </a>
                <a href="#" class="header-icon">
                    <span class="icon">❤️</span>
                    <span>Wishlist</span>
                </a>
                <a href="#" class="header-icon">
                    <span class="icon">👤</span>
                    <span>Sign In</span>
                </a>
                <a href="cart.html" class="header-icon">
                    <span class="icon">🛒</span>
                    <span>Cart</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Success Banner -->
        <div class="success-banner">
            <div class="success-icon">✓</div>
            <div class="success-title">Order Confirmed!</div>
            <div class="success-text">Thank you for your purchase. Your order has been successfully placed.</div>
        </div>

        <!-- Order Details -->
        <div class="order-details">
            <div class="detail-card">
                <div class="detail-card-title">Order Information</div>
                <div class="detail-row">
                    <span class="detail-label">Order Number:</span>
                    <span class="order-number" id="orderNumber">ORD-1234567890</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Order Date:</span>
                    <span class="detail-value" id="orderDate">Sept 06, 2024</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Estimated Delivery:</span>
                    <span class="detail-value">Sept 10, 2024</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Status:</span>
                    <span class="detail-value" style="color: var(--success-color);">✓ Paid</span>
                </div>
            </div>

            <div class="detail-card">
                <div class="detail-card-title">Shipping Address</div>
                <div class="detail-row">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value" id="customerName">John Doe</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value" id="customerEmail">john@example.com</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">City:</span>
                    <span class="detail-value">New York, NY 10001</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Country:</span>
                    <span class="detail-value">United States</span>
                </div>
            </div>
        </div>

        <!-- Order Status -->
        <div class="order-status">
            <div class="status-title">📦 Order Status</div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot active">✓</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Order Confirmed</div>
                        <div class="timeline-date">Sept 06, 2024 - 2:30 PM</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot active">✓</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Payment Received</div>
                        <div class="timeline-date">Sept 06, 2024 - 2:35 PM</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot">📦</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Processing Order</div>
                        <div class="timeline-date">Estimated: Sept 07, 2024</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot pending">🚚</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Shipped</div>
                        <div class="timeline-date">Estimated: Sept 08, 2024</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot pending">📍</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Out for Delivery</div>
                        <div class="timeline-date">Estimated: Sept 09-10, 2024</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot pending">✓</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Delivered</div>
                        <div class="timeline-date">Estimated: Sept 10, 2024</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="order-items">
            <div class="items-title">Order Items</div>
            <div id="orderItemsContainer">
                <!-- Items will be loaded here -->
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <div class="info-box-title">📧 Confirmation Email</div>
            <div class="info-box-text">A detailed order confirmation has been sent to your email address. You can track your order at any time using your order number.</div>
        </div>

        <!-- Actions -->
        <div class="actions">
            <button class="btn btn-primary" onclick="window.location.href='index.html'">Continue Shopping</button>
            <button class="btn btn-secondary" onclick="printOrder()">Print Order</button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>About Us</h4>
                <a href="#">About emox</a>
                <a href="#">Careers</a>
                <a href="#">Blog</a>
                <a href="#">Press</a>
            </div>
            <div class="footer-section">
                <h4>Help & Support</h4>
                <a href="#">Contact Us</a>
                <a href="#">FAQ</a>
                <a href="#">Shipping Info</a>
                <a href="#">Returns</a>
            </div>
            <div class="footer-section">
                <h4>Policies</h4>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Cookie Policy</a>
                <a href="#">Security</a>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
                <a href="#">YouTube</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 emox. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function loadOrder() {
            const orderData = JSON.parse(localStorage.getItem('lastOrder') || '{}');

            if (!orderData.orderNumber) {
                // Demo data
                orderData.orderNumber = 'ORD-' + Math.random().toString(36).substr(2, 9).toUpperCase();
                orderData.customerName = 'John Doe';
                orderData.customerEmail = 'john@example.com';
                orderData.items = [
                    {
                        id: 1,
                        title: 'Samsung Galaxy S24 Ultra',
                        price: 79999,
                        quantity: 1,
                        emoji: '📱'
                    }
                ];
                orderData.subtotal = 79999;
                orderData.tax = Math.round(79999 * 0.18);
                orderData.total = 79999 + Math.round(79999 * 0.18);
            }

            // Display order info
            document.getElementById('orderNumber').textContent = orderData.orderNumber;
            document.getElementById('customerName').textContent = orderData.customerName;
            document.getElementById('customerEmail').textContent = orderData.customerEmail;

            const today = new Date();
            const dateStr = today.toLocaleDateString('en-US', { 
                month: 'short', 
                day: 'numeric', 
                year: 'numeric' 
            });
            document.getElementById('orderDate').textContent = dateStr;

            // Render items
            const itemsContainer = document.getElementById('orderItemsContainer');
            let itemsHtml = '';

            orderData.items.forEach(item => {
                const itemTotal = item.price * item.quantity;
                itemsHtml += `
                    <div class="order-item">
                        <div class="product-image">${item.emoji}</div>
                        <div class="product-info">
                            <div class="product-name">${item.title}</div>
                            <div class="product-sku">SKU: ${item.id}</div>
                        </div>
                        <div class="product-qty">Qty: ${item.quantity}</div>
                        <div class="product-price">₹${itemTotal.toLocaleString()}</div>
                    </div>
                `;
            });

            itemsContainer.innerHTML = itemsHtml;

            // Order summary
            const summaryHtml = `
                <div class="order-summary">
                    <div class="summary-item">
                        <div class="summary-label">Subtotal</div>
                        <div class="summary-value">₹${orderData.subtotal.toLocaleString()}</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Tax (18%)</div>
                        <div class="summary-value">₹${orderData.tax.toLocaleString()}</div>
                    </div>
                    <div class="summary-item summary-total">
                        <div class="summary-label">Order Total</div>
                        <div class="summary-value">₹${orderData.total.toLocaleString()}</div>
                    </div>
                </div>
            `;

            itemsContainer.innerHTML += summaryHtml;
        }

        function printOrder() {
            window.print();
        }

        window.addEventListener('load', loadOrder);
    </script>
</body>
</html>

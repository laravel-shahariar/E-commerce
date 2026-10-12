<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - LUXORA Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #000000;
            --secondary: #ffffff;
            --accent: #ff006e;
            --accent-alt: #00d9ff;
            --gray-900: #0f0f0f;
            --gray-800: #1a1a1a;
            --gray-700: #2d2d2d;
            --gray-600: #404040;
            --gray-500: #636363;
            --gray-400: #8f8f8f;
            --gray-300: #b3b3b3;
            --gray-200: #d9d9d9;
            --gray-100: #f5f5f5;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--gray-100);
            color: var(--gray-900);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: var(--primary);
            color: var(--secondary);
            padding: 30px 20px;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-logo {
            font-size: 22px;
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(255, 0, 110, 0.2);
            color: var(--secondary);
            border-left-color: var(--accent);
        }

        .sidebar-link-icon {
            font-size: 18px;
            min-width: 20px;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 70px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            z-index: 999;
            transition: left 0.3s ease;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            height: 100%;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--gray-900);
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: var(--gray-900);
            margin-right: 10px;
        }

        .navbar-title {
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            margin-top: 70px;
            padding: 40px;
            transition: margin-left 0.3s ease;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .order-title-section h1 {
            font-size: 32px;
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .order-meta {
            font-size: 14px;
            color: var(--gray-600);
        }

        .order-status {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-delivered {
            background: rgba(0, 179, 119, 0.2);
            color: #00b377;
        }

        .badge-shipped {
            background: rgba(0, 217, 255, 0.2);
            color: var(--accent-alt);
        }

        .badge-processing {
            background: rgba(255, 165, 0, 0.2);
            color: #ff9800;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 10px 20px;
            border: 1px solid var(--gray-300);
            background: var(--secondary);
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: var(--gray-100);
            border-color: var(--accent);
            color: var(--accent);
        }

        .action-btn.primary {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-alt) 100%);
            color: var(--secondary);
            border: none;
        }

        /* Grid Layout */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .card {
            background: var(--secondary);
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            padding: 25px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-divider {
            border-top: 1px solid var(--gray-200);
            margin: 20px 0;
        }

        /* Order Items */
        .order-items {
            margin-bottom: 20px;
        }

        .item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--gray-200);
        }

        .item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255, 0, 110, 0.1) 0%, rgba(0, 217, 255, 0.1) 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            flex-shrink: 0;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .item-meta {
            font-size: 13px;
            color: var(--gray-600);
            margin-bottom: 5px;
        }

        .item-price {
            font-weight: 600;
            color: var(--accent);
        }

        /* Summary */
        .summary {
            background: var(--gray-100);
            padding: 15px;
            border-radius: 8px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
        }

        .summary-row.total {
            border-top: 1px solid var(--gray-300);
            padding-top: 12px;
            font-size: 16px;
            font-weight: 600;
            color: var(--accent);
        }

        /* Customer Info */
        .customer-card {
            background: var(--gray-100);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .customer-name {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .customer-detail {
            font-size: 13px;
            color: var(--gray-600);
            margin-bottom: 5px;
        }

        .customer-detail strong {
            color: var(--gray-900);
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 8px;
            width: 12px;
            height: 12px;
            background: var(--accent);
            border-radius: 50%;
            border: 3px solid var(--secondary);
            box-shadow: 0 0 0 2px var(--accent);
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-time {
            font-size: 12px;
            font-weight: 600;
            color: var(--accent);
        }

        .timeline-description {
            font-size: 13px;
            color: var(--gray-600);
            margin-top: 3px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 30px;
            color: var(--gray-600);
            font-size: 12px;
            border-top: 1px solid var(--gray-200);
            margin-top: 60px;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            header {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 25px 15px;
            }

            .menu-toggle {
                display: block;
            }

            .order-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-title-section h1 {
                font-size: 24px;
            }

            .action-buttons {
                width: 100%;
            }

            .action-btn {
                flex: 1;
            }

            .item {
                gap: 10px;
            }

            .item-image {
                width: 60px;
                height: 60px;
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 15px 10px;
            }

            .order-title-section h1 {
                font-size: 20px;
            }

            .card {
                padding: 15px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
            }

            .item-image {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }

            .item-name {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <x-dashboard-menu active="orders" />

    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="navbar-left">
                <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
                <button class="back-btn" onclick="goBack()">←</button>
                <div class="navbar-title">Order Details</div>
            </div>
            <div style="font-size: 20px; cursor: pointer;">🔔</div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Order Header -->
        <div class="order-header">
            <div class="order-title-section">
                <h1>#ORD-2024-001</h1>
                <div class="order-meta">Placed on October 5, 2024 at 2:30 PM</div>
            </div>
            <div class="order-status">
                <span class="badge badge-delivered">Delivered</span>
                <div class="action-buttons">
                    <button class="action-btn primary">Print</button>
                    <button class="action-btn">Invoice</button>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Left Column -->
            <div>
                <!-- Order Items -->
                <div class="card">
                    <div class="card-title">📦 Order Items</div>
                    <div class="order-items">
                        <div class="item">
                            <div class="item-image">👗</div>
                            <div class="item-details">
                                <div class="item-name">Elegant Dress</div>
                                <div class="item-meta">Size: M | Color: Black</div>
                                <div class="item-meta">Quantity: 1</div>
                                <div class="item-price">₹4,999</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item-image">👠</div>
                            <div class="item-details">
                                <div class="item-name">Designer Shoes</div>
                                <div class="item-meta">Size: 8 | Color: Gold</div>
                                <div class="item-meta">Quantity: 1</div>
                                <div class="item-price">₹5,299</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item-image">👜</div>
                            <div class="item-details">
                                <div class="item-name">Luxury Handbag</div>
                                <div class="item-meta">Color: Navy</div>
                                <div class="item-meta">Quantity: 1</div>
                                <div class="item-price">₹8,899</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-divider"></div>

                    <!-- Summary -->
                    <div class="summary">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>₹19,197</span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span>₹500</span>
                        </div>
                        <div class="summary-row">
                            <span>Tax</span>
                            <span>₹3,612</span>
                        </div>
                        <div class="summary-row">
                            <span>Discount (SAVE10)</span>
                            <span>-₹1,410</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span>₹22,899</span>
                        </div>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-title">📍 Shipping Address</div>
                    <div class="customer-card">
                        <div class="customer-name">Sarah Johnson</div>
                        <div class="customer-detail">Flat 5A, Sunset Apartments</div>
                        <div class="customer-detail">Marine Drive, Bandra West</div>
                        <div class="customer-detail">Mumbai, Maharashtra 400050</div>
                        <div class="customer-detail">India</div>
                        <div class="customer-detail" style="margin-top: 8px;"><strong>Phone:</strong> +91 98765-43210</div>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-title">💳 Payment Details</div>
                    <div class="customer-detail" style="margin-bottom: 10px;"><strong>Method:</strong> Credit Card</div>
                    <div class="customer-detail" style="margin-bottom: 10px;"><strong>Card:</strong> Visa ending in 4242</div>
                    <div class="customer-detail"><strong>Status:</strong> <span class="badge badge-delivered" style="font-size: 11px;">Paid</span></div>
                </div>
            </div>

            <!-- Right Column -->
            <div>
                <!-- Customer Info -->
                <div class="card">
                    <div class="card-title">👤 Customer Info</div>
                    <div class="customer-card">
                        <div class="customer-name">Sarah Johnson</div>
                        <div class="customer-detail"><strong>Email:</strong> sarah@example.com</div>
                        <div class="customer-detail"><strong>Phone:</strong> +91 98765-43210</div>
                        <div class="customer-detail"><strong>Member Since:</strong> Aug 2023</div>
                    </div>
                    <div style="padding: 15px; background: var(--gray-100); border-radius: 8px;">
                        <div class="summary-row" style="margin-bottom: 8px;">
                            <span>Total Orders</span>
                            <span style="font-weight: 600;">12</span>
                        </div>
                        <div class="summary-row">
                            <span>Total Spent</span>
                            <span style="font-weight: 600; color: var(--accent);">₹89,200</span>
                        </div>
                    </div>
                </div>

                <!-- Order Timeline -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-title">📅 Order Timeline</div>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-content">
                                <div class="timeline-time">Oct 5, 2:30 PM</div>
                                <div class="timeline-description">Order Placed</div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-content">
                                <div class="timeline-time">Oct 5, 3:45 PM</div>
                                <div class="timeline-description">Order Confirmed</div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-content">
                                <div class="timeline-time">Oct 6, 9:00 AM</div>
                                <div class="timeline-description">Processing Started</div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-content">
                                <div class="timeline-time">Oct 7, 2:15 PM</div>
                                <div class="timeline-description">Shipped via FedEx</div>
                                <div class="timeline-description" style="color: var(--accent); font-weight: 600; margin-top: 3px;">Tracking: FX123456789</div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-content">
                                <div class="timeline-time">Oct 9, 11:30 AM</div>
                                <div class="timeline-description">Delivered</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card" style="margin-top: 25px;">
                    <div class="action-buttons" style="flex-direction: column; gap: 10px;">
                        <button class="action-btn" style="width: 100%;">📧 Send Email</button>
                        <button class="action-btn" style="width: 100%;">📞 Contact Customer</button>
                        <button class="action-btn" style="width: 100%;">📝 Add Note</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 LUXORA Admin Dashboard. All rights reserved.</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('active');
            }
        }

        function goBack() {
            window.history.back();
        }

        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = 'modern-index.html';
            }
        }

        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', closeSidebar);
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').classList.remove('active');
            }
        });
    </script>
</body>
</html>

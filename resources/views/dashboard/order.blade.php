<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - LUXORA Admin</title>
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

        .sidebar.hidden {
            transform: translateX(-100%);
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

        .page-header {
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        /* Filters */
        .filters-section {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }

        .search-box,
        .filter-select {
            padding: 12px 15px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            font-size: 14px;
            background: var(--secondary);
        }

        .status-filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .status-btn {
            padding: 8px 16px;
            border: 2px solid var(--gray-300);
            background: var(--secondary);
            border-radius: 20px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .status-btn:hover,
        .status-btn.active {
            background: var(--accent);
            color: var(--secondary);
            border-color: var(--accent);
        }

        /* Table Section */
        .table-section {
            background: var(--secondary);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--gray-200);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 500px;
        }

        th {
            text-align: left;
            padding: 15px;
            border-bottom: 2px solid var(--gray-200);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray-600);
            background: var(--gray-100);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--gray-200);
            font-size: 14px;
        }

        tr:hover {
            background-color: var(--gray-100);
        }

        tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            font-weight: 600;
            color: var(--accent);
        }

        .customer-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .customer-avatar {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-alt) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 12px;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
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

        .badge-confirmed {
            background: rgba(0, 179, 119, 0.2);
            color: #00b377;
        }

        .action-btn {
            background: none;
            border: none;
            color: var(--accent);
            font-weight: 600;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
        }

        .action-btn:hover {
            color: var(--accent-alt);
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
            .filters-section {
                grid-template-columns: 1fr 1fr;
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

            .page-title {
                font-size: 24px;
            }

            .filters-section {
                grid-template-columns: 1fr;
            }

            .status-filters {
                margin-bottom: 15px;
            }

            .status-btn {
                font-size: 12px;
                padding: 6px 12px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }

            .customer-avatar {
                width: 30px;
                height: 30px;
                font-size: 11px;
            }

            .badge {
                padding: 4px 8px;
                font-size: 10px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 15px 10px;
            }

            .page-title {
                font-size: 20px;
            }

            .navbar {
                padding: 0 15px;
            }

            th, td {
                padding: 8px 5px;
            }

            .order-id,
            .customer-avatar {
                display: none;
            }

            table {
                font-size: 11px;
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
                <div class="navbar-title">Orders</div>
            </div>
            <div style="font-size: 20px; cursor: pointer;">🔔</div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Orders</h1>
        </div>

        <!-- Filters -->
        <div class="filters-section">
            <input type="text" class="search-box" placeholder="Search by Order ID or Customer...">
            <select class="filter-select">
                <option>All Dates</option>
                <option>Today</option>
                <option>Last 7 days</option>
                <option>Last 30 days</option>
            </select>
        </div>

        <!-- Status Filters -->
        <div class="status-filters">
            <button class="status-btn active" onclick="filterStatus(this, 'all')">All Orders</button>
            <button class="status-btn" onclick="filterStatus(this, 'confirmed')">Confirmed</button>
            <button class="status-btn" onclick="filterStatus(this, 'processing')">Processing</button>
            <button class="status-btn" onclick="filterStatus(this, 'shipped')">Shipped</button>
            <button class="status-btn" onclick="filterStatus(this, 'delivered')">Delivered</button>
        </div>

        <!-- Orders Table -->
        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="order-id">#ORD-2024-001</span></td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar">SJ</div>
                                <span>Sarah Johnson</span>
                            </div>
                        </td>
                        <td>3 items</td>
                        <td>₹15,899</td>
                        <td><span class="badge badge-delivered">Delivered</span></td>
                        <td>Oct 5, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=001" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-002</span></td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #00d9ff, #00b3ff);">MC</div>
                                <span>Michael Chen</span>
                            </div>
                        </td>
                        <td>2 items</td>
                        <td>₹8,450</td>
                        <td><span class="badge badge-shipped">Shipped</span></td>
                        <td>Oct 4, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=002" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-003</span></td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #ff6b9d, #c06c84);">ED</div>
                                <span>Emily Davis</span>
                            </div>
                        </td>
                        <td>1 item</td>
                        <td>₹3,750</td>
                        <td><span class="badge badge-confirmed">Confirmed</span></td>
                        <td>Oct 3, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=003" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-004</span></td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #ffa502, #ffcd39);">JW</div>
                                <span>James Wilson</span>
                            </div>
                        </td>
                        <td>5 items</td>
                        <td>₹22,100</td>
                        <td><span class="badge badge-processing">Processing</span></td>
                        <td>Oct 2, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=004" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-005</span></td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #667eea, #764ba2);">LA</div>
                                <span>Lisa Anderson</span>
                            </div>
                        </td>
                        <td>2 items</td>
                        <td>₹6,899</td>
                        <td><span class="badge badge-delivered">Delivered</span></td>
                        <td>Oct 1, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=005" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-006</span></td>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #f093fb, #f5576c);">RB</div>
                                <span>Robert Brown</span>
                            </div>
                        </td>
                        <td>4 items</td>
                        <td>₹18,500</td>
                        <td><span class="badge badge-confirmed">Confirmed</span></td>
                        <td>Sep 30, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=006" class="action-btn">View</a></td>
                    </tr>
                </tbody>
            </table>
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

        function filterStatus(btn, status) {
            document.querySelectorAll('.status-btn').forEach(b => {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            alert(`Filtering by: ${status}`);
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

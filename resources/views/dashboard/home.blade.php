<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LUXORA</title>
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
            line-height: 1.6;
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

        header.mobile-expanded {
            left: 0;
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

        .navbar-right {
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .navbar-icon {
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .navbar-icon:hover {
            color: var(--accent);
        }

        .profile-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-menu:hover {
            background: var(--gray-100);
        }

        .profile-avatar {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-alt) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-weight: 600;
            font-size: 13px;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 600;
            display: none;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            margin-top: 70px;
            padding: 40px;
            transition: margin-left 0.3s ease;
        }

        .main-content.mobile-collapsed {
            margin-left: 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .date-selector {
            padding: 10px 20px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background: var(--secondary);
            font-size: 14px;
            cursor: pointer;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: var(--secondary);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--gray-200);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent) 0%, var(--accent-alt) 100%);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .stat-change {
            font-size: 13px;
            color: #00b377;
        }

        .stat-change.negative {
            color: #ff6464;
        }

        /* Charts Section */
        .charts-section {
            margin-bottom: 50px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .chart-card {
            background: var(--secondary);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--gray-200);
        }

        .chart-placeholder {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, rgba(255, 0, 110, 0.1) 0%, rgba(0, 217, 255, 0.1) 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-500);
            font-size: 14px;
        }

        /* Table Section */
        .table-section {
            background: var(--secondary);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--gray-200);
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .table-title {
            font-size: 18px;
            font-weight: 600;
        }

        .view-all-link {
            color: var(--accent);
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 15px 0;
            border-bottom: 2px solid var(--gray-200);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray-600);
        }

        td {
            padding: 15px 0;
            border-bottom: 1px solid var(--gray-200);
            font-size: 14px;
        }

        tr:hover {
            background-color: var(--gray-100);
        }

        .order-id {
            font-weight: 600;
            color: var(--accent);
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

        .badge-confirmed {
            background: rgba(0, 179, 119, 0.2);
            color: #00b377;
        }

        .badge-processing {
            background: rgba(255, 165, 0, 0.2);
            color: #ff9800;
        }

        .action-btn {
            background: none;
            border: none;
            color: var(--accent);
            font-weight: 600;
            cursor: pointer;
            font-size: 13px;
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
                padding: 30px 20px;
            }

            .menu-toggle {
                display: block;
            }

            .navbar-title {
                font-size: 16px;
            }

            .page-title {
                font-size: 24px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .date-selector {
                width: 100%;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px 0;
            }

            .profile-name {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .sidebar-logo {
                font-size: 18px;
                margin-bottom: 30px;
            }

            .page-title {
                font-size: 20px;
            }

            .stat-value {
                font-size: 24px;
            }

            .navbar {
                padding: 0 15px;
            }

            .navbar-right {
                gap: 15px;
            }

            .main-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <x-dashboard-menu active="dashboard" />

    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="navbar-left">
                <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
                <div class="navbar-title">Dashboard</div>
            </div>
            <div class="navbar-right">
                <span class="navbar-icon">🔔</span>
                <div class="profile-menu">
                    <div class="profile-avatar">AD</div>
                    <span class="profile-name">Admin</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Dashboard</h1>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">💰</div>
                <div class="stat-label">Total Revenue</div>
                <div class="stat-value">₹12,45,890</div>
                <div class="stat-change">↑ 12.5% from last month</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📦</div>
                <div class="stat-label">Total Orders</div>
                <div class="stat-value">856</div>
                <div class="stat-change">↑ 8.2% from last month</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-label">Total Customers</div>
                <div class="stat-value">3,245</div>
                <div class="stat-change">↑ 15.3% from last month</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-label">Conversion Rate</div>
                <div class="stat-value">3.8%</div>
                <div class="stat-change negative">↓ 0.5% from last month</div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-section">
            <h2 class="section-title">Analytics</h2>
            <div class="charts-grid">
                <div class="chart-card">
                    <h3 style="margin-bottom: 20px; font-size: 16px; font-weight: 600;">Revenue Trend</h3>
                    <div class="chart-placeholder">📈 Revenue Chart</div>
                </div>
                <div class="chart-card">
                    <h3 style="margin-bottom: 20px; font-size: 16px; font-weight: 600;">Orders by Status</h3>
                    <div class="chart-placeholder">📊 Status Chart</div>
                </div>
                <div class="chart-card">
                    <h3 style="margin-bottom: 20px; font-size: 16px; font-weight: 600;">Top Products</h3>
                    <div class="chart-placeholder">🏆 Products Chart</div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="table-section">
            <div class="table-header">
                <h2 class="table-title">Recent Orders</h2>
                <a href="admin-dashboard-orders.html" class="view-all-link">View All →</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="order-id">#ORD-2024-001</span></td>
                        <td>Sarah Johnson</td>
                        <td>₹5,299</td>
                        <td><span class="badge badge-delivered">Delivered</span></td>
                        <td>Oct 5, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=001" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-002</span></td>
                        <td>Michael Chen</td>
                        <td>₹8,450</td>
                        <td><span class="badge badge-shipped">Shipped</span></td>
                        <td>Oct 4, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=002" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-003</span></td>
                        <td>Emily Davis</td>
                        <td>₹3,750</td>
                        <td><span class="badge badge-confirmed">Confirmed</span></td>
                        <td>Oct 3, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=003" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-004</span></td>
                        <td>James Wilson</td>
                        <td>₹12,100</td>
                        <td><span class="badge badge-processing">Processing</span></td>
                        <td>Oct 2, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=004" class="action-btn">View</a></td>
                    </tr>
                    <tr>
                        <td><span class="order-id">#ORD-2024-005</span></td>
                        <td>Lisa Anderson</td>
                        <td>₹6,899</td>
                        <td><span class="badge badge-delivered">Delivered</span></td>
                        <td>Oct 1, 2024</td>
                        <td><a href="admin-dashboard-order-detail.html?id=005" class="action-btn">View</a></td>
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

        // Close sidebar when clicking on a link
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', closeSidebar);
        });

        // Close sidebar when window resizes
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').classList.remove('active');
            }
        });
    </script>
</body>
</html>

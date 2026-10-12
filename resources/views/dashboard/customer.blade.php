<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - LUXORA Admin</title>
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

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--secondary);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid var(--gray-200);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent) 0%, var(--accent-alt) 100%);
            border-radius: 12px 12px 0 0;
        }

        .stat-card {
            position: relative;
        }

        .stat-icon {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .stat-label {
            font-size: 11px;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 600;
        }

        /* Filters */
        .filters-section {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .search-box,
        .filter-select {
            padding: 12px 15px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            font-size: 14px;
            background: var(--secondary);
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
            min-width: 600px;
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

        .customer-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 14px;
            font-weight: 600;
            flex-shrink: 0;
        }

        .customer-details {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .customer-name {
            font-weight: 600;
            color: var(--gray-900);
        }

        .customer-email {
            font-size: 12px;
            color: var(--gray-600);
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-vip {
            background: linear-gradient(135deg, rgba(255, 0, 110, 0.2), rgba(0, 217, 255, 0.2));
            color: var(--accent);
        }

        .badge-premium {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }

        .badge-active {
            background: rgba(0, 179, 119, 0.2);
            color: #00b377;
        }

        .badge-inactive {
            background: rgba(200, 24, 24, 0.2);
            color: #c81818;
        }

        .action-btn {
            background: none;
            border: none;
            color: var(--accent);
            font-weight: 600;
            cursor: pointer;
            font-size: 13px;
            margin-right: 10px;
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

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-value {
                font-size: 24px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }

            .customer-avatar {
                width: 35px;
                height: 35px;
                font-size: 12px;
            }

            .customer-email {
                display: none;
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

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-icon {
                font-size: 20px;
                margin-bottom: 8px;
            }

            .stat-value {
                font-size: 18px;
            }

            th, td {
                padding: 8px 5px;
            }

            .customer-details {
                display: none;
            }

            .customer-avatar {
                width: 30px;
                height: 30px;
                font-size: 11px;
            }
        }
    </style>
</head>
<body>
    <x-dashboard-menu active="customers" />

    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="navbar-left">
                <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
                <div class="navbar-title">Customers</div>
            </div>
            <div style="font-size: 20px; cursor: pointer;">🔔</div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Customers</h1>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-label">Total Customers</div>
                <div class="stat-value">3,245</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">✨</div>
                <div class="stat-label">Active Customers</div>
                <div class="stat-value">1,856</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🆕</div>
                <div class="stat-label">New This Month</div>
                <div class="stat-value">489</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💰</div>
                <div class="stat-label">Total Revenue</div>
                <div class="stat-value">₹24L+</div>
            </div>
        </div>

        <!-- Filters -->
        <div class="filters-section">
            <input type="text" class="search-box" placeholder="Search by name or email...">
            <select class="filter-select">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
            <select class="filter-select">
                <option>All Tiers</option>
                <option>Regular</option>
                <option>VIP</option>
                <option>Premium</option>
            </select>
        </div>

        <!-- Customers Table -->
        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Orders</th>
                        <th>Total Spent</th>
                        <th>Status</th>
                        <th>Tier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #ff006e, #ff4d9a);">JW</div>
                                <div class="customer-details">
                                    <div class="customer-name">James Wilson</div>
                                    <div class="customer-email">james@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>james@example.com</td>
                        <td>+91 98765-43210</td>
                        <td>22</td>
                        <td>₹89,200</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><span class="badge badge-vip">VIP</span></td>
                        <td><button class="action-btn">View</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #00d9ff, #00b3ff);">SJ</div>
                                <div class="customer-details">
                                    <div class="customer-name">Sarah Johnson</div>
                                    <div class="customer-email">sarah@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>sarah@example.com</td>
                        <td>+91 98765-43211</td>
                        <td>18</td>
                        <td>₹72,550</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><span class="badge badge-premium">Premium</span></td>
                        <td><button class="action-btn">View</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #ffa502, #ffcd39);">MC</div>
                                <div class="customer-details">
                                    <div class="customer-name">Michael Chen</div>
                                    <div class="customer-email">michael@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>michael@example.com</td>
                        <td>+91 98765-43212</td>
                        <td>15</td>
                        <td>₹54,320</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><span class="badge badge-active" style="background: rgba(0, 179, 119, 0.2); color: #00b377;">Regular</span></td>
                        <td><button class="action-btn">View</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #667eea, #764ba2);">ED</div>
                                <div class="customer-details">
                                    <div class="customer-name">Emily Davis</div>
                                    <div class="customer-email">emily@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>emily@example.com</td>
                        <td>+91 98765-43213</td>
                        <td>8</td>
                        <td>₹35,890</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><span class="badge badge-vip">VIP</span></td>
                        <td><button class="action-btn">View</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #f093fb, #f5576c);">LA</div>
                                <div class="customer-details">
                                    <div class="customer-name">Lisa Anderson</div>
                                    <div class="customer-email">lisa@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>lisa@example.com</td>
                        <td>+91 98765-43214</td>
                        <td>12</td>
                        <td>₹48,750</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><span class="badge badge-premium">Premium</span></td>
                        <td><button class="action-btn">View</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #fa709a, #fee140);">DM</div>
                                <div class="customer-details">
                                    <div class="customer-name">David Martinez</div>
                                    <div class="customer-email">david@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>david@example.com</td>
                        <td>+91 98765-43215</td>
                        <td>5</td>
                        <td>₹22,100</td>
                        <td><span class="badge badge-inactive">Inactive</span></td>
                        <td><span class="badge badge-active" style="background: rgba(0, 179, 119, 0.2); color: #00b377;">Regular</span></td>
                        <td><button class="action-btn">View</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">RB</div>
                                <div class="customer-details">
                                    <div class="customer-name">Robert Brown</div>
                                    <div class="customer-email">robert@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>robert@example.com</td>
                        <td>+91 98765-43216</td>
                        <td>0</td>
                        <td>₹0</td>
                        <td><span class="badge badge-inactive">Inactive</span></td>
                        <td><span class="badge badge-active" style="background: rgba(0, 179, 119, 0.2); color: #00b377;">Regular</span></td>
                        <td><button class="action-btn">View</button></td>
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

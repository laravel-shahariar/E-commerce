<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - emox</title>
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

        /* Layout */
        .account-layout {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 30px;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        .user-profile {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            margin-bottom: 20px;
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 15px;
        }

        .user-name {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .user-email {
            font-size: 12px;
            color: var(--text-light);
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sidebar-link {
            padding: 12px 15px;
            border-radius: 4px;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background-color: #e3f2fd;
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .content-section {
            background-color: var(--white);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Buttons */
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
        }

        .btn-primary:hover {
            background-color: #0052a3;
        }

        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--text-dark);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: var(--border-color);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: var(--white);
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        /* Address Cards */
        .address-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .address-card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            position: relative;
            transition: all 0.3s ease;
        }

        .address-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .address-card.default {
            border-color: var(--primary-color);
            background-color: #e3f2fd;
        }

        .address-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary-color);
            color: var(--white);
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }

        .address-type {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .address-detail {
            font-size: 13px;
            color: var(--text-light);
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .address-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .address-action-btn {
            padding: 6px 12px;
            font-size: 12px;
            background: none;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .address-action-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .add-button {
            padding: 40px 20px;
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-button:hover {
            border-color: var(--primary-color);
            background-color: #e3f2fd;
        }

        .add-button-text {
            font-size: 14px;
            font-weight: 600;
            color: var(--primary-color);
        }

        /* Settings */
        .settings-group {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .settings-group-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .setting-item:last-child {
            border-bottom: none;
        }

        .setting-label {
            font-size: 13px;
            color: var(--text-dark);
        }

        .setting-description {
            font-size: 12px;
            color: var(--text-light);
            margin-top: 4px;
        }

        .toggle-switch {
            width: 50px;
            height: 26px;
            background-color: var(--light-gray);
            border: 2px solid var(--border-color);
            border-radius: 13px;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .toggle-switch.active {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .toggle-slider {
            width: 20px;
            height: 20px;
            background-color: var(--white);
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: left 0.3s ease;
        }

        .toggle-switch.active .toggle-slider {
            left: 26px;
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

        /* Success Message */
        .success-message {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 15px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: none;
        }

        .success-message.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .account-layout {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .address-grid {
                grid-template-columns: 1fr;
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

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
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
                <a href="account.html" class="header-icon">
                    <span class="icon">👤</span>
                    <span>Account</span>
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
        <div class="account-layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="user-profile">
                    <div class="user-avatar">👤</div>
                    <div class="user-name">John Doe</div>
                    <div class="user-email">john@example.com</div>
                </div>

                <nav class="sidebar-menu">
                    <a class="sidebar-link active" onclick="showSection('profile')">
                        <span>👤</span> My Profile
                    </a>
                    <a class="sidebar-link" onclick="showSection('addresses')">
                        <span>📍</span> Addresses
                    </a>
                    <a class="sidebar-link" onclick="showSection('orders')">
                        <span>📦</span> My Orders
                    </a>
                    <a class="sidebar-link" onclick="showSection('settings')">
                        <span>⚙️</span> Preferences
                    </a>
                    <a class="sidebar-link" onclick="showSection('security')">
                        <span>🔒</span> Security
                    </a>
                    <a class="sidebar-link" onclick="logout()">
                        <span>🚪</span> Logout
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Profile Section -->
                <section id="profile" class="content-section active">
                    <h2 class="section-title">👤 My Profile</h2>
                    <div class="success-message" id="successMessage">✓ Profile updated successfully!</div>
                    
                    <form onsubmit="updateProfile(event)">
                        <div class="form-row">
                            <div class="form-group">
                                <label>First Name *</label>
                                <input type="text" value="John" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name *</label>
                                <input type="text" value="Doe" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input type="email" value="john@example.com" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number *</label>
                                <input type="tel" value="+91 98765 43210" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" value="1990-01-15">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Bio</label>
                            <textarea rows="4" placeholder="Tell us about yourself...">Love shopping for quality products online!</textarea>
                        </div>

                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </section>

                <!-- Addresses Section -->
                <section id="addresses" class="content-section">
                    <h2 class="section-title">📍 Saved Addresses</h2>

                    <div class="address-grid">
                        <div class="address-card default">
                            <div class="address-badge">Default</div>
                            <div class="address-type">Home</div>
                            <div class="address-detail">
                                123 Main Street<br>
                                New York, NY 10001<br>
                                United States<br>
                                Phone: +91 98765 43210
                            </div>
                            <div class="address-actions">
                                <button class="address-action-btn" onclick="editAddress()">Edit</button>
                                <button class="address-action-btn" onclick="setDefault()">Set Default</button>
                                <button class="address-action-btn" onclick="deleteAddress()">Delete</button>
                            </div>
                        </div>

                        <div class="address-card">
                            <div class="address-type">Office</div>
                            <div class="address-detail">
                                456 Business Avenue<br>
                                New York, NY 10002<br>
                                United States<br>
                                Phone: +91 98765 43210
                            </div>
                            <div class="address-actions">
                                <button class="address-action-btn" onclick="editAddress()">Edit</button>
                                <button class="address-action-btn" onclick="setDefault()">Set Default</button>
                                <button class="address-action-btn" onclick="deleteAddress()">Delete</button>
                            </div>
                        </div>

                        <div class="add-button" onclick="addNewAddress()">
                            <div style="font-size: 30px; margin-bottom: 10px;">+</div>
                            <div class="add-button-text">Add New Address</div>
                        </div>
                    </div>
                </section>

                <!-- Orders Section -->
                <section id="orders" class="content-section">
                    <h2 class="section-title">📦 Recent Orders</h2>
                    
                    <div style="text-align: center; padding: 40px; background-color: var(--light-gray); border-radius: 8px;">
                        <p style="margin-bottom: 20px;">View all your orders in one place</p>
                        <a href="my-orders.html" class="btn btn-primary">Go to My Orders</a>
                    </div>
                </section>

                <!-- Settings Section -->
                <section id="settings" class="content-section">
                    <h2 class="section-title">⚙️ Preferences</h2>

                    <div class="settings-group">
                        <div class="settings-group-title">Email Notifications</div>
                        <div class="setting-item">
                            <div>
                                <div class="setting-label">Order Updates</div>
                                <div class="setting-description">Get notified about order status</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSetting(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>
                        <div class="setting-item">
                            <div>
                                <div class="setting-label">Promotions & Offers</div>
                                <div class="setting-description">Receive exclusive deals and offers</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSetting(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>
                        <div class="setting-item">
                            <div>
                                <div class="setting-label">New Product Alerts</div>
                                <div class="setting-description">Know about new arrivals first</div>
                            </div>
                            <div class="toggle-switch" onclick="toggleSetting(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>
                    </div>

                    <div class="settings-group">
                        <div class="settings-group-title">App Settings</div>
                        <div class="setting-item">
                            <div>
                                <div class="setting-label">Dark Mode</div>
                                <div class="setting-description">Use dark theme for the app</div>
                            </div>
                            <div class="toggle-switch" onclick="toggleSetting(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>
                        <div class="setting-item">
                            <div>
                                <div class="setting-label">Save Payment Methods</div>
                                <div class="setting-description">Store payment details for faster checkout</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSetting(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Security Section -->
                <section id="security" class="content-section">
                    <h2 class="section-title">🔒 Security & Privacy</h2>

                    <div style="margin-bottom: 30px;">
                        <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 15px;">Password</h3>
                        <p style="color: var(--text-light); margin-bottom: 15px; font-size: 13px;">Your password was last changed 3 months ago</p>
                        <button class="btn btn-primary" onclick="changePassword()">Change Password</button>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 15px;">Two-Factor Authentication</h3>
                        <p style="color: var(--text-light); margin-bottom: 15px; font-size: 13px;">Add an extra layer of security to your account</p>
                        <button class="btn btn-secondary" onclick="enable2FA()">Enable 2FA</button>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 15px;">Login Activity</h3>
                        <div style="border: 1px solid var(--border-color); border-radius: 4px; padding: 15px; margin-bottom: 15px; font-size: 13px;">
                            <div style="margin-bottom: 10px;">
                                <strong>Last login:</strong> Today at 2:30 PM (Chrome on Windows)
                            </div>
                            <div style="margin-bottom: 10px;">
                                <strong>2nd last login:</strong> Yesterday at 10:15 AM (Safari on iPhone)
                            </div>
                            <div>
                                <strong>3rd last login:</strong> 2 days ago at 5:45 PM (Chrome on Windows)
                            </div>
                        </div>
                        <button class="btn btn-secondary" onclick="viewAllActivity()">View All Activity</button>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 15px; color: var(--danger-color);">Danger Zone</h3>
                        <p style="color: var(--text-light); margin-bottom: 15px; font-size: 13px;">Permanently delete your account and all associated data</p>
                        <button class="btn btn-danger" onclick="deleteAccount()">Delete Account</button>
                    </div>
                </section>
            </div>
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
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });

            // Remove active class from all sidebar links
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('active');
            });

            // Show selected section
            document.getElementById(sectionId).classList.add('active');

            // Add active class to clicked link
            event.target.closest('.sidebar-link').classList.add('active');

            // Scroll to top
            window.scrollTo(0, 0);
        }

        function updateProfile(event) {
            event.preventDefault();
            const successMessage = document.getElementById('successMessage');
            successMessage.classList.add('show');
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 3000);
        }

        function addNewAddress() {
            alert('Add New Address dialog would open here');
        }

        function editAddress() {
            alert('Edit Address dialog would open here');
        }

        function setDefault() {
            alert('Address set as default!');
        }

        function deleteAddress() {
            if (confirm('Are you sure you want to delete this address?')) {
                alert('Address deleted successfully!');
            }
        }

        function toggleSetting(element) {
            element.classList.toggle('active');
        }

        function changePassword() {
            alert('Change Password dialog would open here');
        }

        function enable2FA() {
            alert('Enable Two-Factor Authentication dialog would open here');
        }

        function viewAllActivity() {
            alert('Login activity history would be displayed here');
        }

        function deleteAccount() {
            if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                alert('Account deletion request submitted. Please check your email to confirm.');
            }
        }

        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                alert('You have been logged out successfully');
                window.location.href = 'index.html';
            }
        }
    </script>
</body>
</html>

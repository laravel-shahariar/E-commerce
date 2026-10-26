@extends('template.basic')
@section('title', 'My Account')
@section('style')
    <style>
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
    .sidebar-link:hover, .sidebar-link.active {
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
        .button-group {
            flex-direction: column;
        }
        .btn {
            width: 100%;
        }
    }

    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
        box-sizing: border-box;
    }
    .modal-overlay.active {
        display: flex;
    }
    .modal-container {
        background-color: var(--white);
        border-radius: 8px;
        width: 100%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        animation: modalFadeIn 0.3s ease;
    }
    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 25px;
        border-bottom: 1px solid var(--border-color);
    }
    .modal-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }
    .modal-close-btn {
        background: none;
        border: none;
        font-size: 24px;
        line-height: 1;
        cursor: pointer;
        color: var(--text-light);
        transition: color 0.2s ease;
    }
    .modal-close-btn:hover {
        color: var(--text-dark);
    }
    .modal-body {
        padding: 25px;
    }
    </style>
@endsection
@section('content')
    <!-- Main Container -->
    <div class="container">
        <div class="account-layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="user-profile">
                    <div class="user-avatar">👤</div>
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-email">{{ Auth::user()->email }}</div>
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
                    <a class="sidebar-link">
                        <span>🚪</span> 
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <span onclick="event.preventDefault(); this.closest('form').submit();">Log Out</span>
                        </form>
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Profile Section -->
                <section id="profile" class="content-section active">
                    <h2 class="section-title">👤 My Profile</h2>

                    @if (session('status') === 'profile-updated')
                        <div class="success-message">✓ Profile updated successfully!</div>
                    @endif
                    
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="form-row">
                            <div class="form-group" style="margin-bottom: 20px">
                                <label>Email Address</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            <div class="form-group" style="margin-bottom: 20px">
                                <label>Phone Number</label>
                                <input type="tel" name="phone_number" value="{{ Auth::user()->phone_number }}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                            </div>
                        </div>

                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </section>

                <!-- Addresses Section -->
                <section id="addresses" class="content-section">
                    <h2 class="section-title">📍 Saved Addresses</h2>

                    <div class="address-grid">
                        @foreach($addresses as $address)
                            <div class="address-card {{ $address->is_default ? 'default' : '' }}">
                                @if($address->is_default)
                                    <div class="address-badge">Default</div>
                                @endif
                                <div class="address-type">{{ $address->name }}</div>
                                <div class="address-detail">
                                    {{ $address->address }}<br>
                                    @if($address->district)
                                        {{ $address->district }},
                                    @endif
                                    {{ $address->city }}, {{ $address->province }} {{ $address->postal_code }}<br>
                                    Phone: {{ $address->phone_number }}<br>
                                    Email: {{ $address->email }}
                                </div>
                                <div class="address-actions">
                                    <button type="button" class="address-action-btn" onclick="editAddress({{ $address->id }})">Edit</button>
                                    @if(!$address->is_default)
                                        <button type="button" class="address-action-btn" onclick="setDefault({{ $address->id }})">Set Default</button>
                                    @endif
                                    <button type="button" class="address-action-btn" onclick="deleteAddress({{ $address->id }})">Delete</button>
                                </div>
                            </div>
                        @endforeach

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
                        <a href="/orders" class="btn btn-primary">Go to My Orders</a>
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
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Change Password</a>
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
                        <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 15px; color: var(--danger-color);">Nice Zone</h3>
                        <p style="color: var(--text-light); margin-bottom: 15px; font-size: 13px;">Permanently delete your account and all associated data</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-danger">Delete Account</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Add New Address Modal -->
    <div id="addressModal" class="modal-overlay" onclick="closeAddressModal(event)">
        <div class="modal-container" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title">📍 Add New Address</h3>
                <button type="button" class="modal-close-btn" onclick="closeAddressModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addAddressForm" action="{{ route('account.add-address') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="John Doe" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Phone Number</label>
                            <input type="tel" name="phone_number" placeholder="+91 98765 43210" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" value="{{ Auth::user()->email ?? '' }}" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>State / Province</label>
                            <input type="text" name="province" placeholder="State / Province" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>City</label>
                            <input type="text" name="city" placeholder="City" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>District / Area</label>
                            <input type="text" name="district" placeholder="District / Area" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Postal / PIN Code</label>
                            <input type="text" name="postal_code" placeholder="Postal Code" required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 15px">
                        <label>Street Address</label>
                        <textarea name="address" rows="3" placeholder="Flat, House no., Building, Street address" style="width: 100%; padding: 10px; border: 1px solid var(--border-color); border-radius: 4px; font-family: inherit; font-size: 14px;" required></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" id="is_default" name="is_default" value="1" style="width: 16px; height: 16px; cursor: pointer;">
                        <label for="is_default" style="margin: 0; cursor: pointer; font-size: 14px; color: var(--text-dark);">Set as default address</label>
                    </div>

                    <div class="modal-footer" style="display: flex; justify-content: flex-end; gap: 10px;">
                        <button type="button" class="btn btn-secondary" onclick="closeAddressModal()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Address Modal -->
    <div id="editAddressModal" class="modal-overlay" onclick="closeEditAddressModal(event)">
        <div class="modal-container" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title">✏️ Edit Address</h3>
                <button type="button" class="modal-close-btn" onclick="closeEditAddressModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editAddressForm" action="{{ route('account.edit-address') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit_address_id">
                    
                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Full Name</label>
                            <input type="text" name="name" id="edit_name" placeholder="John Doe" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Phone Number</label>
                            <input type="tel" name="phone_number" id="edit_phone_number" placeholder="+91 98765 43210" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Email Address</label>
                            <input type="email" name="email" id="edit_email" placeholder="john@example.com" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>State / Province</label>
                            <input type="text" name="province" id="edit_province" placeholder="State / Province" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>City</label>
                            <input type="text" name="city" id="edit_city" placeholder="City" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>District / Area</label>
                            <input type="text" name="district" id="edit_district" placeholder="District / Area" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-bottom: 15px">
                            <label>Postal / PIN Code</label>
                            <input type="text" name="postal_code" id="edit_postal_code" placeholder="Postal Code" required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 15px">
                        <label>Street Address</label>
                        <textarea name="address" id="edit_address" rows="3" placeholder="Flat, House no., Building, Street address" style="width: 100%; padding: 10px; border: 1px solid var(--border-color); border-radius: 4px; font-family: inherit; font-size: 14px;" required></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" id="edit_is_default" name="is_default" value="1" style="width: 16px; height: 16px; cursor: pointer;">
                        <label for="edit_is_default" style="margin: 0; cursor: pointer; font-size: 14px; color: var(--text-dark);">Set as default address</label>
                    </div>

                    <div class="modal-footer" style="display: flex; justify-content: flex-end; gap: 10px;">
                        <button type="button" class="btn btn-secondary" onclick="closeEditAddressModal()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const addressesData = @json($addresses->keyBy('id'));

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

        function toggleSetting(element) {
            element.classList.toggle('active');
        }

        function addNewAddress() {
            const modal = document.getElementById('addressModal');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeAddressModal(event) {
            if (!event || event.target.id === 'addressModal' || event.target.classList.contains('modal-close-btn') || event.target.closest('.modal-close-btn') || event.target.classList.contains('btn-secondary')) {
                const modal = document.getElementById('addressModal');
                if (modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
        }

        function editAddress(id) {
            const addr = addressesData[id];
            if (!addr) return;

            document.getElementById('edit_address_id').value = addr.id;
            document.getElementById('edit_name').value = addr.name || '';
            document.getElementById('edit_phone_number').value = addr.phone_number || '';
            document.getElementById('edit_email').value = addr.email || '';
            document.getElementById('edit_province').value = addr.province || '';
            document.getElementById('edit_city').value = addr.city || '';
            document.getElementById('edit_district').value = addr.district || '';
            document.getElementById('edit_postal_code').value = addr.postal_code || '';
            document.getElementById('edit_address').value = addr.address || '';
            document.getElementById('edit_is_default').checked = !!addr.is_default;

            const modal = document.getElementById('editAddressModal');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeEditAddressModal(event) {
            if (!event || event.target.id === 'editAddressModal' || event.target.classList.contains('modal-close-btn') || event.target.closest('.modal-close-btn') || event.target.classList.contains('btn-secondary')) {
                const modal = document.getElementById('editAddressModal');
                if (modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const addModal = document.getElementById('addressModal');
                if (addModal && addModal.classList.contains('active')) {
                    addModal.classList.remove('active');
                    document.body.style.overflow = '';
                }
                const editModal = document.getElementById('editAddressModal');
                if (editModal && editModal.classList.contains('active')) {
                    editModal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
        });

        function setDefault(id) {
            console.log('Set default address:', id);
        }

        function deleteAddress(id) {
            console.log('Delete address:', id);
        }
    </script>
@endsection

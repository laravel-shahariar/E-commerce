<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - LUXORA Admin</title>
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
            display: flex;
            align-items: center;
            text-decoration: none;
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

        /* Page Header */
        .product-edit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 20px;
        }

        .product-title-section h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .product-title-section .product-meta {
            color: var(--gray-600);
            font-size: 13px;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 10px 22px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid transparent;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--secondary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background: var(--accent);
            border-color: var(--accent);
        }

        .btn-secondary {
            background: var(--secondary);
            color: var(--gray-900);
            border-color: var(--gray-300);
        }

        .btn-secondary:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .btn-danger {
            background: #fff5f5;
            color: #e53e3e;
            border-color: #feb2b2;
        }

        .btn-danger:hover {
            background: #e53e3e;
            color: var(--secondary);
        }

        /* Layout Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        /* Cards */
        .card {
            background: var(--secondary);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 25px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--gray-800);
        }

        .form-group label .required {
            color: var(--accent);
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            font-size: 14px;
            color: var(--gray-900);
            background: var(--secondary);
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(255, 0, 110, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 110px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .form-hint {
            font-size: 11px;
            color: var(--gray-500);
            margin-top: 5px;
        }

        /* Media Upload Area */
        .media-upload-area {
            border: 2px dashed var(--gray-300);
            border-radius: 8px;
            padding: 30px 20px;
            text-align: center;
            background: var(--gray-100);
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .media-upload-area:hover {
            border-color: var(--accent);
            background: rgba(255, 0, 110, 0.03);
        }

        .upload-icon {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .upload-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 4px;
        }

        .upload-subtext {
            font-size: 11px;
            color: var(--gray-500);
        }

        .media-preview-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .media-preview-item {
            position: relative;
            height: 90px;
            background: linear-gradient(135deg, rgba(255, 0, 110, 0.1) 0%, rgba(0, 217, 255, 0.1) 100%);
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            overflow: hidden;
        }

        .media-preview-badge {
            position: absolute;
            top: 4px;
            left: 4px;
            background: var(--primary);
            color: var(--secondary);
            font-size: 9px;
            padding: 2px 6px;
            border-radius: 3px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .media-preview-remove {
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            border: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            transition: background 0.2s ease;
        }

        .media-preview-remove:hover {
            background: var(--accent);
        }

        /* Status Badge */
        .status-badge-preview {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: #e6f9f0;
            color: #00b377;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .status-badge-preview.draft {
            background: #fff8e6;
            color: #d97706;
        }

        .status-badge-preview.inactive {
            background: #fee2e2;
            color: #dc2626;
        }

        /* Checkbox & Radio */
        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            cursor: pointer;
            color: var(--gray-800);
        }

        .checkbox-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--accent);
            cursor: pointer;
        }

        /* Toast notification */
        .save-alert {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #00b377;
            color: #ffffff;
            padding: 14px 22px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            font-size: 14px;
            font-weight: 500;
            z-index: 2000;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
            }
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

        /* Responsive */
        @media (max-width: 1024px) {
            .form-grid {
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

            .product-edit-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-title-section h1 {
                font-size: 22px;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions .btn {
                flex: 1;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 15px 10px;
            }

            .navbar {
                padding: 0 15px;
            }

            .card {
                padding: 16px;
            }

            .header-actions {
                flex-direction: column;
            }

            .header-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <x-dashboard-menu active="products" />

    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="navbar-left">
                <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
                <a href="{{ route('dashboard.product') }}" class="back-btn" title="Back to Products">←</a>
                <div class="navbar-title">Product Details</div>
            </div>
            <div class="navbar-right">
                <span style="font-size: 20px; cursor: pointer;">🔔</span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Error Alerts -->
        @if (isset($errors) && $errors->any())
            <div style="background: #fff5f5; border: 1px solid #feb2b2; color: #c53030; padding: 14px 18px; border-radius: 6px; margin-bottom: 25px; font-size: 14px;">
                <strong>Please correct the following errors:</strong>
                <ul style="margin-left: 20px; margin-top: 5px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div style="background: #f0fff4; border: 1px solid #9ae6b4; color: #276749; padding: 14px 18px; border-radius: 6px; margin-bottom: 25px; font-size: 14px;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form id="productUpdateForm" action="{{ route('dashboard.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Header with actions -->
            <div class="product-edit-header">
                <div class="product-title-section">
                    <h1>Edit Product #{{ $product->id }}</h1>
                    <div class="product-meta">
                        SKU: LUX-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }} &bull;
                        Created: {{ $product->created_at ? $product->created_at->format('M d, Y') : 'N/A' }} &bull;
                        Last updated: {{ $product->updated_at ? $product->updated_at->diffForHumans() : 'N/A' }}
                    </div>
                </div>
                <div class="header-actions">
                    <a href="{{ route('dashboard.product') }}" class="btn btn-secondary">Back to Products</a>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </div>

            <!-- Form Layout Grid -->
            <div class="form-grid">
                <!-- Left Column: Primary Details -->
                <div>
                    <!-- Basic Information Card -->
                    <div class="card">
                        <div class="card-title">📝 Basic Information</div>

                        <div class="form-group">
                            <label for="product-name">Product Name <span class="required">*</span></label>
                            <input type="text" id="product-name" name="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="Enter product title" required>
                        </div>

                        <div class="form-group">
                            <label for="product-description">Description</label>
                            <textarea id="product-description" name="description" class="form-control" rows="5" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                            <div class="form-hint">Provide a detailed description highlighting craftsmanship, materials, and features.</div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="product-category">Category <span class="required">*</span></label>
                                <select id="product-category" name="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product-brand">Brand / Designer</label>
                                <select id="product-brand" name="brand_id" class="form-control">
                                    <option value="">None / Independent</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product-size">Size Option</label>
                            <select id="product-size" name="size_id" class="form-control">
                                <option value="">Standard / One Size</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}" {{ old('size_id', $product->size_id) == $size->id ? 'selected' : '' }}>
                                        Size {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Media / Images Card -->
                    <div class="card">
                        <div class="card-title">🖼️ Product Media</div>
                        @if ($product->image)
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; font-size: 12px; font-weight: 600; color: var(--gray-600); margin-bottom: 6px;">Current Image:</label>
                                <div style="display: inline-block; padding: 4px; border: 1px solid var(--gray-300); border-radius: 8px; background: #fff;">
                                    @if (file_exists(public_path('photo/' . $product->image)))
                                        <img src="{{ asset('photo/' . $product->image) }}" alt="{{ $product->name }}" style="max-height: 120px; border-radius: 6px; display: block; object-fit: cover;">
                                    @elseif (file_exists(public_path($product->image)))
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-height: 120px; border-radius: 6px; display: block; object-fit: cover;">
                                    @elseif (filter_var($product->image, FILTER_VALIDATE_URL) || str_starts_with($product->image, 'http'))
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-height: 120px; border-radius: 6px; display: block; object-fit: cover;">
                                    @else
                                        <span style="font-size: 32px; padding: 10px; display: inline-block;">{{ $product->image }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="media-upload-area" onclick="document.getElementById('imageFileInput').click()">
                            <input type="file" id="imageFileInput" name="image" accept="image/*" onchange="previewSelectedImage(event)" style="display: none;">
                            <div class="upload-icon">📷</div>
                            <div class="upload-text">Click to replace or upload new photo</div>
                            <div class="upload-subtext">PNG, JPG, JPEG, WEBP or SVG (Max 5MB)</div>
                        </div>

                        <!-- Live preview box -->
                        <div id="imagePreviewBox" class="image-preview-box" style="display: none; margin-top: 10px; width: 140px; height: 140px; border-radius: 8px; border: 1px solid var(--gray-300); overflow: hidden; position: relative;">
                            <img id="imagePreviewImg" src="" alt="New Preview" style="width: 100%; height: 100%; object-fit: cover;">
                            <button type="button" class="remove-preview-btn" onclick="removeImagePreview(event)" style="position: absolute; top: 5px; right: 5px; background: rgba(0,0,0,0.7); color: #fff; border: none; width: 24px; height: 24px; border-radius: 50%; cursor: pointer;">&times;</button>
                        </div>
                    </div>

                    <!-- Pricing & Inventory Card -->
                    <div class="card">
                        <div class="card-title">💰 Pricing & Inventory</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="regular-price">Regular Price (₹) <span class="required">*</span></label>
                                <input type="number" step="0.01" min="0" id="regular-price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="compare-price">Discount / Compare Price (₹)</label>
                                <input type="number" step="0.01" min="0" id="compare-price" name="discount_price" class="form-control" value="{{ old('discount_price', $product->discount_price) }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="product-sku">SKU</label>
                                <input type="text" id="product-sku" class="form-control" value="LUX-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}" readonly style="background: var(--gray-100); cursor: not-allowed;">
                            </div>
                            <div class="form-group">
                                <label for="stock-qty">Stock Quantity <span class="required">*</span></label>
                                <input type="number" min="0" id="stock-qty" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Status & Organization -->
                <div>
                    <!-- Status Card -->
                    <div class="card">
                        <div class="card-title">⚙️ Product Status</div>
                        <div id="statusBadge" class="status-badge-preview {{ $product->status }}">
                            ● {{ ucfirst($product->status) }} in Store
                        </div>

                        <div class="form-group">
                            <label for="product-status">Visibility Status <span class="required">*</span></label>
                            <select id="product-status" name="status" class="form-control" onchange="updateStatusBadge(this.value)" required>
                                <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active (Published)</option>
                                <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft (Hidden)</option>
                                <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive (Archived)</option>
                            </select>
                        </div>

                        <div class="form-group" style="margin-top: 15px;">
                            <label>Product Stats</label>
                            <div style="font-size: 13px; color: var(--gray-600); line-height: 1.8;">
                                <div>👁 Total Views: <strong>{{ $product->views ?? 0 }}</strong></div>
                                <div>🛍 Sold Count: <strong>{{ $product->sold_count ?? 0 }}</strong></div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Card -->
                    <div class="card">
                        <div class="card-title">⚡ Actions</div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 10px;">
                            Save Changes
                        </button>
                        <a href="{{ route('dashboard.product') }}" class="btn btn-secondary" style="width: 100%;">
                            Cancel & Return
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 LUXORA Admin Dashboard. All rights reserved.</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) {
                sidebar.classList.toggle('active');
            }
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar && window.innerWidth <= 768) {
                sidebar.classList.remove('active');
            }
        }

        function previewSelectedImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewBox = document.getElementById('imagePreviewBox');
                    const previewImg = document.getElementById('imagePreviewImg');
                    previewImg.src = e.target.result;
                    previewBox.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImagePreview(event) {
            event.stopPropagation();
            const input = document.getElementById('imageFileInput');
            const previewBox = document.getElementById('imagePreviewBox');
            const previewImg = document.getElementById('imagePreviewImg');
            input.value = '';
            previewImg.src = '';
            previewBox.style.display = 'none';
        }

        function updateStatusBadge(status) {
            const badge = document.getElementById('statusBadge');
            badge.className = 'status-badge-preview ' + status;
            if (status === 'active') {
                badge.textContent = '● Active in Store';
            } else if (status === 'draft') {
                badge.textContent = '● Draft (Hidden)';
            } else {
                badge.textContent = '● Inactive (Archived)';
            }
        }

        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', closeSidebar);
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                const sidebar = document.getElementById('sidebar');
                if (sidebar) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>

@php
    use App\Models\product;
    $products = $products ?? product::with(['category', 'brand'])->latest()->paginate(20);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - LUXORA Admin</title>
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

        .navbar-right {
            display: flex;
            gap: 25px;
            align-items: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            margin-top: 70px;
            padding: 40px;
            transition: margin-left 0.3s ease;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .add-btn {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-alt) 100%);
            color: var(--secondary);
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 0, 110, 0.3);
        }

        /* Filters */
        .filters-section {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
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

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .product-card {
            background: var(--secondary);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            border-color: var(--accent);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .product-image {
            width: 100%;
            height: 150px;
            background: linear-gradient(135deg, rgba(255, 0, 110, 0.1) 0%, rgba(0, 217, 255, 0.1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            border-bottom: 1px solid var(--gray-200);
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            line-height: 1.4;
            height: 2.8em;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-sku {
            font-size: 11px;
            color: var(--gray-600);
            margin-bottom: 10px;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .product-price {
            font-weight: 600;
            color: var(--accent);
        }

        .product-stock {
            color: #00b377;
        }

        .product-stock.low {
            color: #ff6b35;
        }

        .product-actions {
            display: flex;
            gap: 8px;
        }

        .action-icon {
            background: none;
            border: 1px solid var(--gray-300);
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: inherit;
        }

        .action-icon:hover {
            background: var(--gray-100);
            border-color: var(--accent);
            color: var(--accent);
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding: 20px 0;
            border-top: 1px solid var(--gray-200);
            flex-wrap: wrap;
            gap: 15px;
        }

        .pagination-info {
            font-size: 13px;
            color: var(--gray-600);
        }

        .pagination-links {
            display: flex;
            gap: 6px;
            align-items: center;
            flex-wrap: wrap;
        }

        .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 12px;
            border-radius: 6px;
            border: 1px solid var(--gray-300);
            background: var(--secondary);
            color: var(--gray-900);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .page-btn:hover:not(.disabled):not(.active) {
            border-color: var(--accent);
            color: var(--accent);
            background: var(--gray-100);
        }

        .page-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: var(--secondary);
            font-weight: 600;
        }

        .page-btn.disabled {
            color: var(--gray-400);
            border-color: var(--gray-200);
            cursor: not-allowed;
            opacity: 0.6;
        }

        .empty-products {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: var(--secondary);
            border: 1px dashed var(--gray-300);
            border-radius: 8px;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .empty-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .empty-subtitle {
            font-size: 13px;
            color: var(--gray-600);
            margin-bottom: 20px;
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
                grid-template-columns: repeat(2, 1fr);
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 24px;
            }

            .add-btn {
                width: 100%;
            }

            .filters-section {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
                gap: 12px;
            }

            .product-image {
                height: 120px;
                font-size: 35px;
            }

            .product-info {
                padding: 10px;
            }

            .product-name {
                font-size: 12px;
            }

            .product-meta {
                font-size: 12px;
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

            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .product-image {
                height: 100px;
                font-size: 30px;
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
                <div class="navbar-title">Products</div>
            </div>
            <div class="navbar-right">
                <span style="font-size: 20px; cursor: pointer;">🔔</span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @if (session('success'))
            <div style="background: #f0fff4; border: 1px solid #9ae6b4; color: #276749; padding: 12px 18px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="page-header">
            <h1 class="page-title">Products</h1>
            <a href="{{ route('dashboard.product.add') }}" class="add-btn" style="text-decoration: none;">+ Add Product</a>
        </div>

        <!-- Filters -->
        <div class="filters-section">
            <input type="text" class="search-box" placeholder="Search products...">
            <select class="filter-select">
                <option>All Categories</option>
                <option>Fashion</option>
                <option>Electronics</option>
                <option>Home & Living</option>
            </select>
            <select class="filter-select">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            @forelse ($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if ($product->image && file_exists(public_path('photo/' . $product->image)))
                            <img src="{{ asset('photo/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @elseif ($product->image && file_exists(public_path($product->image)))
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @elseif ($product->image && (filter_var($product->image, FILTER_VALIDATE_URL) || str_starts_with($product->image, 'http')))
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span>{{ $product->image ?: '👗' }}</span>
                        @endif
                    </div>
                    <div class="product-info">
                        <div class="product-name" title="{{ $product->name }}">{{ $product->name }}</div>
                        <div class="product-sku">SKU: LUX-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</div>
                        <div class="product-meta">
                            <span class="product-price">₹{{ number_format($product->price, 0) }}</span>
                            <span class="product-stock {{ $product->stock < 10 ? 'low' : '' }}">{{ $product->stock }} in stock</span>
                        </div>
                        <div class="product-actions">
                            <a href="{{ route('dashboard.product.edit', $product->id) }}" class="action-icon" title="Edit Product">✎</a>
                            <button class="action-icon" title="View Product">👁</button>
                            <button class="action-icon" title="Delete Product">🗑</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-products">
                    <div class="empty-icon">📦</div>
                    <div class="empty-title">No products found</div>
                    <div class="empty-subtitle">Get started by creating your first product in the store catalog.</div>
                    <a href="{{ route('dashboard.product.add') }}" class="add-btn" style="text-decoration: none; display: inline-block;">+ Add Product</a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($products->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products
                </div>
                <div class="pagination-links">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                        <span class="page-btn disabled">&laquo; Prev</span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="page-btn">&laquo; Prev</a>
                    @endif

                    {{-- Pagination Numbers --}}
                    @foreach ($products->getUrlRange(max(1, $products->currentPage() - 2), min($products->lastPage(), $products->currentPage() + 2)) as $page => $url)
                        @if ($page == $products->currentPage())
                            <span class="page-btn active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="page-btn">Next &raquo;</a>
                    @else
                        <span class="page-btn disabled">Next &raquo;</span>
                    @endif
                </div>
            </div>
        @endif
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

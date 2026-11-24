@extends('template.basic')
@section('title', 'Category')
@section('style')
    <style>
/* Page Header */
        .page-header {
    background-color: var(--white);
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
}

.page-title {
    font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
}

.products-count {
    font-size: 13px;
            color: var(--text-light);
}

/* Main Layout */
        .main-layout {
    display: grid;
            grid-template-columns: 250px 1fr;
            gap: 25px;
}

/* Sidebar Filters */
        .sidebar {
    background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 100px;
}

.filter-group {
    margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
}

.filter-group:last-child {
    border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
}

.filter-title {
    font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
}

.filter-option {
    display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            cursor: pointer;
}

.filter-option input {
    cursor: pointer;
}

.filter-label {
    font-size: 13px;
            color: var(--text-dark);
            cursor: pointer;
            flex: 1;
}

.filter-count {
    font-size: 12px;
            color: var(--text-light);
}

.price-slider {
    margin-top: 10px;
}

.price-slider input[type="range"] {
    width: 100%;
            cursor: pointer;
}

.price-values {
    display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-size: 12px;
            color: var(--text-dark);
}

.clear-filters {
    width: 100%;
            padding: 10px;
            background-color: var(--light-gray);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
}

.clear-filters:hover {
    background-color: var(--border-color);
}

/* Products Section */
        .products-section {
    display: flex;
            flex-direction: column;
            gap: 20px;
}

.sort-section {
    background-color: var(--white);
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.view-options {
    display: flex;
            gap: 8px;
}

.view-btn {
    padding: 8px 12px;
            border: 1px solid var(--border-color);
            background-color: var(--white);
            cursor: pointer;
            border-radius: 4px;
            font-size: 13px;
}

.original-price {
    text-decoration: line-through;
            color: var(--text-light);
            font-size: 13px;
}

.product-btn {
    width: 100%;
            padding: 8px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: background-color 0.3s ease;
}

.product-btn:hover {
    background-color: #0052a3;
}

/* Pagination */
        .pagination {
    display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 30px;
}

.page-link {
    padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            text-decoration: none;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: var(--white);
}

.page-link:hover {
    border-color: var(--primary-color);
            color: var(--primary-color);
}

.page-link.active {
    background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
}

/* Responsive */
@media (max-width: 768px) {
.main-layout {
    grid-template-columns: 1fr;
}

.sidebar {
    position: static;
}

.page-header {
    flex-direction: column;
                align-items: flex-start;
                gap: 12px;
}

.sort-section {
    flex-direction: column;
                align-items: flex-start;
                gap: 12px;
}
}
</style>
@endsection

@section('navigation')                   
<!-- Navigation -->
<nav class="nav-categories">
    <a href="/category/all" class="{{ $category_name == 'all' ? 'active' : '' }}">All Categories</a>
    <a href="/category/electronics" class="{{ $category_name == 'electronics' ? 'active' : '' }}">Electronics</a>
    <a href="/category/fashion" class="{{ $category_name == 'fashion' ? 'active' : '' }}">Fashion</a>
    <a href="/category/home-decor" class="{{ $category_name == 'home-decor' ? 'active' : '' }}">Home & Decor</a>
    <a href="/category/health-beauty" class="{{ $category_name == 'health-beauty' ? 'active' : '' }}">Health & Beauty</a>
    <a href="/category/sports" class="{{ $category_name == 'sports' ? 'active' : '' }}">Sports</a>
    <a href="/category/books" class="{{ $category_name == 'books' ? 'active' : '' }}">Books</a>
    <a href="/category/pharmacy" class="{{ $category_name == 'pharmacy' ? 'active' : '' }}">Pharmacy</a>
    <a href="/category/groceries" class="{{ $category_name == 'groceries' ? 'active' : '' }}">Groceries</a>
    <a href="/category/luxury-items" class="{{ $category_name == 'luxury-items' ? 'active' : '' }}">Luxury Items</a>
</nav>
@endsection

@section('content')
    <!-- Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">{{ $category_name == "all" ? "All Categories" : ucWords(str_replace('-', ' ', $category_name)) }}</h1>
                <div class="products-count">Showing {{ $products->total() }} product{{ $products->total() !== 1 ? 's' : '' }}</div>
            </div>
        </div>

        <!-- Main Layout -->
        <div class="main-layout">
            <!-- Sidebar Filters -->
            <aside class="sidebar">
                <div class="filter-group">
                    <div class="filter-title">📊 Price Range</div>
                    <div class="price-slider">
                        <input type="range" min="0" max="{{ $sliderMax ?? 10000 }}" value="{{ request('max_price', $sliderMax ?? 10000) }}">
                        <div class="price-values">
                            <span>₹0</span>
                            <span>₹<span id="maxPrice">{{ number_format(request('max_price', $sliderMax ?? 10000)) }}</span></span>
                        </div>
                    </div>
                </div>

                <div class="filter-group">
                    <div class="filter-title">⭐ Rating</div>
                    <div class="filter-option">
                        <input type="checkbox" id="rating5">
                        <label class="filter-label" for="rating5">5 Star</label>
                        <span class="filter-count">(234)</span>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="rating4">
                        <label class="filter-label" for="rating4">4 Star & Up</label>
                        <span class="filter-count">(1245)</span>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="rating3">
                        <label class="filter-label" for="rating3">3 Star & Up</label>
                        <span class="filter-count">(2156)</span>
                    </div>
                </div>

                <div class="filter-group">
                    <div class="filter-title">📦 Brand</div>
                    @forelse($brands as $brand)
                        <div class="filter-option">
                            <input type="checkbox" class="brand-checkbox" id="brand{{ $brand->id }}" value="{{ $brand->id }}"
                                {{ (is_array(request('brand')) && in_array($brand->id, request('brand'))) || request('brand') == $brand->id ? 'checked' : '' }}>
                            <label class="filter-label" for="brand{{ $brand->id }}">{{ $brand->name }}</label>
                            <span class="filter-count">({{ $brand->product_count ?? $brand->product()->count() }})</span>
                        </div>
                    @empty
                        <div class="filter-option">
                            <span class="filter-label" style="color: var(--text-light); font-size: 13px;">No brands available</span>
                        </div>
                    @endforelse
                </div>

                <div class="filter-group">
                    <div class="filter-title">🔄 Availability</div>
                    <div class="filter-option">
                        <input type="checkbox" id="stock1" checked>
                        <label class="filter-label" for="stock1">In Stock</label>
                        <span class="filter-count">({{ $inStockCount ?? $products->filter(fn($p) => (int)$p->stock > 0)->count() }})</span>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="stock2">
                        <label class="filter-label" for="stock2">Out of Stock</label>
                        <span class="filter-count">({{ $outOfStockCount ?? $products->filter(fn($p) => (int)$p->stock <= 0)->count() }})</span>
                    </div>
                </div>

                <button class="clear-filters" onclick="clearFilters()">Clear All Filters</button>
            </aside>

            <!-- Products Section -->
            <div class="products-section">
                <!-- Sort Section -->
                <div class="sort-section">
                    <div>
                        <label style="font-size: 13px; margin-right: 10px;">Sort by:</label>
                        <select class="sort-select">
                            <option>Newest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Best Seller</option>
                            <option>Highest Rated</option>
                            <option>Most Reviewed</option>
                        </select>
                    </div>
                    <div class="view-options">
                        <button class="view-btn active">⊞</button>
                        <button class="view-btn">≡</button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="products-grid" id="productsGrid">
                    @forelse($products as $product)
                        <x-preview
                            :link="url('/product/' . $product->id)"
                            :photo="$product->image"
                            :title="$product->name"
                            :discount="$product->discount_price ? round((($product->price - $product->discount_price) / $product->price) * 100) : 0"
                            :review="$product->reviews ?? 0"
                            :price="$product->discount_price ?? $product->price"
                            :original_price="$product->discount_price ? $product->price : null"
                        />
                    @empty
                        <p class="no-products-msg" style="grid-column: 1 / -1; text-align: center; color: var(--text-light); padding: 40px 0;">No products found in this category.</p>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if ($products->hasPages())
                    <div class="pagination">
                        {{-- Previous Page Link --}}
                        @if (!$products->onFirstPage())
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">← Prev</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $start = max(1, $products->currentPage() - 2);
                            $end = min($products->lastPage(), $products->currentPage() + 2);
                        @endphp

                        @if ($start > 1)
                            <a class="page-link" href="{{ $products->url(1) }}">1</a>
                            @if ($start > 2)
                                <span class="page-link" style="border: none; background: transparent; cursor: default;">...</span>
                            @endif
                        @endif

                        @foreach ($products->getUrlRange($start, $end) as $page => $url)
                            @if ($page == $products->currentPage())
                                <a class="page-link active" href="{{ $url }}">{{ $page }}</a>
                            @else
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($end < $products->lastPage())
                            @if ($end < $products->lastPage() - 1)
                                <span class="page-link" style="border: none; background: transparent; cursor: default;">...</span>
                            @endif
                            <a class="page-link" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next →</a>
                        @endif
                    </div>
                @else
                    <div class="pagination">
                        <a class="page-link active" href="#">1</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        const priceSlider = document.querySelector('.price-slider input[type="range"]');
        const maxPriceDisplay = document.getElementById('maxPrice');
        const productsCountDisplay = document.querySelector('.products-count');
        const stock1Checkbox = document.getElementById('stock1');
        const stock2Checkbox = document.getElementById('stock2');

        // Associate stock and brand data with each product card
        const productStockMap = @json($products->pluck('stock', 'id'));
        const productStockList = @json($products->map(fn($p) => (int)$p->stock));
        const productBrandMap = @json($products->pluck('brand_id', 'id'));
        const productBrandList = @json($products->map(fn($p) => $p->brand_id ? (int)$p->brand_id : ''));
        const allCards = document.querySelectorAll('#productsGrid .product-card');
        allCards.forEach((card, index) => {
            const href = card.getAttribute('href') || '';
            const match = href.match(/\/product\/(\d+)/);
            const prodId = match ? match[1] : null;

            // stock 
            if (prodId && productStockMap[prodId] !== undefined) {
                card.dataset.stock = productStockMap[prodId];
            } else if (productStockList[index] !== undefined) {
                card.dataset.stock = productStockList[index];
            } else {
                card.dataset.stock = 1;
            }

            // brand 
            if (prodId && productBrandMap[prodId] !== undefined) {
                card.dataset.brand = productBrandMap[prodId] ?? '';
            } else {
                card.dataset.brand = '';
            }
        });

        function filterProducts() {
            const maxVal = priceSlider ? parseFloat(priceSlider.value) : Infinity;
            if (maxPriceDisplay && priceSlider) {
                maxPriceDisplay.textContent = Number(maxVal).toLocaleString();
            }

            // Brand filter selection
            const selectedBrandCheckboxes = document.querySelectorAll('.brand-checkbox:checked');
            const selectedBrands = Array.from(selectedBrandCheckboxes).map(cb => cb.value.toString());

            const cards = document.querySelectorAll('#productsGrid .product-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const price = parseFloat(card.querySelector('.price')?.textContent.replace(/[^0-9.]/g, '') || 0);
                const stock = parseInt(card.dataset.stock ?? '1', 10);
                const isAvailable = stock > 0;

                // Price filter
                const matchesPrice = price <= maxVal;

                // Availability filter 
                const inStock = stock1Checkbox ? stock1Checkbox.checked : false;
                const outOfStock = stock2Checkbox ? stock2Checkbox.checked : false;
                let matchesStock = true;
                if (inStock && !outOfStock) {
                    matchesStock = isAvailable;
                } else if (!inStock && outOfStock) {
                    matchesStock = !isAvailable;
                }

                // Brand filter
                let matchesBrand = true;
                if (selectedBrands.length > 0) {
                    const cardBrand = card.dataset.brand ? card.dataset.brand.toString() : '';
                    matchesBrand = selectedBrands.includes(cardBrand);
                }

                if (matchesPrice && matchesStock && matchesBrand) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Empty message
            let emptyMsg = document.getElementById('priceFilterEmptyMsg');
            if (visibleCount === 0 && cards.length > 0) {
                if (!emptyMsg) {
                    emptyMsg = document.createElement('p');
                    emptyMsg.id = 'priceFilterEmptyMsg';
                    emptyMsg.style.cssText = 'grid-column: 1 / -1; text-align: center; color: var(--text-light); padding: 40px 0;';
                    emptyMsg.textContent = 'No products found matching the selected filters.';
                    document.getElementById('productsGrid').appendChild(emptyMsg);
                } else {
                    emptyMsg.style.display = '';
                }
            } else if (emptyMsg) {
                emptyMsg.style.display = 'none';
            }
        }

        if (priceSlider) {
            priceSlider.addEventListener('input', filterProducts);
        }
        if (stock1Checkbox) {
            stock1Checkbox.addEventListener('change', filterProducts);
        }
        if (stock2Checkbox) {
            stock2Checkbox.addEventListener('change', filterProducts);
        }

        // Brand checkbox event listeners
        document.querySelectorAll('.brand-checkbox').forEach(cb => {
            cb.addEventListener('change', filterProducts);
        });

        // Apply on initial load
        filterProducts();

        // clear 
        function clearFilters() {
            if (priceSlider) {
                priceSlider.value = priceSlider.max;
            }
            document.querySelectorAll('.filter-option input').forEach(input => {
                input.checked = false;
            });
            const stock1 = document.getElementById('stock1');
            if (stock1) stock1.checked = true;
            filterProducts();
        }

        // sort 
        const sortSelect = document.querySelector('.sort-select');
        if (sortSelect) {
            sortSelect.addEventListener('change', function() {
                const grid = document.getElementById('productsGrid');
                const cards = Array.from(grid.querySelectorAll('.product-card'));
                const val = this.value;
                cards.sort((a, b) => {
                    const priceA = parseFloat(a.querySelector('.price')?.textContent.replace(/[^0-9.]/g, '') || 0);
                    const priceB = parseFloat(b.querySelector('.price')?.textContent.replace(/[^0-9.]/g, '') || 0);
                    if (val === 'Price: Low to High') return priceA - priceB;
                    if (val === 'Price: High to Low') return priceB - priceA;
                    return 0;
                });
                cards.forEach(card => grid.appendChild(card));
            });
        }
    </script>
@endsection

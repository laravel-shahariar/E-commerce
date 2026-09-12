@extends('template.basic')
@section('title', 'Category')
@section('style')
    <style>
/* Breadcrumb */
        .breadcrumb {
    margin-bottom: 25px;
            font-size: 13px;
}

.breadcrumb a {
    color: var(--primary-color);
            text-decoration: none;
}

.breadcrumb span {
    color: var(--text-light);
            margin: 0 5px;
}

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

            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
}
</style>
@endsection
@section('content')
    <!-- Container -->
    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="index.html">Home</a>
            <span>/</span>
            <span>Electronics</span>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">📱 Electronics</h1>
                <div class="products-count">Showing 24 products</div>
            </div>
        </div>

        <!-- Main Layout -->
        <div class="main-layout">
            <!-- Sidebar Filters -->
            <aside class="sidebar">
                <div class="filter-group">
                    <div class="filter-title">📊 Price Range</div>
                    <div class="price-slider">
                        <input type="range" min="0" max="200000" value="200000">
                        <div class="price-values">
                            <span>₹0</span>
                            <span>₹<span id="maxPrice">200000</span></span>
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
                    <div class="filter-option">
                        <input type="checkbox" id="brand1">
                        <label class="filter-label" for="brand1">Samsung</label>
                        <span class="filter-count">(356)</span>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="brand2">
                        <label class="filter-label" for="brand2">Apple</label>
                        <span class="filter-count">(245)</span>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="brand3">
                        <label class="filter-label" for="brand3">Sony</label>
                        <span class="filter-count">(189)</span>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="brand4">
                        <label class="filter-label" for="brand4">Google</label>
                        <span class="filter-count">(123)</span>
                    </div>
                </div>

                <div class="filter-group">
                    <div class="filter-title">🔄 Availability</div>
                    <div class="filter-option">
                        <input type="checkbox" id="stock1" checked>
                        <label class="filter-label" for="stock1">In Stock</label>
                        <span class="filter-count">(1856)</span>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="stock2">
                        <label class="filter-label" for="stock2">Out of Stock</label>
                        <span class="filter-count">(234)</span>
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
                    <!-- Products will be loaded here -->
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <a class="page-link active" href="#">1</a>
                    <a class="page-link" href="#">2</a>
                    <a class="page-link" href="#">3</a>
                    <a class="page-link" href="#">4</a>
                    <a class="page-link" href="#">Next →</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample products
        const products = [
            {
                id: 1,
                name: 'Samsung Galaxy S24 Ultra',
                price: 79999,
                originalPrice: 99999,
                discount: 20,
                rating: 4.8,
                emoji: '📱'
            },
            {
                id: 2,
                name: 'Apple iPhone 15 Pro Max',
                price: 139999,
                originalPrice: 165000,
                discount: 15,
                rating: 4.9,
                emoji: '📱'
            },
            {
                id: 3,
                name: 'Google Pixel 8 Pro',
                price: 79999,
                originalPrice: 94999,
                discount: 15,
                rating: 4.7,
                emoji: '📱'
            },
            {
                id: 4,
                name: 'Sony WH-1000XM5 Headphones',
                price: 35000,
                originalPrice: 42000,
                discount: 17,
                rating: 4.7,
                emoji: '🎧'
            },
            {
                id: 5,
                name: 'Apple AirPods Pro Max',
                price: 54000,
                originalPrice: 64000,
                discount: 15,
                rating: 4.8,
                emoji: '🎵'
            },
            {
                id: 6,
                name: 'Samsung QLED 4K TV 65 Inch',
                price: 89000,
                originalPrice: 125000,
                discount: 28,
                rating: 4.6,
                emoji: '📺'
            },
            {
                id: 7,
                name: 'iPad Pro 12.9 inch',
                price: 99999,
                originalPrice: 129999,
                discount: 23,
                rating: 4.8,
                emoji: '⌨️'
            },
            {
                id: 8,
                name: 'Samsung Galaxy Tab S9',
                price: 54999,
                originalPrice: 69999,
                discount: 21,
                rating: 4.6,
                emoji: '📱'
            },
            {
                id: 9,
                name: 'MacBook Pro 14 inch',
                price: 199999,
                originalPrice: 239999,
                discount: 17,
                rating: 4.9,
                emoji: '💻'
            },
            {
                id: 10,
                name: 'Dell XPS 15',
                price: 149999,
                originalPrice: 179999,
                discount: 17,
                rating: 4.7,
                emoji: '💻'
            },
            {
                id: 11,
                name: 'NVIDIA GeForce RTX 4090',
                price: 199999,
                originalPrice: 249999,
                discount: 20,
                rating: 4.8,
                emoji: '🎮'
            },
            {
                id: 12,
                name: 'PlayStation 5',
                price: 49999,
                originalPrice: 59999,
                discount: 17,
                rating: 4.7,
                emoji: '🎮'
            }
        ];

        function renderProducts() {
            const container = document.getElementById('productsGrid');
            container.innerHTML = products.map(product => `
                <div class="product-card" onclick="viewProduct(${product.id})">
                    <div class="product-image">
                        ${product.emoji}
                        <span class="product-badge">-${product.discount}%</span>
                    </div>
                    <div class="product-info">
                        <p class="product-title">${product.name}</p>
                        <div class="product-rating">
                            <span>★★★★★</span>
                        </div>
                        <div class="product-price">
                            <span class="price">₹${product.price.toLocaleString()}</span>
                            <span class="original-price">₹${product.originalPrice.toLocaleString()}</span>
                        </div>
                        <button class="product-btn" onclick="event.stopPropagation(); addToCart(${product.id})">Add to Cart</button>
                    </div>
                </div>
            `).join('');
        }

        function viewProduct(id) {
            window.location.href = 'product-detail.html?id=' + id;
        }

        function addToCart(id) {
            const product = products.find(p => p.id === id);
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            
            const item = {
                id: product.id,
                title: product.name,
                price: product.price,
                quantity: 1,
                emoji: product.emoji
            };

            const existing = cartItems.find(i => i.id === item.id);
            if (existing) {
                existing.quantity += 1;
            } else {
                cartItems.push(item);
            }

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            alert('✓ Added to cart!');
        }

        function clearFilters() {
            document.querySelectorAll('.filter-option input').forEach(input => {
                input.checked = false;
            });
            document.getElementById('stock1').checked = true;
        }

        window.addEventListener('load', renderProducts);
    </script>
@endsection

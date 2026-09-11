<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - emox</title>
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

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .wishlist-count {
            background-color: var(--light-gray);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Filter Section */
        .filter-section {
            background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-label {
            font-weight: 600;
            color: var(--text-dark);
        }

        .sort-select {
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
        }

        .view-toggle {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }

        .view-btn {
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            background-color: var(--white);
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .view-btn.active {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }

        /* Wishlist Grid */
        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .wishlist-grid.list-view {
            grid-template-columns: 1fr;
        }

        /* Product Card */
        .product-card {
            background-color: var(--white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .list-view .product-card {
            display: flex;
            gap: 20px;
        }

        .product-image {
            width: 100%;
            height: 200px;
            background-color: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            position: relative;
        }

        .list-view .product-image {
            width: 150px;
            height: 150px;
            flex-shrink: 0;
            font-size: 40px;
        }

        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--danger-color);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .wishlist-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 36px;
            height: 36px;
            background-color: var(--white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .wishlist-btn:hover {
            transform: scale(1.1);
        }

        .product-info {
            padding: 15px;
        }

        .list-view .product-info {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-title {
            font-size: 14px;
            color: var(--text-dark);
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-weight: 600;
        }

        .list-view .product-title {
            font-size: 16px;
            -webkit-line-clamp: unset;
        }

        .product-rating {
            display: flex;
            gap: 5px;
            margin-bottom: 8px;
            font-size: 12px;
        }

        .star {
            color: var(--warning-color);
        }

        .product-price {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
        }

        .price {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .list-view .price {
            font-size: 18px;
        }

        .original-price {
            text-decoration: line-through;
            color: var(--text-light);
            font-size: 14px;
        }

        .discount {
            color: var(--danger-color);
            font-size: 12px;
            font-weight: 600;
        }

        .product-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
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
            padding: 8px;
            background: none;
            border: none;
            color: var(--danger-color);
            font-size: 14px;
        }

        .btn-danger:hover {
            color: #bd2130;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .empty-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .empty-text {
            color: var(--text-light);
            margin-bottom: 30px;
        }

        .continue-shopping-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--primary-color);
            color: var(--white);
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .continue-shopping-btn:hover {
            background-color: #0052a3;
        }

        /* Actions Bar */
        .actions-bar {
            background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            flex-wrap: wrap;
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

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .filter-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .view-toggle {
                margin-left: 0;
                align-self: flex-end;
            }

            .wishlist-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .list-view .product-card {
                flex-direction: column;
            }

            .list-view .product-image {
                width: 100%;
                height: 200px;
            }

            .actions-bar {
                flex-direction: column;
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
                <a href="wishlist.html" class="header-icon">
                    <span class="icon">❤️</span>
                    <span>Wishlist</span>
                </a>
                <a href="#" class="header-icon">
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
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">❤️ My Wishlist</h1>
            <div class="wishlist-count" id="wishlistCount">5 items</div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <span class="filter-label">Sort by:</span>
            <select class="sort-select" onchange="sortWishlist(this.value)">
                <option value="recent">Recently Added</option>
                <option value="price-low">Price: Low to High</option>
                <option value="price-high">Price: High to Low</option>
                <option value="discount">Highest Discount</option>
                <option value="rating">Highest Rated</option>
            </select>
            
            <div class="view-toggle">
                <button class="view-btn active" onclick="toggleView('grid', this)">⊞ Grid</button>
                <button class="view-btn" onclick="toggleView('list', this)">≡ List</button>
            </div>
        </div>

        <!-- Wishlist Grid -->
        <div class="wishlist-grid" id="wishlistGrid">
            <!-- Wishlist items will be loaded here -->
        </div>

        <!-- Actions Bar -->
        <div class="actions-bar" id="actionsBar" style="display: none;">
            <button class="btn btn-secondary" onclick="shareWishlist()">📤 Share Wishlist</button>
            <button class="btn btn-secondary" onclick="addAllToCart()">Add All to Cart</button>
            <button class="btn btn-danger" onclick="clearWishlist()">Clear Wishlist</button>
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
        // Sample wishlist data
        const wishlistItems = [
            {
                id: 1,
                name: 'Samsung Galaxy S24 Ultra',
                price: 79999,
                originalPrice: 99999,
                discount: 20,
                rating: 4.8,
                reviews: 2345,
                emoji: '📱'
            },
            {
                id: 2,
                name: 'Apple iPhone 15 Pro Max',
                price: 139999,
                originalPrice: 165000,
                discount: 15,
                rating: 4.9,
                reviews: 3450,
                emoji: '📱'
            },
            {
                id: 3,
                name: 'Sony WH-1000XM5 Headphones',
                price: 35000,
                originalPrice: 42000,
                discount: 17,
                rating: 4.7,
                reviews: 1234,
                emoji: '🎧'
            },
            {
                id: 4,
                name: 'Apple AirPods Pro Max',
                price: 54000,
                originalPrice: 64000,
                discount: 15,
                rating: 4.8,
                reviews: 1567,
                emoji: '🎵'
            },
            {
                id: 5,
                name: 'Samsung QLED 4K TV 65 Inch',
                price: 89000,
                originalPrice: 125000,
                discount: 28,
                rating: 4.6,
                reviews: 876,
                emoji: '📺'
            }
        ];

        let currentView = 'grid';
        let currentItems = [...wishlistItems];

        function renderWishlist(items) {
            const container = document.getElementById('wishlistGrid');
            const actionsBar = document.getElementById('actionsBar');
            const wishlistCount = document.getElementById('wishlistCount');

            if (items.length === 0) {
                container.innerHTML = `
                    <div style="grid-column: 1/-1;">
                        <div class="empty-state">
                            <div class="empty-icon">💔</div>
                            <div class="empty-title">Your Wishlist is Empty</div>
                            <div class="empty-text">Add items to your wishlist to save them for later</div>
                            <a href="index.html" class="continue-shopping-btn">Start Shopping</a>
                        </div>
                    </div>
                `;
                actionsBar.style.display = 'none';
                wishlistCount.textContent = '0 items';
                return;
            }

            actionsBar.style.display = 'flex';
            wishlistCount.textContent = items.length + ' item' + (items.length !== 1 ? 's' : '');

            container.innerHTML = items.map(item => `
                <div class="product-card">
                    <div class="product-image">
                        ${item.emoji}
                        <span class="product-badge">-${item.discount}%</span>
                        <button class="wishlist-btn" onclick="removeFromWishlist(${item.id})">♥</button>
                    </div>
                    <div class="product-info">
                        <p class="product-title">${item.name}</p>
                        <div class="product-rating">
                            <span>★★★★★</span> <span>(${item.reviews})</span>
                        </div>
                        <div class="product-price">
                            <span class="price">₹${item.price.toLocaleString()}</span>
                            <span class="original-price">₹${item.originalPrice.toLocaleString()}</span>
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary" onclick="addToCart(${item.id})">Add to Cart</button>
                            <button class="btn btn-secondary" onclick="viewProduct(${item.id})">View</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function removeFromWishlist(itemId) {
            currentItems = currentItems.filter(item => item.id !== itemId);
            renderWishlist(currentItems);
        }

        function addToCart(itemId) {
            const item = wishlistItems.find(i => i.id === itemId);
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            
            const cartItem = {
                id: item.id,
                title: item.name,
                price: item.price,
                quantity: 1,
                emoji: item.emoji
            };

            const existing = cartItems.find(i => i.id === cartItem.id);
            if (existing) {
                existing.quantity += 1;
            } else {
                cartItems.push(cartItem);
            }

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            alert('✓ Added to cart!');
        }

        function viewProduct(itemId) {
            alert(`Viewing product ${itemId}`);
            window.location.href = 'product-detail.html?id=' + itemId;
        }

        function sortWishlist(sortBy) {
            let sorted = [...currentItems];

            switch(sortBy) {
                case 'price-low':
                    sorted.sort((a, b) => a.price - b.price);
                    break;
                case 'price-high':
                    sorted.sort((a, b) => b.price - a.price);
                    break;
                case 'discount':
                    sorted.sort((a, b) => b.discount - a.discount);
                    break;
                case 'rating':
                    sorted.sort((a, b) => b.rating - a.rating);
                    break;
                case 'recent':
                default:
                    sorted = [...currentItems];
            }

            currentItems = sorted;
            renderWishlist(currentItems);
        }

        function toggleView(view, element) {
            currentView = view;
            const grid = document.getElementById('wishlistGrid');
            
            document.querySelectorAll('.view-btn').forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');

            if (view === 'list') {
                grid.classList.add('list-view');
            } else {
                grid.classList.remove('list-view');
            }
        }

        function shareWishlist() {
            const shareText = `Check out my wishlist on emox! ${window.location.href}`;
            if (navigator.share) {
                navigator.share({
                    title: 'My Wishlist',
                    text: 'Check out my wishlist',
                    url: window.location.href
                });
            } else {
                alert('Wishlist link copied to clipboard!');
            }
        }

        function addAllToCart() {
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            
            currentItems.forEach(item => {
                const cartItem = {
                    id: item.id,
                    title: item.name,
                    price: item.price,
                    quantity: 1,
                    emoji: item.emoji
                };

                const existing = cartItems.find(i => i.id === cartItem.id);
                if (existing) {
                    existing.quantity += 1;
                } else {
                    cartItems.push(cartItem);
                }
            });

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            alert(`✓ Added ${currentItems.length} item(s) to cart!`);
        }

        function clearWishlist() {
            if (confirm('Are you sure you want to clear your entire wishlist?')) {
                currentItems = [];
                renderWishlist(currentItems);
                alert('Wishlist cleared!');
            }
        }

        // Initialize
        window.addEventListener('load', () => {
            renderWishlist(currentItems);
        });
    </script>
</body>
</html>

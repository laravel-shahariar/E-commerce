@extends("template.basic")
@section("title", "Wishlist")
@section("style")
<style>
.wishlist-count {
    background-color: var(--light-gray);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
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

.list-view .product-image {
    width: 150px;
            height: 150px;
            flex-shrink: 0;
            font-size: 40px;
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

.list-view .product-info {
    padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
}

.list-view .product-title {
    font-size: 16px;
            -webkit-line-clamp: unset;
}

.list-view .price {
    font-size: 18px;
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
}
</style>
@endsection

@section("content")
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
@endsection

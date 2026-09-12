@extends('template.basic')
@section('title', 'Product Details')
@section('style')
<style>
    /* Breadcrumb */
    .breadcrumb {
        background-color: var(--white);
        padding: 15px 40px;
        border-bottom: 1px solid var(--border-color);
        font-size: 14px;
    }

    .breadcrumb a {
        color: var(--primary-color);
        text-decoration: none;
        margin: 0 5px;
    }

    .breadcrumb span {
        color: var(--text-light);
    }

    /* Product Section */
    .product-section {
        background-color: var(--white);
        border-radius: 8px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .product-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }

    /* Product Images */
    .product-images {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .main-image {
        width: 100%;
        height: 400px;
        background-color: var(--light-gray);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 150px;
        border: 2px solid var(--border-color);
        position: relative;
    }

    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--danger-color);
        color: var(--white);
        padding: 8px 15px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
    }

    .thumbnail-gallery {
        display: flex;
        gap: 10px;
        overflow-x: auto;
    }

    .thumbnail {
        width: 80px;
        height: 80px;
        background-color: var(--light-gray);
        border-radius: 4px;
        cursor: pointer;
        border: 2px solid transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        transition: all 0.3s ease;
    }

    .thumbnail:hover,
    .thumbnail.active {
        border-color: var(--primary-color);
    }

    /* Product Info */
    .product-info {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .product-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-dark);
    }

    .product-rating {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .stars {
        display: flex;
        gap: 3px;
        font-size: 18px;
    }

    .rating-text {
        font-size: 14px;
        color: var(--text-light);
    }

    .rating-badge {
        background-color: var(--success-color);
        color: var(--white);
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .price-section {
        border: 2px solid var(--border-color);
        border-radius: 8px;
        padding: 20px;
        background-color: var(--light-gray);
    }

    .price-display {
        display: flex;
        gap: 15px;
        align-items: center;
        margin-bottom: 10px;
    }

    .current-price {
        font-size: 32px;
        font-weight: 700;
        color: var(--text-dark);
    }

    .original-price {
        font-size: 24px;
        text-decoration: line-through;
        color: var(--text-light);
    }

    .discount-badge {
        background-color: var(--danger-color);
        color: var(--white);
        padding: 8px 12px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
    }

    .price-note {
        font-size: 12px;
        color: var(--text-light);
    }

    .availability {
        display: flex;
        gap: 10px;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .stock-status {
        display: inline-block;
        padding: 5px 12px;
        background-color: #e8f5e9;
        color: #2e7d32;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .delivery-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .delivery-item {
        display: flex;
        gap: 10px;
        font-size: 14px;
    }

    .delivery-icon {
        font-size: 20px;
    }

    .quantity-selector {
        display: flex;
        gap: 10px;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .quantity-label {
        font-size: 14px;
        font-weight: 600;
    }

    .qty-btn {
        width: 40px;
        height: 40px;
        border: none;
        background-color: var(--light-gray);
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .qty-input {
        width: 50px;
        text-align: center;
        border: none;
        font-size: 14px;
        font-weight: 600;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        padding: 15px 0;
    }

    .btn {
        flex: 1;
        padding: 15px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary {
        background-color: var(--light-gray);
        color: var(--text-dark);
        border: 2px solid var(--border-color);
    }

    .btn-wishlist {
        padding: 15px 20px;
        background-color: var(--light-gray);
        color: var(--danger-color);
        border: 2px solid var(--border-color);
        font-size: 20px;
    }

    /* Product Details Tabs */
    .tabs {
        margin-top: 40px;
        border-bottom: 2px solid var(--border-color);
    }

    .tab-buttons {
        display: flex;
        gap: 30px;
    }

    .tab-btn {
        padding: 15px 0;
        border: none;
        background: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        color: var(--text-light);
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .tab-btn.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
    }

    .tab-btn:hover {
        color: var(--text-dark);
    }

    .tab-content {
        display: none;
        padding: 30px 0;
    }

    .tab-content.active {
        display: block;
    }

    .specifications-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .spec-item {
        display: flex;
        gap: 15px;
        padding: 15px;
        background-color: var(--light-gray);
        border-radius: 4px;
    }

    .spec-label {
        font-weight: 600;
        color: var(--text-dark);
        min-width: 150px;
    }

    .spec-value {
        color: var(--text-light);
    }

    .review-item {
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 10px;
    }

    .reviewer-name {
        font-weight: 600;
        color: var(--text-dark);
    }

    .review-date {
        font-size: 12px;
        color: var(--text-light);
    }

    .review-stars {
        color: var(--warning-color);
        font-size: 14px;
        margin-bottom: 10px;
    }

    .review-text {
        color: var(--text-dark);
        font-size: 14px;
        line-height: 1.6;
    }

    /* Related Products */
    .related-section {
        background-color: var(--white);
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .related-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .product-card {
        background-color: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-image-small {
        width: 100%;
        height: 150px;
        background-color: var(--light-gray);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
    }

    .product-info-small {
        padding: 15px;
    }

    .product-title-small {
        font-size: 13px;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-price-small {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-dark);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-layout {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .main-image {
            height: 300px;
            font-size: 100px;
        }

        .specifications-grid {
            grid-template-columns: 1fr;
        }

        .delivery-info {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="index.html">Home</a>
        <span>/</span>
        <a href="#">Electronics</a>
        <span>/</span>
        <span>Samsung Galaxy S24 Ultra</span>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Product Section -->
        <div class="product-section">
            <div class="product-layout">
                <!-- Product Images -->
                <div class="product-images">
                    <div class="main-image" id="mainImage">
                        📱
                        <span class="product-badge">-20%</span>
                    </div>
                    <div class="thumbnail-gallery">
                        <div class="thumbnail active" onclick="changeThumbnail(this)">📱</div>
                        <div class="thumbnail" onclick="changeThumbnail(this)">📸</div>
                        <div class="thumbnail" onclick="changeThumbnail(this)">⚙️</div>
                        <div class="thumbnail" onclick="changeThumbnail(this)">🔋</div>
                        <div class="thumbnail" onclick="changeThumbnail(this)">💾</div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="product-info">
                    <h1 class="product-title">Samsung Galaxy S24 Ultra</h1>

                    <div class="product-rating">
                        <div class="stars">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <span class="rating-text">4.8 (2,345 reviews)</span>
                        <span class="rating-badge">Best Seller</span>
                    </div>

                    <div class="price-section">
                        <div class="price-display">
                            <span class="current-price">₹79,999</span>
                            <span class="original-price">₹99,999</span>
                            <span class="discount-badge">Save 20%</span>
                        </div>
                        <div class="price-note">Inclusive of all taxes | Free Shipping</div>
                    </div>

                    <div class="availability">
                        <span class="stock-status">✓ In Stock</span>
                        <span style="color: var(--text-light); font-size: 14px;">Only 5 left in stock</span>
                    </div>

                    <div class="delivery-info">
                        <div class="delivery-item">
                            <span class="delivery-icon">🚚</span>
                            <div>
                                <div style="font-weight: 600;">Free Delivery</div>
                                <div style="font-size: 12px; color: var(--text-light);">Expected by Oct 12</div>
                            </div>
                        </div>
                        <div class="delivery-item">
                            <span class="delivery-icon">↩️</span>
                            <div>
                                <div style="font-weight: 600;">Easy Return</div>
                                <div style="font-size: 12px; color: var(--text-light);">7 days return policy</div>
                            </div>
                        </div>
                    </div>

                    <div class="quantity-selector">
                        <span class="quantity-label">Quantity:</span>
                        <div class="quantity-control">
                            <button class="qty-btn" onclick="decreaseQty()">−</button>
                            <input type="number" class="qty-input" id="quantity" value="1" min="1" max="10">
                            <button class="qty-btn" onclick="increaseQty()">+</button>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="btn btn-primary" onclick="addToCart()">Add to Cart</button>
                        <button class="btn btn-secondary" onclick="buyNow()">Buy Now</button>
                        <button class="btn btn-wishlist" onclick="addToWishlist()">♡</button>
                    </div>

                    <div style="padding: 15px; background-color: #e3f2fd; border-radius: 4px; font-size: 13px; color: var(--text-dark);">
                        <strong>Secure Transaction:</strong> Your payment information is encrypted and secure with us.
                    </div>
                </div>
            </div>

            <!-- Tabs Section -->
            <div class="tabs">
                <div class="tab-buttons">
                    <button class="tab-btn active" onclick="openTab(event, 'description')">Description</button>
                    <button class="tab-btn" onclick="openTab(event, 'specifications')">Specifications</button>
                    <button class="tab-btn" onclick="openTab(event, 'reviews')">Reviews</button>
                </div>

                <!-- Description Tab -->
                <div id="description" class="tab-content active">
                    <h3 style="margin-bottom: 15px;">Product Description</h3>
                    <p style="margin-bottom: 15px; line-height: 1.8;">
                        The Samsung Galaxy S24 Ultra is a flagship smartphone featuring cutting-edge technology and premium build quality. 
                        With its advanced camera system, powerful processor, and stunning display, this device offers an unparalleled 
                        mobile experience for both professionals and enthusiasts.
                    </p>
                    <h4 style="margin: 20px 0 10px 0;">Key Features:</h4>
                    <ul style="margin-left: 20px; line-height: 2;">
                        <li>6.8" Dynamic AMOLED 2X Display with 120Hz refresh rate</li>
                        <li>Snapdragon 8 Gen 3 Processor</li>
                        <li>12GB/16GB RAM with 256GB/512GB/1TB Storage</li>
                        <li>50MP Main Camera with Advanced AI Processing</li>
                        <li>5000mAh Battery with 45W Fast Charging</li>
                        <li>IP68 Water and Dust Resistance</li>
                        <li>One UI 6 Operating System</li>
                    </ul>
                </div>

                <!-- Specifications Tab -->
                <div id="specifications" class="tab-content">
                    <h3 style="margin-bottom: 15px;">Technical Specifications</h3>
                    <div class="specifications-grid">
                        <div class="spec-item">
                            <span class="spec-label">Display:</span>
                            <span class="spec-value">6.8" Dynamic AMOLED 2X, 1440 x 3120 px</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Processor:</span>
                            <span class="spec-value">Snapdragon 8 Gen 3 Leading Version</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">RAM:</span>
                            <span class="spec-value">12GB / 16GB</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Storage:</span>
                            <span class="spec-value">256GB / 512GB / 1TB</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Main Camera:</span>
                            <span class="spec-value">50MP f/1.8, OIS</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Front Camera:</span>
                            <span class="spec-value">12MP f/2.2</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Battery:</span>
                            <span class="spec-value">5000mAh</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Charging:</span>
                            <span class="spec-value">45W Wired + 15W Wireless</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Operating System:</span>
                            <span class="spec-value">One UI 6 (Android 14)</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Water Resistance:</span>
                            <span class="spec-value">IP68 Rating</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Weight:</span>
                            <span class="spec-value">218g</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Dimensions:</span>
                            <span class="spec-value">162.8 x 77.9 x 8.6 mm</span>
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div id="reviews" class="tab-content">
                    <h3 style="margin-bottom: 15px;">Customer Reviews</h3>
                    
                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name">John Doe</span>
                            <span class="review-date">2 days ago</span>
                        </div>
                        <div class="review-stars">★★★★★</div>
                        <div class="review-text">
                            Amazing phone! The display is absolutely stunning and the camera quality is incredible. 
                            Battery life easily lasts the whole day. Highly recommended!
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name">Sarah Smith</span>
                            <span class="review-date">1 week ago</span>
                        </div>
                        <div class="review-stars">★★★★☆</div>
                        <div class="review-text">
                            Great phone overall. The only minor issue is that it doesn't come with a charger in the box. 
                            Otherwise, excellent performance and build quality.
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name">Mike Johnson</span>
                            <span class="review-date">2 weeks ago</span>
                        </div>
                        <div class="review-stars">★★★★★</div>
                        <div class="review-text">
                            Worth every penny! The processing power is incredible for gaming and multitasking. 
                            The 120Hz display makes everything feel incredibly smooth.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="related-section">
            <h2 class="related-title">Related Products You Might Like</h2>
            <div class="products-grid">
                <div class="product-card" onclick="window.location.href='product-detail.html'">
                    <div class="product-image-small">📱</div>
                    <div class="product-info-small">
                        <div class="product-title-small">Apple iPhone 15 Pro Max</div>
                        <div class="product-price-small">₹139,999</div>
                    </div>
                </div>
                <div class="product-card" onclick="window.location.href='product-detail.html'">
                    <div class="product-image-small">📱</div>
                    <div class="product-info-small">
                        <div class="product-title-small">Google Pixel 8 Pro</div>
                        <div class="product-price-small">₹79,999</div>
                    </div>
                </div>
                <div class="product-card" onclick="window.location.href='product-detail.html'">
                    <div class="product-image-small">🎧</div>
                    <div class="product-info-small">
                        <div class="product-title-small">Samsung Galaxy Buds2</div>
                        <div class="product-price-small">₹12,999</div>
                    </div>
                </div>
                <div class="product-card" onclick="window.location.href='product-detail.html'">
                    <div class="product-image-small">⌨️</div>
                    <div class="product-info-small">
                        <div class="product-title-small">Samsung Galaxy Tab S9</div>
                        <div class="product-price-small">₹54,999</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Quantity controls
        function increaseQty() {
            const input = document.getElementById('quantity');
            input.value = Math.min(parseInt(input.value) + 1, 10);
        }

        function decreaseQty() {
            const input = document.getElementById('quantity');
            input.value = Math.max(parseInt(input.value) - 1, 1);
        }

        // Thumbnail gallery
        function changeThumbnail(element) {
            document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
            element.classList.add('active');
            document.getElementById('mainImage').textContent = element.textContent;
        }

        // Tab functionality
        function openTab(event, tabName) {
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(tab => tab.classList.remove('active'));
            
            const tabBtns = document.querySelectorAll('.tab-btn');
            tabBtns.forEach(btn => btn.classList.remove('active'));

            document.getElementById(tabName).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        // Cart functionality
        function addToCart() {
            const quantity = document.getElementById('quantity').value;
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            
            const item = {
                id: 1,
                title: 'Samsung Galaxy S24 Ultra',
                price: 79999,
                quantity: parseInt(quantity),
                emoji: '📱'
            };

            const existing = cartItems.find(i => i.id === item.id);
            if (existing) {
                existing.quantity += item.quantity;
            } else {
                cartItems.push(item);
            }

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            alert(`✓ Added ${quantity} item(s) to cart!`);
        }

        function buyNow() {
            addToCart();
            setTimeout(() => {
                window.location.href = 'checkout.html';
            }, 500);
        }

        function addToWishlist() {
            alert('♡ Added to Wishlist!');
        }
    </script>
@endsection

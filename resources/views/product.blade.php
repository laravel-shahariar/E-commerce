@extends('template.basic')
@php
    $product = \App\Models\product::find($product_id);
@endphp
@section('title', $product ? $product->name . ' - Product Details' : 'Product Details')
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
.main-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 2px;
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
    @if(!$product)
        <div class="container" style="padding: 80px 20px; text-align: center;">
            <h2 style="font-size: 28px; margin-bottom: 15px;">Product Not Found</h2>
            <p style="color: var(--text-light); margin-bottom: 25px;">The product could not be found.</p>
            <a href="{{ url('/') }}" class="btn btn-primary" style="display: inline-block; padding: 12px 25px; text-decoration: none;">Back to Home</a>
        </div>
    @else
        @php
            $discountPercent = 0;
            if ($product->discount_price && $product->price > 0 && $product->discount_price < $product->price) {
                $discountPercent = round((($product->price - $product->discount_price) / $product->price) * 100);
            }
            $mainImgUrl = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('/photo/' . ltrim(str_replace('photo/', '', $product->image), '/'))) : asset('/photo/p1.jpg');
        @endphp

        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <a href="#">{{ $product->category->name ?? 'Products' }}</a>
            <span>/</span>
            <span>{{ $product->name }}</span>
        </div>

        <!-- Main Container -->
        <div class="container">
            <!-- Product Section -->
            <div class="product-section">
                <div class="product-layout">
                    <!-- Product Images -->
                    <div class="product-images">
                        <div class="overflow-hidden main-image" id="mainImage">
                            <img src="{{ $mainImgUrl }}" alt="{{ $product->name }}" id="mainProductImg">
                            @if($discountPercent > 0)
                                <span class="product-badge">-{{ $discountPercent }}%</span>
                            @endif
                        </div>
                        <div class="thumbnail-gallery">
                            @if(!empty($product->images) && is_array($product->images))
                                @foreach($product->images as $img)
                                    @php
                                        $imgUrl = str_starts_with($img, 'http') ? $img : asset('/photo/' . ltrim(str_replace('photo/', '', $img), '/'));
                                    @endphp
                                    <div class="thumbnail {{ $loop->first ? 'active' : '' }}" onclick="changeThumbnailImage(this, '{{ $imgUrl }}')">
                                        <img src="{{ $imgUrl }}" alt="">
                                    </div>
                                @endforeach
                            @else
                                <div class="thumbnail active" onclick="changeThumbnailImage(this, '{{ $mainImgUrl }}')">
                                    <img src="{{ $mainImgUrl }}" alt="">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="product-info">
                        <h1 class="product-title">{{ $product->name }}</h1>

                        <div class="product-rating">
                            <div class="stars">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                            </div>
                            <span class="rating-text">4.8 ({{ $product->views ?? 0 }} views | {{ $product->sold_count ?? 0 }} sold)</span>
                            @if($product->sold_count > 10)
                                <span class="rating-badge">Best Seller</span>
                            @endif
                        </div>

                        <div class="price-section">
                            <div class="price-display">
                                @if($product->discount_price && $product->discount_price < $product->price)
                                    <span class="current-price">₹{{ number_format($product->discount_price, 2) }}</span>
                                    <span class="original-price">₹{{ number_format($product->price, 2) }}</span>
                                    <span class="discount-badge">Save {{ $discountPercent }}%</span>
                                @else
                                    <span class="current-price">₹{{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>
                            <div class="price-note">Inclusive of all taxes | Free Shipping</div>
                        </div>

                        <div class="availability">
                            @if($product->stock > 0)
                                <span class="stock-status">✓ In Stock</span>
                                <span style="color: var(--text-light); font-size: 14px;">Only {{ $product->stock }} left in stock</span>
                            @else
                                <span class="stock-status" style="color: var(--danger-color);">✕ Out of Stock</span>
                            @endif
                        </div>

                        <div class="delivery-info">
                            <div class="delivery-item">
                                <span class="delivery-icon">🚚</span>
                                <div>
                                    <div style="font-weight: 600;">Free Delivery</div>
                                    <div style="font-size: 12px; color: var(--text-light);">Expected within 2-4 days</div>
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
                                <input type="number" class="qty-input" id="quantity" value="1" min="1" max="{{ max(1, $product->stock) }}">
                                <button class="qty-btn" onclick="increaseQty()">+</button>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-primary" onclick="addToCart()" {{ $product->stock <= 0 ? 'disabled' : '' }}>Add to Cart</button>
                            <button class="btn btn-secondary" onclick="buyNow()" {{ $product->stock <= 0 ? 'disabled' : '' }}>Buy Now</button>
                            <button class="btn btn-wishlist" onclick="addToWishlist()">♡</button>
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
                            {!! nl2br(e($product->description ?? 'No description available for this product.')) !!}
                        </p>
                    </div>

                    <!-- Specifications Tab -->
                    <div id="specifications" class="tab-content">
                        <h3 style="margin-bottom: 15px;">Technical Specifications</h3>
                        <div class="specifications-grid">
                            <div class="spec-item">
                                <span class="spec-label">Product Name:</span>
                                <span class="spec-value">{{ $product->name }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Category:</span>
                                <span class="spec-value">{{ $product->category->name ?? 'General' }}</span>
                            </div>
                            @if($product->brand)
                            <div class="spec-item">
                                <span class="spec-label">Brand:</span>
                                <span class="spec-value">{{ $product->brand->name }}</span>
                            </div>
                            @endif
                            @if($product->size)
                            <div class="spec-item">
                                <span class="spec-label">Size:</span>
                                <span class="spec-value">{{ $product->size->name ?? $product->size->size ?? 'N/A' }}</span>
                            </div>
                            @endif
                            <div class="spec-item">
                                <span class="spec-label">Stock Status:</span>
                                <span class="spec-value">{{ $product->stock > 0 ? $product->stock . ' units available' : 'Out of Stock' }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Status:</span>
                                <span class="spec-value">{{ ucfirst($product->status ?? 'active') }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Total Views:</span>
                                <span class="spec-value">{{ $product->views ?? 0 }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Items Sold:</span>
                                <span class="spec-value">{{ $product->sold_count ?? 0 }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Tab -->
                    <div id="reviews" class="tab-content">
                        <h3 style="margin-bottom: 15px;">Customer Reviews</h3>
                        
                        <div class="review-item">
                            <div class="review-header">
                                <span class="reviewer-name">Verified Buyer</span>
                                <span class="review-date">Recent</span>
                            </div>
                            <div class="review-stars">★★★★★</div>
                            <div class="review-text">
                                Great product quality, matches the description completely. Fast shipping and smooth checkout experience!
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @php
                $relatedProducts = \App\Models\product::where('id', '!=', $product->id)->when($product->category_id, function($query) use ($product) {
                        return $query->where('category_id', $product->category_id);
                    })
                    ->take(4)
                    ->get();
                if ($relatedProducts->isEmpty()) {
                    $relatedProducts = \App\Models\product::where('id', '!=', $product->id)->take(4)->get();
                }
            @endphp
            @if($relatedProducts->count() > 0)
            <div class="related-section">
                <h2 class="related-title">Related Products You Might Like</h2>
                <div class="products-grid">
                    @foreach($relatedProducts as $rel)
                        @php
                            $relImg = $rel->image ? (str_starts_with($rel->image, 'http') ? $rel->image : asset('/photo/' . ltrim(str_replace('photo/', '', $rel->image), '/'))) : asset('/photo/p1.jpg');
                        @endphp
                        <div class="product-card" onclick="window.location.href='{{ url('/product/' . $rel->id) }}'">
                            <div class="product-image-small" style="padding: 10px;">
                                <img src="{{ $relImg }}" alt="{{ $rel->name }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="product-info-small">
                                <div class="product-title-small">{{ $rel->name }}</div>
                                <div class="product-price-small">₹{{ number_format($rel->discount_price ?? $rel->price, 2) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <script>
            // Quantity controls
            function increaseQty() {
                const input = document.getElementById('quantity');
                const max = parseInt(input.getAttribute('max')) || 10;
                input.value = Math.min(parseInt(input.value) + 1, max);
            }

            function decreaseQty() {
                const input = document.getElementById('quantity');
                input.value = Math.max(parseInt(input.value) - 1, 1);
            }

            // Thumbnail gallery
            function changeThumbnailImage(element, src) {
                document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
                element.classList.add('active');
                const mainImg = document.getElementById('mainProductImg');
                if (mainImg) {
                    mainImg.src = src;
                }
            }

            function changeThumbnail(element) {
                document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
                element.classList.add('active');
                const img = element.querySelector('img');
                const mainImg = document.getElementById('mainProductImg');
                if (img && mainImg) {
                    mainImg.src = img.src;
                }
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
                    id: {{ $product->id }},
                    title: @json($product->name),
                    price: {{ $product->discount_price ?? $product->price ?? 0 }},
                    quantity: parseInt(quantity),
                    image: @json($mainImgUrl)
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
                    window.location.href = '{{ url('/checkout') }}';
                }, 500);
            }

            function addToWishlist() {
                alert('♡ Added to Wishlist!');
            }
        </script>
    @endif
@endsection

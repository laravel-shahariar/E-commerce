<div class="product-card">
    <div class="product-image">
        <img src="{{ asset('photo/' . $photo) }}" alt="{{ $title }}">
        <span class="product-badge">-{{ $discount }}%</span>
    </div>
    <div class="product-info">
        <p class="product-title">{{ $title }}</p>
        <div class="product-rating">
            <span>★★★★★</span> <span>({{ $reviews }})</span>
        </div>
        <div class="product-price">
            <span class="price">₹{{ $price }}</span>
            @if($original_price)
                <span class="original-price">₹{{ $original_price }}</span>
            @endif
        </div>
    </div>
</div>
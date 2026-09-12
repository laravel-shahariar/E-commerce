<div class="product-card">
    <div class="product-image">
        <img src="{{ asset('/photo/' . $photo1) }}" alt="{{ $title1 }}">
        <span class="product-badge">-{{ $discount1 }}%</span>
    </div>
    <div class="product-info">
        <p class="product-title">{{ $title1 }}</p>
        <div class="product-rating">
            <span>★★★★★</span> <span>({{ $review1 }})</span>
        </div>
        <div class="product-price">
            <span class="price">₹{{ $price1 }}</span>
            @if($original_price1)
                <span class="original-price">₹{{ $original_price1 }}</span>
            @endif
        </div>
    </div>
</div>
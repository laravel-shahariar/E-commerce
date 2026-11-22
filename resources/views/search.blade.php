@extends('template.basic')
@section('title', 'Search Results')
@section('style')
<style>
    .search-results-header {
        margin-bottom: 25px;
    }

    .search-results-header h2 {
        font-size: 22px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .search-results-header p {
        font-size: 14px;
        color: var(--text-light);
    }

    .search-results-header .search-term {
        color: var(--primary-color);
        font-weight: 600;
    }

    .no-results {
        text-align: center;
        padding: 60px 20px;
    }

    .no-results .no-results-icon {
        font-size: 60px;
        margin-bottom: 15px;
    }

    .no-results h3 {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    .no-results p {
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    .no-results a {
        display: inline-block;
        padding: 10px 25px;
        background-color: var(--primary-color);
        color: var(--white);
        text-decoration: none;
        border-radius: 4px;
        font-weight: 600;
    }

    .no-results a:hover {
        opacity: 0.9;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="search-results-header">
            <h2>Search Results</h2>
            <p>
                @if(isset($query) && $query)
                    Showing {{ $products->count() }} result{{ $products->count() !== 1 ? 's' : '' }} for
                    "<span class="search-term">{{ $query }}</span>"
                @else
                    Please enter a search term
                @endif
            </p>
        </div>

        @if(isset($products) && $products->count() > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <x-preview
                        :link="url('/product/' . $product->id)"
                        :photo="$product->image"
                        :title="$product->name"
                        :discount="$product->discount_price ? round(($product->price - $product->discount_price) / $product->price * 100) : 0"
                        :review="$product->reviews ?? 0"
                        :price="$product->discount_price ?? $product->price"
                        :original_price="$product->discount_price ? $product->price : null"
                    />
                @endforeach
            </div>
        @else
            <div class="no-results">
                <div class="no-results-icon">🔍</div>
                <h3>No Products Found</h3>
                <p>We couldn't find any products matching your search. Try a different keyword.</p>
                <a href="/">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection


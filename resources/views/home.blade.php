@extends('template.basic')
@section('title', 'Home')
@section("style")
<style>
    /* Bootstrap Carousel Overrides */
    #homeCarousel {
        margin-bottom: 40px;
        border-radius: 8px;
        overflow: hidden;
    }

    #homeCarousel .carousel-inner {
        border-radius: 8px;
    }

    #homeCarousel .carousel-item {
        transition: transform 0.6s ease-in-out;
    }

    /* Multi-item: show 3 slides at once on desktop */
    #homeCarousel .carousel-item .carousel-row {
        display: flex;
        gap: 15px;
    }

    #homeCarousel .carousel-item .carousel-row .carousel-col {
        flex: 1;
        min-width: 0;
    }

    .carousel-slide-card {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        height: 280px;
    }

    .carousel-slide-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .carousel-slide-card .carousel-caption-custom {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px 25px;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.75));
        color: var(--white);
    }

    .carousel-slide-card .carousel-caption-custom h5 {
        font-size: 20px;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .carousel-slide-card .carousel-caption-custom p {
        font-size: 13px;
        margin-bottom: 12px;
        opacity: 0.9;
    }

    .carousel-slide-card .carousel-caption-custom .btn {
        font-size: 13px;
        padding: 6px 18px;
    }

    /* Bootstrap carousel controls styling */
    #homeCarousel .carousel-control-prev,
    #homeCarousel .carousel-control-next {
        width: 50px;
        height: 50px;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 4px;
        opacity: 1;
        transition: background-color 0.3s ease;
    }

    #homeCarousel .carousel-control-prev:hover,
    #homeCarousel .carousel-control-next:hover {
        background-color: rgba(0, 0, 0, 0.6);
    }

    #homeCarousel .carousel-control-prev {
        left: 10px;
    }

    #homeCarousel .carousel-control-next {
        right: 10px;
    }

    #homeCarousel .carousel-indicators {
        bottom: 10px;
    }

    #homeCarousel .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
        margin: 0 4px;
        transition: background-color 0.3s ease;
    }

    #homeCarousel .carousel-indicators .active {
        background-color: var(--white);
    }

    /* Responsive: show 1 photo on small devices */
    @media (max-width: 767px) {
        #homeCarousel .carousel-item .carousel-row .carousel-col {
            display: none;
        }

        #homeCarousel .carousel-item .carousel-row .carousel-col:first-child {
            display: block;
        }

        .carousel-slide-card {
            height: 220px;
        }
    }

    /* Featured Banners */
    .banners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .banner {
        border-radius: 8px;
        padding: 40px;
        color: var(--white);
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 200px;
        background-size: cover;
        background-position: center;
    }

    .banner h3 {
        font-size: 28px;
        margin-bottom: 15px;
    }

    .banner p {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .banner-1 {
        background: linear-gradient(135deg, rgba(200, 100, 200, 0.8), rgba(100, 50, 150, 0.8)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text x="50" y="50" dominant-baseline="middle" text-anchor="middle" font-size="60">🥬</text></svg>');
    }

    .banner-2 {
        background: linear-gradient(135deg, rgba(0, 100, 200, 0.8), rgba(50, 150, 200, 0.8)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text x="50" y="50" dominant-baseline="middle" text-anchor="middle" font-size="60">📱</text></svg>');
    }

    .banner-3 {
        background: linear-gradient(135deg, rgba(200, 0, 0, 0.8), rgba(150, 50, 0, 0.8)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text x="50" y="50" dominant-baseline="middle" text-anchor="middle" font-size="60">🛍️</text></svg>');
    }

    /* Responsive */
    @media (max-width: 768px) {
        .carousel-slide-card {
            height: 200px;
        }

        .carousel-slide-card .carousel-caption-custom h5 {
            font-size: 16px;
        }
    }
</style>
@endsection

@section('navigation')                   
<!-- Navigation -->
<nav class="nav-categories">
    <a href="/category/all" class="active">All Categories</a>
    <a href="/category/electronics">Electronics</a>
    <a href="/category/fashion">Fashion</a>
    <a href="/category/home-decor">Home & Decor</a>
    <a href="/category/health-beauty">Health & Beauty</a>
    <a href="/category/sports">Sports</a>
    <a href="/category/books">Books</a>
    <a href="/category/pharmacy">Pharmacy</a>
    <a href="/category/groceries">Groceries</a>
    <a href="/category/luxury-items">Luxury Items</a>
</nav>
@endsection

@section('content')
    <!-- Main Container -->
    <div class="container">
        <!-- Carousel -->
        <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <!-- Slide 1: shows 3 photos -->
                <div class="carousel-item active">
                    <div class="carousel-row">
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p4.jpg" alt="iPhone 16 Pro Max">
                                <div class="carousel-caption-custom">
                                    <h5>iPhone 16 Pro Max</h5>
                                    <p>From $50,769* &mdash; All-day battery. Supersmart.</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p1.jpg" alt="Trending Fashion">
                                <div class="carousel-caption-custom">
                                    <h5>Trending Fashion</h5>
                                    <p>Up to 40% off on latest styles</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p3.jpg" alt="Home Essentials">
                                <div class="carousel-caption-custom">
                                    <h5>Home Essentials</h5>
                                    <p>Premium quality at best prices</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: shows 3 photos -->
                <div class="carousel-item">
                    <div class="carousel-row">
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p2.jpg" alt="Summer Collection">
                                <div class="carousel-caption-custom">
                                    <h5>Summer Collection</h5>
                                    <p>Cool styles for hot days</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p5.jpg" alt="Gadget Deals">
                                <div class="carousel-caption-custom">
                                    <h5>Gadget Deals</h5>
                                    <p>Top electronics at unbeatable prices</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p6.jpg" alt="New Arrivals">
                                <div class="carousel-caption-custom">
                                    <h5>New Arrivals</h5>
                                    <p>Fresh picks just for you</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: shows 3 photos -->
                <div class="carousel-item">
                    <div class="carousel-row">
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p3.jpg" alt="Best Sellers">
                                <div class="carousel-caption-custom">
                                    <h5>Best Sellers</h5>
                                    <p>Most loved products this month</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p4.jpg" alt="Flash Sale">
                                <div class="carousel-caption-custom">
                                    <h5>Flash Sale</h5>
                                    <p>Limited time offers — hurry!</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-col">
                            <div class="carousel-slide-card">
                                <img src="/photo/p1.jpg" alt="Exclusive Deals">
                                <div class="carousel-caption-custom">
                                    <h5>Exclusive Deals</h5>
                                    <p>Members-only discounts await</p>
                                    <a href="#" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Explore Categories -->
        <div class="section-header">
            <h3>Explore Popular Categories</h3>
            <a href="/category/all" class="view-all">View All ></a>
        </div>
        <div class="categories-grid">
            <a class="category-card" href="/category/electronics">
                <div class="category-icon">🎧</div>
                <p>Electronics</p>
            </a>
            <a class="category-card" href="/category/fashion">
                <div class="category-icon">👗</div>
                <p>Fashion</p>
            </a>
            <a class="category-card" href="/category/luxury">
                <div class="category-icon">💄</div>
                <p>Luxury</p>
            </a>
            <a class="category-card" href="/category/home-decor">
                <div class="category-icon">🪑</div>
                <p>Home Decor</p>
            </a>
            <a class="category-card" href="/category/health-beauty">
                <div class="category-icon">💊</div>
                <p>Health & Beauty</p>
            </a>
            <a class="category-card" href="/category/groceries">
                <div class="category-icon">🍎</div>
                <p>Groceries</p>
            </a>
            <a class="category-card" href="/category/sneakers">
                <div class="category-icon">👟</div>
                <p>Sneakers</p>
            </a>
        </div>

        <!-- Today's Best Deals -->
        <div class="section-header">
            <h3>Todays Best Deals For You!</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="products-grid" id="productsGrid">
            <x-preview link="/product/1" photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview link="/product/2" photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview link="/product/3" photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview link="/product/4" photo="p6.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
            <x-preview link="/product/5" photo="p5.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
        </div>

        <!-- Featured Banners -->
        <div class="banners-grid">
            <div class="banner banner-1">
                <h3>Fresh & Healthy Vegetables</h3>
                <p>Get up to 50% off on organic produce</p>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="banner banner-2">
                <h3>Samsung Galaxy S24 FE</h3>
                <p>Experience AI at home</p>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="banner banner-3">
                <h3>Special Offers</h3>
                <p>Top deals from the best brands</p>
                <a href="#" class="btn">Shop Now</a>
            </div>
        </div>

        <!-- Winter Wear Sale -->
        <div class="section-header">
            <h3>60% Off Or More On Winter-Wear</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="products-grid" id="winterWearGrid">
            <x-preview link="/product/1" photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview link="/product/2" photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview link="/product/3" photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview link="/product/4" photo="p4.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
            <x-preview link="/product/5" photo="p5.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
        </div>

        <!-- Top Deals Electronics -->
        <div class="section-header">
            <h3>Top Deals in Electronics</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="products-grid" id="electronicsGrid">
            <x-preview link="/product/6" photo="p6.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
            <x-preview link="/product/1" photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview link="/product/2" photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview link="/product/3" photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview link="/product/4" photo="p4.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
        </div>

        <!-- Best Sellers Beauty & Health -->
        <div class="section-header">
            <h3>Best Sellers in Beauty & Health</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="products-grid" id="beautyHealthGrid">
            <x-preview link="/product/1" photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview link="/product/2" photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview link="/product/3" photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview link="/product/4" photo="p4.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
            <x-preview link="/product/5" photo="p5.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
        </div>
    </div>

    <script>
        // Search functionality
        document.querySelector('.search-bar button').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-bar input').value;
            if (searchTerm) {
                //
            }
        });

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
            });
        });
    </script>
@endsection
    
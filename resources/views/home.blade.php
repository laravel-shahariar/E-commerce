@extends('template.basic')
@section('title', 'Home')

@section("style")
<style>
    /* Navigation Categories */
    .nav-categories {
        display: flex;
        gap: 30px;
        padding: 15px 40px;
        overflow-x: auto;
        border-bottom: 1px solid var(--border-color);
    }

    .nav-categories a {
        text-decoration: none;
        color: var(--text-dark);
        font-size: 14px;
        white-space: nowrap;
        padding-bottom: 5px;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .nav-categories a:hover,
    .nav-categories a.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
    }

    /* Carousel */
    .carousel {
        position: relative;
        margin-bottom: 40px;
        border-radius: 8px;
        overflow: hidden;
    }

    .carousel-container {
        display: flex;
        transition: transform 0.5s ease-in-out;
        border-radius: 8px;
    }

    .carousel-item {
        min-width: 100%;
        display: flex;
        gap: 20px;
    }

    .carousel-slide {
        flex: 1;
        /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
        padding: 40px;
        border-radius: 8px;
        color: var(--white);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .carousel-slide:nth-child(1) {
        background: url("/photo/p4.jpg");
    }

    .carousel-slide:nth-child(2) {
        background: url("/photo/p1.jpg");
    }

    .carousel-slide:nth-child(3) {
        background: url("/photo/p3.jpg");
    }

    .carousel-slide h2 {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .carousel-slide p {
        margin-bottom: 20px;
        font-size: 14px;
    }

    .carousel-slide .btn {
        align-self: flex-start;
    }

    .carousel-controls {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
    }

    .carousel-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .carousel-dot.active {
        background-color: var(--white);
    }

    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background-color: rgba(0, 0, 0, 0.3);
        border: none;
        color: var(--white);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        transition: background-color 0.3s ease;
    }

    .carousel-nav:hover {
        background-color: rgba(0, 0, 0, 0.6);
    }

    .carousel-nav.prev {
        left: 10px;
    }

    .carousel-nav.next {
        right: 10px;
    }

    /* Section Header */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .section-header h3 {
        font-size: 20px;
        color: var(--text-dark);
    }

    .view-all {
        text-decoration: none;
        color: var(--primary-color);
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .view-all:hover {
        color: var(--secondary-color);
    }

    /* Category Grid */
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .category-card {
        text-align: center;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-icon {
        width: 100px;
        height: 100px;
        background-color: var(--light-gray);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        margin: 0 auto 10px;
    }

    .category-card p {
        font-size: 14px;
        color: var(--text-dark);
    }

    /* Product Grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
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
        overflow: hidden;
    }

    .product-title {
        font-size: 14px;
        color: var(--text-dark);
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
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

    /* Button */
    .btn {
        display: inline-block;
        padding: 10px 25px;
        background-color: var(--primary-color);
        color: var(--white);
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0052a3;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .nav-categories {
            padding: 10px 20px;
            gap: 15px;
        }

        .carousel-slide {
            padding: 20px;
        }

        .carousel-slide h2 {
            font-size: 20px;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }

        .container {
            padding: 10px;
        }
    }

    @media (max-width: 480px) {
        .logo {
            font-size: 18px;
        }

        .header-right {
            gap: 10px;
        }

        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .categories-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>
@endsection

@section('navigation')                   
<!-- Navigation -->
<nav class="nav-categories">
    <a href="#" class="active">All Categories</a>
    <a href="#">Electronics</a>
    <a href="#">Fashion</a>
    <a href="#">Home & Decor</a>
    <a href="#">Health & Beauty</a>
    <a href="#">Sports</a>
    <a href="#">Books</a>
    <a href="#">Pharmacy</a>
    <a href="#">Groceries</a>
    <a href="#">Luxury Items</a>
</nav>
@endsection

@section('content')
    <!-- Main Container -->
    <div class="container">
        <!-- Carousel -->
        <div class="carousel">
            <div class="carousel-container" id="carouselContainer">
                <div class="carousel-item">
                    <div class="carousel-slide">
                        <h2>iPhone 16 Pro Max</h2>
                        <p>From $50,769*</p>
                        <p>All-day, all-night battery. Supersmart. Impossibly thin.</p>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                    <div class="carousel-slide"></div>
                </div>
            </div>
            <button class="carousel-nav prev" onclick="moveCarousel(-1)">❮</button>
            <button class="carousel-nav next" onclick="moveCarousel(1)">❯</button>
            <div class="carousel-controls">
                <span class="carousel-dot active" onclick="currentSlide(0)"></span>
                <span class="carousel-dot" onclick="currentSlide(1)"></span>
                <span class="carousel-dot" onclick="currentSlide(2)"></span>
            </div>
        </div>

        <!-- Explore Categories -->
        <div class="section-header">
            <h3>Explore Popular Categories</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="categories-grid">
            <div class="category-card">
                <div class="category-icon">🎧</div>
                <p>Electronics</p>
            </div>
            <div class="category-card">
                <div class="category-icon">👗</div>
                <p>Fashion</p>
            </div>
            <div class="category-card">
                <div class="category-icon">💄</div>
                <p>Luxury</p>
            </div>
            <div class="category-card">
                <div class="category-icon">🪑</div>
                <p>Home Decor</p>
            </div>
            <div class="category-card">
                <div class="category-icon">💊</div>
                <p>Health & Beauty</p>
            </div>
            <div class="category-card">
                <div class="category-icon">🍎</div>
                <p>Groceries</p>
            </div>
            <div class="category-card">
                <div class="category-icon">👟</div>
                <p>Sneakers</p>
            </div>
        </div>

        <!-- Today's Best Deals -->
        <div class="section-header">
            <h3>Todays Best Deals For You!</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="products-grid" id="productsGrid">
            <x-preview photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview photo="p4.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
            <x-preview photo="p5.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
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
            <x-preview photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview photo="p4.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
            <x-preview photo="p5.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
        </div>

        <!-- Top Deals Electronics -->
        <div class="section-header">
            <h3>Top Deals in Electronics</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="products-grid" id="electronicsGrid">
            <x-preview photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview photo="p4.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
            <x-preview photo="p5.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
        </div>

        <!-- Best Sellers Beauty & Health -->
        <div class="section-header">
            <h3>Best Sellers in Beauty & Health</h3>
            <a href="#" class="view-all">View All ></a>
        </div>
        <div class="products-grid" id="beautyHealthGrid">
            <x-preview photo="p1.jpg" title="This is p1 Photo" discount="10" review="3" price="555" />
            <x-preview photo="p2.jpg" title="This is p1 Photo" discount=15 review=32 price=725 original-price=999 />
            <x-preview photo="p3.jpg" title="This is p1 Photo" discount=19 review=32 price=880 original-price=1003 />
            <x-preview photo="p4.jpg" title="This is p1 Photo" discount=40 review=32 price=2093 original-price=3290 />
            <x-preview photo="p5.jpg" title="This is p1 Photo" discount=25 review=32 price=77 original-price=193 />
        </div>
    </div>

    <script>
        
        // Carousel functionality
        let currentSlideIndex = 0;

        function moveCarousel(direction) {
            currentSlideIndex = (currentSlideIndex + direction + 3) % 3;
            updateCarousel();
        }

        function currentSlide(index) {
            currentSlideIndex = index;
            updateCarousel();
        }

        function updateCarousel() {
            const dots = document.querySelectorAll('.carousel-dot');
            dots.forEach(dot => dot.classList.remove('active'));
            dots[currentSlideIndex].classList.add('active');
        }

        // Auto-advance carousel every 5 seconds
        setInterval(() => {
            moveCarousel(1);
        }, 5000);

        // Search functionality
        document.querySelector('.search-bar button').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-bar input').value;
            if (searchTerm) {
                alert(`Searching for: ${searchTerm}`);
            }
        });

        // Add to cart functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.product-card')) {
                alert('Product added to cart!');
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
    
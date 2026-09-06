// Product data
const products = [
    {
        id: 1,
        title: "Samsung Galaxy S24 Ultra",
        price: 999,
        originalPrice: 1199,
        rating: 4.5,
        reviews: 234,
        discount: 20,
        emoji: "📱"
    },
    {
        id: 2,
        title: "Nike Air Brooklyn Fleece Mens Pullover Hoodie",
        price: 4500,
        originalPrice: 5000,
        rating: 4.3,
        reviews: 1885,
        discount: 10,
        emoji: "👕"
    },
    {
        id: 3,
        title: "Beanies Bag Inflatable Lounge Chair Grey",
        price: 2500,
        originalPrice: 3200,
        rating: 4.2,
        reviews: 1205,
        discount: 22,
        emoji: "🪑"
    },
    {
        id: 4,
        title: "Diamond Oval Earring 0.75 Carat 18k White, Yellow",
        price: 28500,
        originalPrice: 35000,
        rating: 4.6,
        reviews: 134,
        discount: 19,
        emoji: "💎"
    },
    {
        id: 5,
        title: "Nike Invisible 3 Premium Sneakers",
        price: 7500,
        originalPrice: 8500,
        rating: 4.4,
        reviews: 892,
        discount: 12,
        emoji: "👟"
    },
    {
        id: 6,
        title: "Sony WH-1000XM5 Headphones",
        price: 35000,
        originalPrice: 42000,
        rating: 4.7,
        reviews: 2145,
        discount: 17,
        emoji: "🎧"
    },
    {
        id: 7,
        title: "Apple AirPods Pro Max",
        price: 54000,
        originalPrice: 64000,
        rating: 4.8,
        reviews: 1534,
        discount: 15,
        emoji: "🎵"
    },
    {
        id: 8,
        title: "Samsung QLED 4K TV 65 Inch",
        price: 89000,
        originalPrice: 125000,
        rating: 4.6,
        reviews: 876,
        discount: 29,
        emoji: "📺"
    }
];

const winterProducts = [
    {
        title: "Pumpkin Enzyme Mask",
        price: 5000,
        originalPrice: 6500,
        discount: 23,
        emoji: "🎃"
    },
    {
        title: "Cloud Zip Hoodie",
        price: 6500,
        originalPrice: 8000,
        discount: 19,
        emoji: "👕"
    },
    {
        title: "Deerskin Premium Leather Winter Gloves",
        price: 4100,
        originalPrice: 5200,
        discount: 21,
        emoji: "🧤"
    },
    {
        title: "Hayward 3 Season Fluid Jacket",
        price: 23000,
        originalPrice: 29000,
        discount: 21,
        emoji: "🧥"
    },
    {
        title: "Wanderlust Essentials",
        price: 9000,
        originalPrice: 11000,
        discount: 18,
        emoji: "🎒"
    }
];

const beautyProducts = [
    {
        title: "AVLA Heartbeat Pore Control Cleansing Gel",
        price: 1200,
        originalPrice: 1500,
        discount: 20,
        emoji: "🧴"
    },
    {
        title: "Himalaya Shea 1930 Himalaya Purified Hand",
        price: 800,
        originalPrice: 1000,
        discount: 20,
        emoji: "🧼"
    },
    {
        title: "AED Medical Simple Upper Arm Blood Pressure",
        price: 2500,
        originalPrice: 3000,
        discount: 17,
        emoji: "⌚"
    },
    {
        title: "Yardley London Yardley Gentleman",
        price: 1500,
        originalPrice: 1800,
        discount: 17,
        emoji: "💦"
    },
    {
        title: "Dual Set of Liquid Foundation and Concealer",
        price: 2200,
        originalPrice: 2800,
        discount: 21,
        emoji: "💄"
    }
];

// Render products function
function renderProducts(data, containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = data.map(product => `
        <div class="product-card">
            <div class="product-image">
                ${product.emoji}
                ${product.discount ? `<span class="product-badge">-${product.discount}%</span>` : ''}
            </div>
            <div class="product-info">
                <p class="product-title">${product.title}</p>
                <div class="product-rating">
                    <span>★★★★★</span> <span>(${product.reviews || Math.floor(Math.random() * 2000) + 100})</span>
                </div>
                <div class="product-price">
                    <span class="price">₹${product.price}</span>
                    ${product.originalPrice ? `<span class="original-price">₹${product.originalPrice}</span>` : ''}
                </div>
            </div>
        </div>
    `).join('');
}

// Initialize products
renderProducts(products, 'productsGrid');
renderProducts(winterProducts, 'winterWearGrid');
renderProducts(beautyProducts, 'beautyHealthGrid');

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
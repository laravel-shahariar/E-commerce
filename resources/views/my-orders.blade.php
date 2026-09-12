@extends("template.basic")
@section("title", "My Orders")
@section("style")
<style>
.filter-tabs {
    display: flex;
            gap: 10px;
            flex-wrap: wrap;
}

.filter-btn {
    padding: 8px 16px;
            border: 2px solid var(--border-color);
            background-color: var(--white);
            border-radius: 20px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s ease;
}

.filter-btn:hover {
    border-color: var(--primary-color);
            color: var(--primary-color);
}

.filter-btn.active {
    background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
}

.search-input {
    flex: 1;
            min-width: 200px;
            padding: 8px 15px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            font-size: 13px;
}

/* Orders List */
        .orders-container {
    display: flex;
            flex-direction: column;
            gap: 20px;
}

/* Order Card */
        .order-card {
    background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
}

.order-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.order-header {
    padding: 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            user-select: none;
}

.order-header:hover {
    background-color: var(--light-gray);
}

.order-info {
    flex: 1;
}

.order-number {
    font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
}

.order-details-row {
    display: flex;
            gap: 30px;
            font-size: 13px;
            margin-bottom: 8px;
}

.order-detail-item {
    display: flex;
            gap: 8px;
}

.order-detail-label {
    color: var(--text-light);
            font-weight: 600;
}

.order-detail-value {
    color: var(--text-dark);
}

.order-status {
    display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
}

.status-confirmed {
    background-color: #e8f5e9;
            color: #2e7d32;
}

.status-processing {
    background-color: #fff3e0;
            color: #e65100;
}

.status-shipped {
    background-color: #e3f2fd;
            color: #1565c0;
}

.status-delivered {
    background-color: #e8f5e9;
            color: #00796b;
}

.order-amount {
    display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
}

.order-total {
    font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
}

.order-total-label {
    font-size: 12px;
            color: var(--text-light);
}

.expand-btn {
    background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: var(--text-light);
            transition: transform 0.3s ease;
            margin-left: 20px;
}

.expand-btn.expanded {
    transform: rotate(180deg);
}

/* Order Content (Collapsed by default) */
        .order-content {
    max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
}

.order-content.expanded {
    max-height: 1000px;
}

.order-body {
    padding: 20px;
            border-top: 1px solid var(--border-color);
            background-color: var(--light-gray);
}

.order-section {
    margin-bottom: 25px;
}

.order-section:last-child {
    margin-bottom: 0;
}

.section-title {
    font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
            display: flex;
            gap: 8px;
            align-items: center;
}

/* Order Items */
        .order-items {
    display: flex;
            flex-direction: column;
            gap: 12px;
}

.order-item {
    display: grid;
            grid-template-columns: 80px 1fr 60px 100px 100px;
            gap: 15px;
            padding: 12px;
            background-color: var(--white);
            border-radius: 4px;
            align-items: center;
}

.item-image {
    width: 80px;
            height: 80px;
            background-color: var(--light-gray);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
}

.item-info {
    display: flex;
            flex-direction: column;
            gap: 5px;
}

.item-name {
    font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
}

.item-sku {
    font-size: 11px;
            color: var(--text-light);
}

.item-qty {
    text-align: center;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
}

.item-price {
    text-align: right;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
}

.item-total {
    text-align: right;
            font-size: 13px;
            font-weight: 700;
            color: var(--primary-color);
}

/* Order Summary */
        .order-summary {
    display: flex;
            justify-content: flex-end;
            gap: 40px;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
}

.summary-item {
    display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 4px;
}

.summary-label {
    font-size: 12px;
            color: var(--text-light);
            font-weight: 600;
}

.summary-value {
    font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
}

.summary-total {
    font-size: 16px;
            color: var(--primary-color);
            font-weight: 700;
}

/* Address & Timeline */
        .info-grid {
    display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
}

.info-box {
    background-color: var(--white);
            padding: 15px;
            border-radius: 4px;
}

.info-title {
    font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
}

.info-detail {
    font-size: 12px;
            color: var(--text-light);
            line-height: 1.6;
}

/* Timeline */
        .order-timeline {
    background-color: var(--white);
            padding: 15px;
            border-radius: 4px;
}

.timeline-items {
    display: flex;
            justify-content: space-between;
            position: relative;
}

.timeline-items::before {
    content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--border-color);
            z-index: 0;
}

.timeline-point {
    display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            flex: 1;
            position: relative;
            z-index: 1;
}

.timeline-dot {
    width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--light-gray);
            border: 3px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
}

.timeline-dot.completed {
    background-color: var(--success-color);
            border-color: var(--success-color);
            color: var(--white);
}

.timeline-label {
    font-size: 11px;
            text-align: center;
            color: var(--text-light);
            font-weight: 600;
}

/* Action Buttons */
        .order-actions {
    display: flex;
            gap: 10px;
            flex-wrap: wrap;
}

.btn {
    padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
}

.btn-small {
    padding: 6px 12px;
            font-size: 11px;
}

/* Empty State */
        .empty-state {
    text-align: center;
            padding: 60px 20px;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Responsive */
        @media (max-width: 768px) {
    .filter-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .order-item {
                grid-template-columns: 70px 1fr;
                gap: 10px;
            }

            .order-item > :nth-child(n+3) {
                display: none;
            }

            .order-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .order-amount {
                align-items: flex-start;
            }

            .order-details-row {
                flex-direction: column;
                gap: 8px;
            }

            .timeline-items {
                flex-wrap: wrap;
            }

            .timeline-items::before {
                display: none;
            }
}
</style>
@endsection

@section("content")
    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">📦 My Orders</h1>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <span class="filter-label">Filter by Status:</span>
            <div class="filter-tabs">
                <button class="filter-btn active" onclick="filterOrders('all')">All Orders</button>
                <button class="filter-btn" onclick="filterOrders('confirmed')">Confirmed</button>
                <button class="filter-btn" onclick="filterOrders('processing')">Processing</button>
                <button class="filter-btn" onclick="filterOrders('shipped')">Shipped</button>
                <button class="filter-btn" onclick="filterOrders('delivered')">Delivered</button>
            </div>
            <input type="text" class="search-input" placeholder="Search by order number..." id="searchInput" onkeyup="searchOrders()">
        </div>

        <!-- Orders Container -->
        <div class="orders-container" id="ordersContainer">
            <!-- Orders will be loaded here -->
        </div>
    </div>

    <script>
        // Sample order data
        const allOrders = [
            {
                orderNumber: 'ORD-1001',
                date: '2024-09-06',
                status: 'delivered',
                items: [
                    { id: 1, name: 'Samsung Galaxy S24 Ultra', price: 79999, quantity: 1, emoji: '📱' },
                    { id: 2, name: 'Samsung Galaxy Buds2', price: 12999, quantity: 1, emoji: '🎧' }
                ],
                subtotal: 92998,
                tax: 16739,
                total: 109737,
                address: '123 Main Street, New York, NY 10001',
                customer: 'John Doe'
            },
            {
                orderNumber: 'ORD-1002',
                date: '2024-09-05',
                status: 'shipped',
                items: [
                    { id: 3, name: 'Apple iPhone 15 Pro Max', price: 139999, quantity: 1, emoji: '📱' }
                ],
                subtotal: 139999,
                tax: 25199,
                total: 165198,
                address: '456 Oak Avenue, Los Angeles, CA 90001',
                customer: 'John Doe'
            },
            {
                orderNumber: 'ORD-1003',
                date: '2024-09-04',
                status: 'processing',
                items: [
                    { id: 4, name: 'Sony WH-1000XM5 Headphones', price: 35000, quantity: 1, emoji: '🎧' },
                    { id: 5, name: 'Apple AirPods Pro Max', price: 54000, quantity: 1, emoji: '🎵' }
                ],
                subtotal: 89000,
                tax: 16020,
                total: 105020,
                address: '789 Pine Road, Chicago, IL 60601',
                customer: 'John Doe'
            },
            {
                orderNumber: 'ORD-1004',
                date: '2024-09-03',
                status: 'delivered',
                items: [
                    { id: 6, name: 'Samsung QLED 4K TV 65 Inch', price: 89000, quantity: 1, emoji: '📺' }
                ],
                subtotal: 89000,
                tax: 16020,
                total: 105020,
                address: '321 Elm Street, Houston, TX 77001',
                customer: 'John Doe'
            },
            {
                orderNumber: 'ORD-1005',
                date: '2024-09-02',
                status: 'confirmed',
                items: [
                    { id: 7, name: 'Nike Air Jordan 1', price: 15999, quantity: 2, emoji: '👟' },
                    { id: 8, name: 'Adidas Ultra Boost', price: 13999, quantity: 1, emoji: '👟' }
                ],
                subtotal: 45997,
                tax: 8279,
                total: 54276,
                address: '654 Maple Drive, Phoenix, AZ 85001',
                customer: 'John Doe'
            }
        ];

        let filteredOrders = allOrders;
        let currentFilter = 'all';

        function getStatusColor(status) {
            const statusMap = {
                'confirmed': 'status-confirmed',
                'processing': 'status-processing',
                'shipped': 'status-shipped',
                'delivered': 'status-delivered'
            };
            return statusMap[status] || 'status-confirmed';
        }

        function getStatusText(status) {
            const statusMap = {
                'confirmed': 'Order Confirmed',
                'processing': 'Processing',
                'shipped': 'Shipped',
                'delivered': 'Delivered'
            };
            return statusMap[status] || 'Confirmed';
        }

        function getStatusIcon(status) {
            const iconMap = {
                'confirmed': '✓',
                'processing': '📦',
                'shipped': '🚚',
                'delivered': '📍'
            };
            return iconMap[status] || '✓';
        }

        function renderOrders(orders) {
            const container = document.getElementById('ordersContainer');

            if (orders.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-icon">📭</div>
                        <div class="empty-title">No Orders Found</div>
                        <div class="empty-text">You haven't placed any orders yet</div>
                        <a href="index.html" class="continue-shopping-btn">Start Shopping</a>
                    </div>
                `;
                return;
            }

            container.innerHTML = orders.map((order, index) => `
                <div class="order-card">
                    <div class="order-header" onclick="toggleOrder(this)">
                        <div class="order-info">
                            <div class="order-number">${order.orderNumber}</div>
                            <div class="order-details-row">
                                <div class="order-detail-item">
                                    <span class="order-detail-label">Order Date:</span>
                                    <span class="order-detail-value">${new Date(order.date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</span>
                                </div>
                                <div class="order-detail-item">
                                    <span class="order-detail-label">Items:</span>
                                    <span class="order-detail-value">${order.items.length} product${order.items.length > 1 ? 's' : ''}</span>
                                </div>
                                <div class="order-detail-item">
                                    <span class="order-status ${getStatusColor(order.status)}">${getStatusText(order.status)}</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-amount">
                            <div class="order-total-label">Order Total</div>
                            <div class="order-total">₹${order.total.toLocaleString()}</div>
                        </div>
                        <button class="expand-btn" onclick="event.stopPropagation()">▼</button>
                    </div>

                    <div class="order-content">
                        <div class="order-body">
                            <!-- Order Items -->
                            <div class="order-section">
                                <div class="section-title">📦 Order Items</div>
                                <div class="order-items">
                                    ${order.items.map(item => `
                                        <div class="order-item">
                                            <div class="item-image">${item.emoji}</div>
                                            <div class="item-info">
                                                <div class="item-name">${item.name}</div>
                                                <div class="item-sku">SKU: ${item.id}</div>
                                            </div>
                                            <div class="item-qty">${item.quantity}</div>
                                            <div class="item-price">₹${item.price.toLocaleString()}</div>
                                            <div class="item-total">₹${(item.price * item.quantity).toLocaleString()}</div>
                                        </div>
                                    `).join('')}
                                </div>
                                <div class="order-summary">
                                    <div class="summary-item">
                                        <div class="summary-label">Subtotal</div>
                                        <div class="summary-value">₹${order.subtotal.toLocaleString()}</div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="summary-label">Tax (18%)</div>
                                        <div class="summary-value">₹${order.tax.toLocaleString()}</div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="summary-label">Total</div>
                                        <div class="summary-total">₹${order.total.toLocaleString()}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Info -->
                            <div class="order-section">
                                <div class="section-title">📍 Shipping Information</div>
                                <div class="info-grid">
                                    <div class="info-box">
                                        <div class="info-title">Shipping Address</div>
                                        <div class="info-detail">${order.address}</div>
                                    </div>
                                    <div class="info-box">
                                        <div class="info-title">Customer Name</div>
                                        <div class="info-detail">${order.customer}</div>
                                    </div>
                                    <div class="info-box">
                                        <div class="info-title">Expected Delivery</div>
                                        <div class="info-detail">${new Date(order.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric' })} - ${new Date(new Date(order.date).getTime() + 10 * 24 * 60 * 60 * 1000).toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Timeline -->
                            <div class="order-section">
                                <div class="section-title">🔄 Order Status Timeline</div>
                                <div class="order-timeline">
                                    <div class="timeline-items">
                                        <div class="timeline-point">
                                            <div class="timeline-dot completed">✓</div>
                                            <div class="timeline-label">Confirmed</div>
                                        </div>
                                        <div class="timeline-point">
                                            <div class="timeline-dot ${['processing', 'shipped', 'delivered'].includes(order.status) ? 'completed' : ''}">📦</div>
                                            <div class="timeline-label">Processing</div>
                                        </div>
                                        <div class="timeline-point">
                                            <div class="timeline-dot ${['shipped', 'delivered'].includes(order.status) ? 'completed' : ''}">🚚</div>
                                            <div class="timeline-label">Shipped</div>
                                        </div>
                                        <div class="timeline-point">
                                            <div class="timeline-dot ${order.status === 'delivered' ? 'completed' : ''}">📍</div>
                                            <div class="timeline-label">Delivered</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="order-section">
                                <div class="order-actions">
                                    <button class="btn btn-primary btn-small" onclick="viewOrderDetails('${order.orderNumber}')">View Details</button>
                                    <button class="btn btn-primary btn-small" onclick="trackOrder('${order.orderNumber}')">Track Order</button>
                                    <button class="btn btn-secondary btn-small" onclick="reorder('${order.orderNumber}')">Re-order</button>
                                    ${order.status === 'delivered' ? `<button class="btn btn-secondary btn-small" onclick="returnOrder('${order.orderNumber}')">Return Items</button>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function toggleOrder(element) {
            const orderCard = element.closest('.order-card');
            const orderContent = orderCard.querySelector('.order-content');
            const expandBtn = orderCard.querySelector('.expand-btn');

            orderContent.classList.toggle('expanded');
            expandBtn.classList.toggle('expanded');
        }

        function filterOrders(status) {
            currentFilter = status;
            
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter orders
            if (status === 'all') {
                filteredOrders = allOrders;
            } else {
                filteredOrders = allOrders.filter(order => order.status === status);
            }

            renderOrders(filteredOrders);
        }

        function searchOrders() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            if (currentFilter === 'all') {
                filteredOrders = allOrders.filter(order => 
                    order.orderNumber.toLowerCase().includes(searchTerm)
                );
            } else {
                filteredOrders = allOrders.filter(order => 
                    order.status === currentFilter && 
                    order.orderNumber.toLowerCase().includes(searchTerm)
                );
            }

            renderOrders(filteredOrders);
        }

        function viewOrderDetails(orderNumber) {
            alert(`Viewing details for ${orderNumber}`);
            window.location.href = `order-confirmation.html?order=${orderNumber}`;
        }

        function trackOrder(orderNumber) {
            alert(`Tracking order: ${orderNumber}\n\nYour order is on its way. Estimated delivery: Sept 10-12, 2024`);
        }

        function reorder(orderNumber) {
            const order = allOrders.find(o => o.orderNumber === orderNumber);
            if (order) {
                const cartItems = order.items.map(item => ({
                    id: item.id,
                    title: item.name,
                    price: item.price,
                    quantity: 1,
                    emoji: item.emoji
                }));
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                window.location.href = 'cart.html';
            }
        }

        function returnOrder(orderNumber) {
            alert(`Processing return for ${orderNumber}\n\nPlease select items to return and provide a reason.`);
        }

        // Initialize
        window.addEventListener('load', () => {
            renderOrders(allOrders);
        });
    </script>
@endsection

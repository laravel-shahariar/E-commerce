@props(['active' => ''])

<!-- Sidebar Navigation -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">LUXORA</div>
    <nav class="sidebar-menu">
        <a href="{{ route('dashboard') }}" class="sidebar-link {{ $active === 'dashboard' ? 'active' : '' }}">
            <span class="sidebar-link-icon">📊</span>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('dashboard.product') }}" class="sidebar-link {{ $active === 'products' ? 'active' : '' }}">
            <span class="sidebar-link-icon">📦</span>
            <span>Products</span>
        </a>
        <a href="{{ route('dashboard.order') }}" class="sidebar-link {{ $active === 'orders' ? 'active' : '' }}">
            <span class="sidebar-link-icon">📋</span>
            <span>Orders</span>
        </a>
        <a href="{{ route('dashboard.customer') }}" class="sidebar-link {{ $active === 'customers' ? 'active' : '' }}">
            <span class="sidebar-link-icon">👥</span>
            <span>Customers</span>
        </a>
        <a href="#" class="sidebar-link {{ $active === 'analytics' ? 'active' : '' }}">
            <span class="sidebar-link-icon">📈</span>
            <span>Analytics</span>
        </a>
        <a href="#" class="sidebar-link {{ $active === 'settings' ? 'active' : '' }}">
            <span class="sidebar-link-icon">⚙️</span>
            <span>Settings</span>
        </a>
        <a href="#" class="sidebar-link" onclick="logout()">
            <span class="sidebar-link-icon">🚪</span>
            <span>Logout</span>
        </a>
    </nav>
</aside>

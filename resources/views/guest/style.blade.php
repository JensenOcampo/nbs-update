<style>
    /* Combined header styles */
    .combined-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    /* Top nav styles */
    .top-nav {
        border-bottom: 1px solid #e5e7eb;
        padding: 8px 0;
    }

    .top-nav-content {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        color: #9ca3af;
    }

    .top-nav-left {
        display: flex;
        gap: 1.5rem;
    }

    .top-nav-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .top-nav a {
        color: #9ca3af;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.25rem;
        transition: color 0.2s;
    }

    .top-nav a:hover {
        color: #6b7280;
    }

    /* Main header styles */
    .main-header {
        padding: 12px 0;
    }

    .main-header-content {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo-section {
        flex-shrink: 0;
    }

    .logo-section img {
        height: 40px;
        width: auto;
    }

    .search-section {
        flex: 1;
        max-width: 600px;
        margin: 0 2rem;
    }

    .search-form {
        display: flex;
        width: 100%;
    }

    .search-input {
        flex: 1;
        border: 1px solid #d1d5db;
        border-right: none;
        border-radius: 9999px 0 0 9999px;
        padding: 8px 16px;
        font-size: 14px;
        color: #6b7280;
        outline: none;
        transition: all 0.2s;
    }

    .search-input:focus {
        ring: 2px;
        ring-color: #dc2626;
        border-color: transparent;
    }

    .search-button {
        background: #000;
        border: 1px solid #000;
        border-left: none;
        border-radius: 0 9999px 9999px 0;
        padding: 8px 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
    }

    .search-button:hover {
        background: #374151;
    }

    .nav-icons {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        color: #000;
        font-size: 14px;
    }

    .nav-icons a {
        color: #000;
        text-decoration: none;
        position: relative;
        transition: color 0.2s;
    }

    .nav-icons a:hover {
        color: #6b7280;
    }

    .cart-badge {
        position: absolute;
        top: -8px;
        right: -12px;
        background: #f97316;
        color: white;
        font-size: 10px;
        font-weight: bold;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Account dropdown styles */
    .account-dropdown {
        position: relative;
        display: inline-block;
    }

    .account-dropdown a,
    .account-dropdown .icon-user,
    .account-dropdown span {
        color: #000 !important;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #fff;
        padding: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 999;
        min-width: 120px;
        border-radius: 4px;
    }

    .account-dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu .btn {
        display: block;
        width: 100%;
        text-align: left;
        padding: 8px 12px;
        margin-bottom: 5px;
        background-color: #f8f9fa;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
    }

    .dropdown-menu .btn:hover {
        background-color: #e2e6ea;
        color: #000 !important;
    }

    /* Content spacing to account for fixed header */
    .content-wrapper {
        margin-top: 120px;
        /* Adjust based on your header height */
    }

    .product-card:hover {
        box-shadow: 0 8px 24px rgba(238, 77, 45, 0.15), 0 1.5px 6px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px) scale(1.02);
        z-index: 2;
    }

    .product-card .btn {
        transition: background 0.2s;
    }

    .product-card .btn:hover {
        background: #d73211 !important;
        color: #fff;
    }

    .uniform-height {
        height: 38px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .top-nav-left {
            display: none;
        }

        .search-section {
            margin: 0 1rem;
        }

        .content-wrapper {
            margin-top: 80px;
        }
    }

    @media (max-width: 640px) {
        .top-nav {
            display: none;
        }

        .content-wrapper {
            margin-top: 70px;
        }
    }

    /* Search results highlighting */
    .search-results-info {
        background: #f8f9fa;
        border-left: 4px solid #ee4d2d;
        padding: 12px 16px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .search-results-info .clear-search {
        color: #ee4d2d;
        text-decoration: none;
        font-weight: 600;
        margin-left: 10px;
    }

    .search-results-info .clear-search:hover {
        text-decoration: underline;
    }
</style>

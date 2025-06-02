<div class="combined-header">
    <!-- Top small nav -->
    <div class="top-nav">
        <div class="top-nav-content">
            <div class="top-nav-left">
                <a href="#">
                    <i class="fas fa-book-open"></i>
                    <span>Blog</span>
                </a>
                <a href="#">
                    <i class="fas fa-boxes"></i>
                    <span>Bulk Orders</span>
                </a>
                <a href="#">
                    <i class="fas fa-globe"></i>
                    <span>Laking National</span>
                </a>
                <a href="#">
                    <i class="fas fa-question-circle"></i>
                    <span>Help</span>
                </a>
                <a href="#">
                    <i class="far fa-comment-alt"></i>
                    <span>Contact Us</span>
                </a>
                <span style="color: #d1d5db;">
                    <i class="fas fa-truck"></i>
                    <span>Delivery Hotline 8-8888-627</span>
                </span>
            </div>
            <div class="top-nav-right">
                <i class="fa fa-bell"></i>
                <span>Notifications</span>
                <span>|</span>
                <i class="fa fa-question-circle"></i>
                <span>Help</span>
                <span>|</span>
                <i class="fa fa-globe"></i>
                <span>English</span>
                <span>|</span>
                <!-- Auth section - you can replace this with your Laravel auth logic -->
                @if (Route::has('login'))
                    @auth
                        <li class="account-dropdown">
                            <x-app-layout>
                            </x-app-layout>
                        </li>
                    @else
                        <div class="account-dropdown">
                            <a href="#"
                                class="user-account for-buy flex items-center space-x-1 text-black hover:text-gray-700">
                                <i class="icon icon-user"></i><span>Account</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('login') }}" class="btn btn-login" style="color: #000">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-register" style="color: #000">Register</a>
                            </div>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <!-- Main header -->
    <div class="main-header">
        <div class="main-header-content">
            <!-- Logo -->
            <div class="logo-section">
                <a href="/"><img src="images/main-logo.png" alt="National Book Store logo" /></a>
            </div>

            <!-- Search bar -->
            {{-- <div class="search-section">
                <form class="search-form" action="{{ route('home') }}" method="GET">
                    <input type="text" id="search-input" name="q" placeholder="Search products, categories..."
                        class="search-input" value="{{ request('q') }}" autocomplete="off">
                    <button type="submit" class="search-button" aria-label="Search">
                        <i class="fas fa-search text-white"></i>
                    </button>
                </form>
            </div> --}}

            <!-- Right icons -->
            <nav class="nav-icons">
                <a href="#" aria-label="User account">
                    <i class="far fa-user text-lg"></i>
                </a>
                <a href="#" aria-label="Favorites">
                    <i class="far fa-heart text-lg"></i>
                </a>
                <!-- Cart icon goes to cart index page -->
                <a href="{{ route('cart.index') }}" aria-label="Shopping cart" class="relative hover:text-gray-700">
                    <i class="fas fa-shopping-cart text-lg"></i>
                    @if (session('cart') && count(session('cart')) > 0)
                        <span
                            class="absolute -top-2 -right-3 bg-orange-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                            {{ collect(session('cart', []))->sum('quantity') }}
                        </span>
                    @else
                        <span
                            class="absolute -top-2 -right-3 bg-orange-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                            0
                        </span>
                    @endif
                </a>
            </nav>
        </div>
    </div>
</div>

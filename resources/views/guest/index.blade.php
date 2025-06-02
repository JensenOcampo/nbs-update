<html lang="en">

<head>
    <title>National Book Store</title>
    <link rel="icon" href="assets/img/kaiadmin/logo_light.svg" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('guest.link')

    @include('guest.style')

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0" class="bg-white">

    <!-- Top small nav with left and right content -->
    @include('guest.header')

    <br>
    <div class="content-wrapper">
        <!-- Search Results Info -->
        @if (request('q'))
            <div class="container">
                <div class="search-results-info">
                    <i class="fas fa-search"></i>
                    <strong>Search results for:</strong> "{{ request('q') }}"
                    <span class="text-muted">({{ count($products) }}
                        {{ Str::plural('result', count($products)) }})</span>
                    <a href="{{ route('home') }}" class="clear-search">
                        <i class="fas fa-times"></i> Clear search
                    </a>
                </div>
            </div>
        @endif

        <!-- Filter section -->
        <div class="container mb-4">
            <form method="GET" action="{{ route('home') }}" class="row g-2" id="filterForm">
                <!-- Search Field -->
                <div class="col-md-12 mb-3">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control"
                            placeholder="Search products by name, category, or description..."
                            value="{{ request('q') }}" aria-label="Search">
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                        @if (request('q'))
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Clear
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Category Field -->
                <div class="col-md-4">
                    <label for="category_id" class="form-label mb-0">Category</label>
                    <select name="category_id" id="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sort Field -->
                <div class="col-md-4">
                    <label for="price_sort" class="form-label mb-0">Sort by Price</label>
                    <select name="price_sort" id="price_sort" class="form-select" onchange="this.form.submit()">
                        <option value="">Default</option>
                        <option value="asc" {{ request('price_sort') == 'asc' ? 'selected' : '' }}>
                            Lowest to Highest
                        </option>
                        <option value="desc" {{ request('price_sort') == 'desc' ? 'selected' : '' }}>
                            Highest to Lowest
                        </option>
                    </select>
                </div>

                <!-- Reset Button -->
                <div class="col-md-4">
                    <label class="form-label invisible mb-0">Actions</label>
                    <div class="d-flex w-100 gap-2">
                        <a href="{{ route('home') }}"
                            class="btn btn-primary flex-fill uniform-height d-flex align-items-center justify-content-center">
                            <i class="fas fa-sync-alt me-2"></i> Reset All Filters
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Products section -->
        <div class="container py-4" style="background: #fff; border-radius: 8px;">
            <h2 class="text-center mb-4" style="font-weight:bold; color: #ee4d2d; font-size:50px;">Shop Products
            </h2>

            @if (count($products) == 0)
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No products found</h4>
                    @if (request('q'))
                        <p class="text-muted">Try searching with different keywords or <a href="{{ route('home') }}"
                                class="text-danger">browse all products</a></p>
                    @else
                        <p class="text-muted">No products are currently available.</p>
                    @endif
                </div>
            @else
                <div class="row g-3">
                    <!-- Sample product cards -->
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm product-card"
                                style="transition: box-shadow 0.2s;">
                                <div class="position-relative">
                                    <img src="/product/{{ $product->image }}" class="card-img-top p-2"
                                        alt="{{ $product->title }}" style="height:200px;object-fit:cover;">
                                    {{-- Optional: Sale badge --}}
                                    @if (isset($product->is_sale) && $product->is_sale)
                                        <span class="badge bg-danger position-absolute top-0 start-0 m-2">SALE</span>
                                    @endif
                                </div>
                                <div class="card-body d-flex flex-column p-2">
                                    <h6 class="card-title mb-1" style="font-size:1rem; min-height: 40px;">
                                        {{ $product->title }}</h6>
                                    <p class="card-text text-muted mb-2" style="font-size:0.9rem; min-height: 36px;">
                                        {{ Str::limit($product->description, 40) }}
                                    </p>
                                    <div class="mb-2" style="font-weight:bold;color:#ee4d2d;font-size:1.1rem;">
                                        ₱{{ number_format($product->price, 2) }}
                                    </div>
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}"
                                        class="mt-auto">
                                        @csrf
                                        <button type="submit" class="btn w-100"
                                            style="background:#ee4d2d; color:#fff; font-weight:600; border-radius: 20px;">
                                            <i class="fas fa-cart-plus me-1"></i> Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <footer id="footer" class="col mt--5">
        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <div class="footer-item">
                        <div class="company-brand">
                            <img src="images/main-logo.png" alt="logo" class="footer-logo">
                            <p>NATIONAL BOOK STORE is a registered brand and the tradename of National Book Store
                                Inc.,
                                and Abacus Book and Card Corporation.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>About Us</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">vision</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">articles </a>
                            </li>
                            <li class="menu-item">
                                <a href="#">careers</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">service terms</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">donate</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Discover</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Books</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Authors</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Subjects</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Advanced Search</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>My account</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Sign In</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">View Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">My Wishtlist</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Track My Order</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Help</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Help center</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Report a problem</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Suggesting edits</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Contact us</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- / row -->

        </div>
    </footer>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="copyright">
                        <div class="row">

                            <div class="col-md-6">
                                <p>© 2025 All rights reserved. <a href="#">National Book
                                        Store</a>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <div class="social-links align-right">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-youtube-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-behance-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div><!--grid-->

                </div><!--footer-bottom-content-->
            </div>
        </div>
    </div>



</body>
@include('guest.script')

</html>

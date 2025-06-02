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
        <!-- Cart summary section -->
        <div class="container py-4" style="background: #fff; border-radius: 8px;">
            <h2 class="text-center mb-4" style="font-weight:bold; color: #ee4d2d; font-size:50px;">My Cart</h2>
            @php $cart = session('cart', []); @endphp
            @if (count($cart) == 0)
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Your cart is empty</h4>
                    <p class="text-muted">Go back to <a href="{{ route('home') }}" class="text-danger">shop
                            products</a>.
                    </p>
                </div>
            @else
                <div class="table-responsive mb-4">
                    @include('partials.cart_table', ['cart' => $cart])
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h4 class="fw-bold">Total:
                            ₱{{ number_format(collect($cart)->reduce(fn($carry, $item) => $carry + $item['price'] * $item['quantity'], 0), 2) }}
                        </h4>
                    </div>
                    <div>
                        @if (Auth::check())
                            <a href="#" class="btn btn-success btn-lg px-5">Proceed to Checkout</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success btn-lg px-5">Login to Checkout</a>
                        @endif
                    </div>
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

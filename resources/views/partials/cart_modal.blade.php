<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php $cart = session('cart', []); @endphp
                @if (count($cart) > 0)
                    <div id="cart-table-container">
                        @include('partials.cart_table', ['cart' => $cart])
                    </div>
                @else
                    <div class="text-center text-muted py-4">Your cart is empty.</div>
                @endif
            </div>
            <div class="modal-footer">
                @if (count($cart) > 0)
                    @if (Auth::check())
                        <a href="#" class="btn btn-success">Proceed to Checkout</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success">Checkout</a>
                    @endif
                @endif
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

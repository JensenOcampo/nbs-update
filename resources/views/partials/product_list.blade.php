@foreach ($products as $product)
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card h-100 border-0 shadow-sm product-card">
            <div class="position-relative">
                <img src="/product/{{ $product->image }}" class="card-img-top p-2" alt="{{ $product->title }}"
                    style="height:200px;object-fit:cover;">
                @if (isset($product->is_sale) && $product->is_sale)
                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">SALE</span>
                @endif
            </div>
            <div class="card-body d-flex flex-column p-2">
                <h6 class="card-title mb-1">{{ $product->title }}</h6>
                <p class="card-text text-muted mb-2">{{ Str::limit($product->description, 40) }}</p>
                <div class="mb-2" style="font-weight:bold;color:#ee4d2d;font-size:1.1rem;">
                    ₱{{ number_format($product->price, 2) }}
                </div>
                <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-auto">
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

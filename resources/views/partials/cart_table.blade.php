{{-- filepath: resources/views/partials/cart_table.blade.php --}}
@if (count($cart) > 0)
    <table class="table align-middle">
        <thead>
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $id => $item)
                <tr>
                    <td style="width:60px;">
                        <img src="/product/{{ $item['image'] ?? 'default.png' }}"
                            alt="{{ $item['title'] ?? ($item['name'] ?? 'Product') }}"
                            style="height:40px;width:40px;object-fit:cover;">
                    </td>
                    <td>{{ $item['title'] ?? ($item['name'] ?? 'No Name') }}</td>
                    <td class="d-flex align-items-center gap-2">
                        <form action="{{ route('cart.decrease', $id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-secondary">&minus;</button>
                        </form>

                        <span class="mx-2">{{ $item['quantity'] }}</span>

                        <form action="{{ route('cart.increase', $id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-secondary">&plus;</button>
                        </form>
                    </td>
                    <td>₱{{ number_format($item['price'], 2) }}</td>
                    <td>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove item">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="text-center text-muted py-4">Your cart is empty.</div>
@endif

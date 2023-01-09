<div class="card mb-3 text-center">
    <img
        src="{{ asset($product->picture) }}"
        class="card-img-top"
        alt="{{ $product->name }}"
    />
    <div class="card-body">
        <a href="/products/{{$product->id}}" class="card-title product-card-title text-decoration-none text-black">{{ $product->name }}</a>
        <p class="card-text mb-3">IDR {{number_format($product->price)}}</p>
        <p class="card-text bg-primary text-white rounded p-2 mb-3 d-inline-block">{{ $product->category->name }}</p>
        <hr />
        @if(auth()->check() && auth()->user()->isAdmin)
            <div class="d-flex justify-content-between">
                <a href="/products/{{$product->id}}/edit" class="btn btn-primary">Edit Product</a>
                <form action="/products/{{$product->id}}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Remove Product
                    </button>
                </form>
            </div>
        @else
            <div class="text-start">
                @guest
                    <button onclick="alertAndRedirectToLoginPage()" class="btn btn-primary" {{ $product->stock == 0 ? 'disabled' : '' }}>{{$product->stock == 0 ? 'Out of Stock' : 'Add to Cart'}}</button>
                @else
                    <form action="/products/{{$product->id}}/add-to-cart" method="post">
                        @csrf
                        <button class="btn btn-primary" {{ $product->stock == 0 ? 'disabled' : '' }}>{{$product->stock == 0 ? 'Out of Stock' : 'Add to Cart'}}</button>
                    </form>
                @endguest
            </div>
        @endif
    </div>
</div>

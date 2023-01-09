<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($product->picture) }}" alt="{{ $product->name }}" class="w-100">
            </div>
            <div class="col-md-6">
                <h1 class="mb-4">{{ $product->name }}</h1>
                <p class="text-muted mb-4">Category: {{ $product->category->name }}</p>
                <h2 class="mb-4">IDR {{number_format($product->price)}}</h2>
                <p>{{ $product->description }}</p>
                <p class="text-muted mb-4">Stock: {{ $product->stock }}</p>
            </div>
        </div>
    </div>
</x-layout>
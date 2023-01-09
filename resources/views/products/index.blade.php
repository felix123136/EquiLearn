<x-layout>
    <div class="container mt-5">
        <h1>OUR PRODUCTS</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                @include('partials._search')
                @auth
                    @if(auth()->user()->isAdmin)
                        <a href="/products/new" class="btn btn-info text-white">Insert Product</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="row mt-5">
            @unless (count($products) == 0)
                @foreach($products as $product)
                <div class="col-md-4">
                    <x-product-card :product="$product" />
                </div>
                @endforeach
            @else
                @if(count($query) == 0)
                    <p class="mb-5">No Products Found</p>
                @else
                    <p class="mb-5" style="min-height:17vh;">No Product Match for '{{$query['search']}}'</p>
                @endif
            @endunless
        </div>
        <div class="mt-2 p-1">
            {{$products->links()}}
        </div>
    </div>    
</x-layout>
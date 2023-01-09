<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <h2 class="text-center mb-4">Edit Product</h2>
                <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label class="mb-3 mt-2" for="picture">Image</label>
                        <img
                            class="w-48 mr-6 mb-3 img-fluid"
                            src="{{ asset($product->picture) }}"
                            alt=""
                        />
                        <input type="file" class="form-control" name="picture">
                        @error('picture')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="name">Product Name</label>
                        <input type="text" class="form-control text-muted" name="name" value="{{ $product->name }}" disabled>
                        <input type="hidden" class="form-control text-muted" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="description">Description</label>
                        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="price">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                        @error('price')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="stock">Product Quantity</label>
                        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
                        @error('stock')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="category">Category Name</label>
                        <input type="text" class="form-control text-muted" name="category" value="{{ $product->category->name }}" disabled>
                        <input type="hidden" class="form-control text-muted" name="category_id" value="{{ $product->category->id }}">
                        @error('category')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-info text-white me-2" type="submit">
                            Update
                        </button>
                        <a href="/products" class="btn btn-danger me-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
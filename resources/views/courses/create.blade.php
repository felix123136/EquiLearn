<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <h2 class="text-center mb-4">Add Course</h2>
                <form method="POST" action="/courses" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="mb-3" for="picture">Image</label>
                        <input type="file" class="form-control" name="picture">
                        @error('picture')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="name">Course Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="description">Description</label>
                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="price">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="category">Category Name</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">
                            Choose a category for your course.
                        </small>
                        @error('category')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary me-2" type="submit">
                            Insert
                        </button>
                        <a href="/courses" class="btn btn-danger me-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
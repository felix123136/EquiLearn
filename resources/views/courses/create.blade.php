<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-dark text-white card p-5">
                <h2 class="text-center mb-4">Add Course</h2>
                <form method="POST" action="/courses" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <input type="file" class="form-control" name="picture">
                        @error('picture')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
                        <label class="mb-3 text-muted" for="name">Course Name</label>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="description" placeholder="description">{{ old('description') }}</textarea>
                        <label class="mb-3 text-muted" for="description">Description</label>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="price">
                        <label class="mb-3 text-muted" for="price">Price</label>
                        @error('price')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option class="text-black" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label class="mb-3 text-muted" for="category">Category Name</label>
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
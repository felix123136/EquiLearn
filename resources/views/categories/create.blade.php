<x-layout>
    <div class="row" style="min-height: 65vh">
        <div class="mx-auto col-md-6">
            @foreach ($categories as $category)
            <span class="bg-primary text-white rounded me-3 p-2 mt-5 d-inline-block">{{ $category->name }}</span>
            @endforeach
            <h2 class="text-center my-5">Add New Category</h2>
            <form class="mb-5" method="POST" action="/categories">
                @csrf
                <div class="form-group mb-4">
                    <label class="mb-3" for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" />
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>    
        </div>
    </div>
</x-layout>
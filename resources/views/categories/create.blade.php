<x-layout>
    <div class="row" style="min-height: 65vh">
        <div class="mx-auto col-md-6 text-white">
            @foreach ($categories as $category)
            <span class="text-white me-3 p-2 mt-5 d-inline-block" style="background-color:  rgb(76, 15, 251); border-radius:30px;">{{ $category->name }}</span>
            @endforeach
            <h2 class="text-center my-5">Add New Category</h2>
            <form class="mb-5" method="POST" action="/categories">
                @csrf
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="name" name="name" />
                    <label class="mb-3 text-muted" for="name">Category Name</label>
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>    
        </div>
    </div>
</x-layout>
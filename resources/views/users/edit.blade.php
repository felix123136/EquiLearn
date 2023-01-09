<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <h2 class="text-center mb-4">Update your profile</h2>
                <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label class="mb-3" for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="email">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="********">
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="address">Address</label>
                        <textarea class="form-control" name="address">{{ $user->address }}</textarea>
                        <small class="text-muted">Please write your actual address where you can receive mail</small>
                        @error('address')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                        @error('phone')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 d-flex justify-content-end">
                        <a href="/users/{{$user->id}}" class="btn btn-danger me-3">Cancel</a>
                        <button class="btn btn-info text-white" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
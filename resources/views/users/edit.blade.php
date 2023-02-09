<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-dark text-white card p-5">
                <h2 class="text-center mb-4">Update your profile</h2>
                <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="name">
                        <label class="mb-3 text-muted" for="name">Name</label>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                        <label class="mb-3 text-muted" for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" value="********" placeholder="password">
                        <label class="mb-3 text-muted" for="password">Password</label>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation">
                        <label class="mb-3 text-muted" for="password_confirmation">Confirm Password</label>
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="address" placeholder="address">{{ $user->address }}</textarea>
                        <label class="mb-3 text-muted" for="address">Address</label>
                        <small class="text-muted">Please write your actual address where you can receive mail</small>
                        @error('address')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="phone">
                        <label class="mb-3 text-muted" for="phone">Phone</label>
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
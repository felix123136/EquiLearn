<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-white card p-5" style="background-color: rgb(15, 11, 25); box-shadow: 2px 2px 1px 1px #545261;">
                <h2 class="text-center mb-4">Create your account</h2>
                <form method="POST" action="/users" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="mb-3" for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="email">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="address">Address</label>
                        <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                        <small class="text-muted">Please write your actual address where you can receive mail</small>
                        @error('address')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-4 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-white card p-5" style="background-color: rgb(15, 11, 25); box-shadow: 2px 2px 1px 1px #545261;">
                <h2 class="text-center mb-4">Create your account</h2>
                <form method="POST" action="/users" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
                        <label class="mb-3 text-muted" for="name">Name</label>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">
                        <label class="mb-3 text-muted" for="email">Email address</label>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password">
                        <label class="mb-3 text-muted" for="password">Password</label>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="password_confirmation">
                        <label class="mb-3 text-muted" for="password_confirmation">Confirm Password</label>
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="address" placeholder="Address">{{ old('address') }}</textarea>
                        <label class="mb-3 text-muted" for="address">Address</label>
                        <small class="text-muted">Please write your actual address where you can receive mail</small>
                        @error('address')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="phone">
                        <label class="mb-3 text-muted" for="phone">Phone</label>
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
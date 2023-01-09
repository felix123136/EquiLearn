@php
    use Illuminate\Support\Facades\Cookie;
@endphp
<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <h2 class="text-center mb-4">Sign in to your account</h2>
                <form method="POST" action="/users/authenticate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="mb-3" for="email">Email address</label>
                        @if(Cookie::has('email'))
                            <input type="email" class="form-control" name="email" value="{{ Cookie::get('email') }}">
                        @else
                            <input type="email" class="form-control" name="email" value="{{ old('email')  }}">
                        @endif
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
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Email</label>
                    </div>
                    <div class="text-center mt-4 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                    <p class="text-center mt-3">Or</p>
                    <div class="text-center mt-2 d-grid gap-2">
                        <a href="/register" class="btn btn-outline-primary">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
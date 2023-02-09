<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-dark text-white card p-5">
                <h2 class="text-center mb-4">Your Profile</h2>
                <form>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                        <label class="mb-3 text-muted" for="name">Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                        <label class="mb-3 text-muted" for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" value="************" disabled>
                        <label class="mb-3 text-muted" for="password">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="address" disabled>{{ $user->address }}</textarea>
                        <label class="mb-3 text-muted" for="address">Address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" disabled>
                        <label class="mb-3 text-muted" for="phone">Phone</label>
                    </div>
                </form>
                <div class="mt-2 d-flex justify-content-end">
                    <a href="/users/{{$user->id}}/edit" class="btn btn-primary me-3">Update</a>
                    <form class="d-inline" method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-danger" type="submit">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
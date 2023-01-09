<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <h2 class="text-center mb-4">Your Profile</h2>
                <form>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="email">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="************" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="address">Address</label>
                        <textarea class="form-control" name="address" disabled>{{ $user->address }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" disabled>
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
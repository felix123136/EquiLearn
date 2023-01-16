<x-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Checkout</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0;
                @endphp
                @foreach($courses as $course)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{$course->picture}}" alt="{{$course->title}}" class="img-thumbnail cart-thumbnail me-3">
                            <p>{{ $course->name }}</p>
                        </div>
                    </td>
                    <td>IDR {{ $course->price }}</td>
                    <td>
                        <input
                            type="hidden"
                            name="courseId"
                            value="{{ $course->id }}"
                        />
                        <input
                            type="number"
                            name="quantity"
                            value="{{ $course->quantity }}"
                            class="form-control"
                            style="width:75px;"
                            disabled
                        />
                    </td>
                    <td>
                        IDR {{number_format($course->price * $course->quantity)}}
                    </td>
                </tr>
                @php
                    $grandTotal += $course->price * $course->quantity;
                @endphp
                @endforeach
            </tbody>
        </table>
        <div class="text-right mr-4 my-3 d-flex justify-content-between">
            <p>Ship to: {{auth()->user()->address}}</p>
            <p><strong>Grand Total: IDR {{ number_format($grandTotal) }}</strong></p>
        </div>
        <div class="row d-flex justify-content-end">
            <div class="col-md-5 mb-3">
                <small class="mb-5">Please enter the following passcode to checkout: {{$passcode}}</small>
                <form action="/checkout/confirm" method="POST">
                    @csrf
                    <input
                        type="text"
                        name="passcode"
                        value="{{ old('passcode') }}"
                        class="form-control mb-1"
                        required
                    />
                    @error('passcode')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
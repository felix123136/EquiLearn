<x-layout>
    <div class="container my-5 text-white" style="min-height:53vh;">
        <h2 class="text-center mb-4">Shopping Cart</h2>
        @if (count($courses) > 0)
        <table class="table table-striped text-white">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0;
                @endphp
                @foreach($courses as $course)
                <tr>
                    <form action="/cart/{{$course->id}}" method="POST">
                        @csrf
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{$course->picture}}" alt="{{$course->title}}" class="img-thumbnail cart-thumbnail me-3">
                                <p>{{ $course->name }}</p>
                            </div>
                        </td>
                        <td class="text-white">IDR {{number_format($course->price)}}</td>
                        <td>
                            <button type="submit" class="btn btn-danger">
                                Remove From Cart
                            </button>
                        </td>
                    </form>
                </tr>
                @php
                    $grandTotal += $course->price;
                @endphp
                @endforeach
            </tbody>
        </table>
        @else
        <p
            class="text-center d-flex justify-content-center"
            style="min-height: 49vh"
        >
            Your cart is empty.
        </p>
        @endif
        @if (count($courses) > 0)
        <div class="text-right mr-4 my-3 d-flex justify-content-between">
            <a href="/checkout" class="btn btn-primary">Checkout</a>
            <p><strong>Grand Total: IDR {{number_format($grandTotal)}}</strong></p>
        </div>
        @endif
    </div>
</x-layout>
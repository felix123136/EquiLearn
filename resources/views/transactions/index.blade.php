<x-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">My Transactions</h2>
        @if (count($transactions) > 0)
            @foreach($transactions as $transaction)
                <strong>Transaction Date: {{$transaction->created_at}}</strong>
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaction->courses as $course)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{$course->picture}}" alt="{{$course->title}}" class="img-thumbnail cart-thumbnail me-3">
                                    <p>{{ $course->name }}</p>
                                </div>
                            </td>
                            <td>IDR {{number_format($course->price)}}</td>
                            <td>{{ $course->quantity }}</td>
                            <td>IDR {{number_format($course->subtotal)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3 class="text-end"><strong>IDR {{number_format($transaction->grandTotal)}}</strong></h3>
            @endforeach
        @else
        <p
            class="text-center d-flex justify-content-center"
            style="min-height: 49vh"
        >
            You don't have any transaction
        </p>
        @endif
    </div>
</x-layout>
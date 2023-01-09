<x-layout>
    @error('quantity')
        @php
            Session::flash('error', $message);
        @endphp        
    @enderror
    <div class="container my-5" style="min-height:53vh;">
        <h2 class="text-center mb-4">Shopping Cart</h2>
        @if (count($products) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0;
                @endphp
                @foreach($products as $product)
                <tr>
                    <form action="/cart/{{$product->id}}" method="POST">
                        @csrf
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{$product->picture}}" alt="{{$product->title}}" class="img-thumbnail cart-thumbnail me-3">
                                <p>{{ $product->name }}</p>
                            </div>
                        </td>
                        <td>IDR {{number_format($product->price)}}</td>
                        <td>
                            <input
                                type="hidden"
                                name="productId"
                                value="{{ $product->id }}"
                            />
                            <input
                                type="number"
                                name="quantity"
                                value="{{ $product->quantity }}"
                                class="form-control"
                                style="width:75px;"
                            />
                        </td>
                        <td>
                            IDR {{number_format($product->price * $product->quantity)}}
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">
                                Update Cart
                            </button>
                        </td>
                    </form>
                </tr>
                @php
                    $grandTotal += $product->price * $product->quantity;
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
        @if (count($products) > 0)
        <div class="text-right mr-4 my-3 d-flex justify-content-between">
            <a href="/checkout" class="btn btn-primary">Checkout</a>
            <p><strong>Grand Total: IDR {{number_format($grandTotal)}}</strong></p>
        </div>
        @endif
    </div>
</x-layout>
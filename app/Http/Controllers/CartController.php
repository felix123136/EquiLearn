<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        $products = [];

        foreach ($cart as $productId => $id) {
            $product = Product::find($productId);
            $product->quantity = $id['quantity'];
            array_push($products, $product);
        }

        return view('cart.index', ['products' => $products]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:0', 'max:' . $product->stock],
        ]);

        $cart = session()->get('cart', []);
        if ($request->quantity == 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id]['quantity'] = $request->quantity;
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Shopping cart updated!');
    }

    public function checkout()
    {
        $cart = session('cart', []);

        $products = [];

        foreach ($cart as $productId => $id) {
            $product = Product::find($productId);
            $product->quantity = $id['quantity'];
            array_push($products, $product);
        }
        if (count($products) == 0) {
            return redirect('/cart');
        }

        $passcode = Str::random(6);
        session(['passcode' => $passcode]);
        return view('cart.checkout', [
            'products' => $products,
            'passcode' => $passcode
        ]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'passcode' => 'required'
        ]);

        $passcode = $request->input('passcode');

        if ($passcode != $request->session()->get('passcode')) {
            return back()->withErrors([
                'passcode' => 'The passcode you entered is incorrect.'
            ]);
        }

        $cart = session('cart', []);

        // Decrease the product's stock by the quantity in the cart.
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            $product->stock -= $item['quantity'];

            // Save to database
            $product->save();
        }

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        // Add the cart items to the transaction details
        foreach ($cart as $productId => $item) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->product_id = $productId;
            $transactionDetail->quantity = $item['quantity'];
            $transactionDetail->save();
        }

        Session::forget('cart');
        Session::forget('passcode');

        // Return to the homepage with a success message
        return redirect('/transactions')->with('message', 'Transaction success! You will receive our products soon! Thank you for shopping with us!');
    }
}

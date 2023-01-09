<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();

        // dd($transactions);

        foreach ($transactions as $transaction) {
            $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();
            $products = [];
            $grandTotal = 0;
            foreach ($transactionDetails as $transactionDetail) {
                $product = Product::find($transactionDetail->product_id);
                $product->quantity = $transactionDetail->quantity;
                $product->subtotal = $product->quantity * $product->price;
                $grandTotal += $product->subtotal;
                array_push($products, $product);
            }
            $transaction['grandTotal'] = $grandTotal;
            $transaction['products'] = $products;
        }
        return view('transactions.index', ['transactions' => $transactions]);
    }
}

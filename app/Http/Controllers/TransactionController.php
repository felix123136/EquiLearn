<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();

        foreach ($transactions as $transaction) {
            $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();
            $courses = [];
            $grandTotal = 0;
            foreach ($transactionDetails as $transactionDetail) {
                $course = Course::find($transactionDetail->course_id);
                $grandTotal += $course->price;
                array_push($courses, $course);
            }
            $transaction['grandTotal'] = $grandTotal;
            $transaction['courses'] = $courses;
        }
        return view('transactions.index', ['transactions' => $transactions]);
    }
}

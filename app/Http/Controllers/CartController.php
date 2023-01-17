<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

        $courses = [];

        foreach ($cart as $courseId => $id) {
            $course = Course::find($courseId);
            array_push($courses, $course);
        }

        return view('cart.index', ['courses' => $courses]);
    }

    public function delete(Request $request, Course $course)
    {
        $cart = session()->get('cart', []);
        unset($cart[$course->id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Course successfully removed!');
    }

    public function checkout()
    {
        $cart = session('cart', []);

        $courses = [];

        foreach ($cart as $courseId => $id) {
            $course = Course::find($courseId);
            array_push($courses, $course);
        }

        if (count($courses) == 0) {
            return redirect('/cart');
        }

        $passcode = Str::random(6);
        session(['passcode' => $passcode]);
        return view('cart.checkout', [
            'courses' => $courses,
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

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        // Add the cart items to the transaction details
        foreach ($cart as $courseId => $item) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->course_id = $courseId;
            $transactionDetail->save();
        }

        Session::forget('cart');
        Session::forget('passcode');

        // Return to the homepage with a success message
        return redirect('/transactions')->with('message', "Transaction completed! Enjoy your course and don't hesitate to reach out for support. Thank you for choosing us.");
    }
}

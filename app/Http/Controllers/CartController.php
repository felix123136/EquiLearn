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
            $course->quantity = $id['quantity'];
            array_push($courses, $course);
        }

        return view('cart.index', ['courses' => $courses]);
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:0', 'max:' . $course->stock],
        ]);

        $cart = session()->get('cart', []);
        if ($request->quantity == 0) {
            unset($cart[$course->id]);
        } else {
            $cart[$course->id]['quantity'] = $request->quantity;
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Shopping cart updated!');
    }

    public function checkout()
    {
        $cart = session('cart', []);

        $courses = [];

        foreach ($cart as $courseId => $id) {
            $course = Course::find($courseId);
            $course->quantity = $id['quantity'];
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

        // Decrease the course's stock by the quantity in the cart.
        foreach ($cart as $courseId => $item) {
            $course = Course::find($courseId);

            // Save to database
            $course->save();
        }

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        // Add the cart items to the transaction details
        foreach ($cart as $courseId => $item) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->course_id = $courseId;
            $transactionDetail->quantity = $item['quantity'];
            $transactionDetail->save();
        }

        Session::forget('cart');
        Session::forget('passcode');

        // Return to the homepage with a success message
        return redirect('/transactions')->with('message', 'Transaction success! You will receive our courses soon! Thank you for shopping with us!');
    }
}

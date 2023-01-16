<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::with('category')->latest()->filter(request(['search']))->paginate(12),
            'query' => request(['search'])
        ]);
    }

    public function show(Course $course)
    {
        $course = Course::with('category')->find($course->id);
        return view('courses.show', [
            'course' => $course
        ]);
    }

    // Show create form
    public function create()
    {
        return view('courses.create', [
            'categories' => Category::all()
        ]);
    }

    // Store Course Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required', 'min:15', 'max:500'],
            'category_id' => ['required'],
            'price' => ['required', 'integer', 'min:1000', 'max:10000000'],
            'picture' => ['required', 'mimes:jpeg,jpg,png']
        ]);
        $formFields['picture'] = $request->file('picture')->store('pictures', 'public');

        $formFields['picture'] = 'storage/' . $formFields['picture'];

        Course::create($formFields);

        return redirect('/courses')->with('message', 'Course added successfully');
    }

    // Show Edit Form
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
        ]);
    }

    // Update Course Data
    public function update(Request $request, Course $course)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required', 'min:15', 'max:500'],
            'category_id' => ['required'],
            'price' => ['required', 'integer', 'min:1000', 'max:10000000'],
            'picture' => ['required', 'mimes:jpeg,jpg,png']
        ]);

        $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        $formFields['picture'] = 'storage/' . $formFields['picture'];

        $course->update($formFields);

        return redirect('/courses')->with('message', 'Course updated successfully');
    }

    // Delete Listing
    public function delete(Course $course)
    {
        $course->delete();
        return redirect('/courses')->with('message', 'Course deleted successfully');
    }

    public function addToCart(Course $course)
    {
        $cart = session()->get('cart', []);
        $item = [
            'id' => $course->id,
            'quantity' => 1
        ];
        if (isset($cart[$course->id])) {
            $cart[$course->id]['quantity']++;
        } else {
            $cart[$course->id] = $item;
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Course added to cart!');
    }
}

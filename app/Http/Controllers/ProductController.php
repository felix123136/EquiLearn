<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::with('category')->latest()->filter(request(['search']))->paginate(12),
            'query' => request(['search'])
        ]);
    }

    public function show(Product $product)
    {
        $product = Product::with('category')->find($product->id);
        return view('products.show', [
            'product' => $product
        ]);
    }

    // Show create form
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }

    // Store Product Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required', 'min:15', 'max:500'],
            'category_id' => ['required'],
            'price' => ['required', 'integer', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'integer', 'min:1', 'max:10000'],
            'picture' => ['required', 'mimes:jpeg,jpg,png']
        ]);
        $formFields['picture'] = $request->file('picture')->store('pictures', 'public');

        $formFields['picture'] = 'storage/' . $formFields['picture'];

        Product::create($formFields);

        return redirect('/products')->with('message', 'Product added successfully');
    }

    // Show Edit Form
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    // Update Product Data
    public function update(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required', 'min:15', 'max:500'],
            'category_id' => ['required'],
            'price' => ['required', 'integer', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'integer', 'min:1', 'max:10000'],
            'picture' => ['required', 'mimes:jpeg,jpg,png']
        ]);

        $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        $formFields['picture'] = 'storage/' . $formFields['picture'];

        $product->update($formFields);

        return redirect('/products')->with('message', 'Product updated successfully');
    }

    // Delete Listing
    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/products')->with('message', 'Product deleted successfully');
    }

    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);
        $item = [
            'id' => $product->id,
            'quantity' => 1
        ];
        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['quantity'] >= $product->stock) {
                session()->flash('error', 'The requested quantity exceeds the current stock.');
                return redirect()->back();
            }
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = $item;
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Product added to cart!');
    }
}

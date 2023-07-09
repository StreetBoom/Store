<?php

namespace App\Http\Controllers;

use App\Filter\ProductFilter;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(9)->withQueryString();


        return view('products.index', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }

    public function home()
    {
        return view('welcome');

    }


    public function filterByCategory(Request $request)
    {
        $categories = Category::all();
        $category = Category::findOrFail($request->input('category'));
        $products = $category->products;

        return view('products.index', compact('products','categories'));
    }


    public function show(Product $product)
    {
        $products = Product::all();
//        $comments = $product->comments();
        $comments = Comment::with('user')->latest()->get();
        return view('products.show', [
            'product' => $product,
            'products' => $products,
            'comments' => $comments,

        ]);
    }





}

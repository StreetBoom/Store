<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'nameUser' => 'required|string|max:255',
            'emailUser' => 'required|email|max:255',

        ]);


        $order = Order::updateOrCreate($validatedData);
        $order->products()->attach($data);
        return redirect('/product')->with('success', 'Заказ успешно оформлен!');
    }

    public function basket()
    {
        $order = auth()->user()->order;
        $products = [];
        foreach($order->products as $product) {
            $products[] = $product;
        }
        return view('order.basket', [
            'products' => $products
        ]);

    }




}

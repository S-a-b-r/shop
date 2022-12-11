<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\AddProductRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductsOrder;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all()->sortBy('status');
        return view('order.index', compact('orders'));
    }

    public function create(){
        $users = User::all();
        return view('order.create', compact('users'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        Order::firstOrCreate($data);
        return redirect()->route('orders.index');
    }

    public function addProductView(Order $order){
        $products = Product::all();
        return view('order.add_product', compact('order', 'products'));
    }

    public function addProduct(AddProductRequest $request){
        $data = $request->validated();
        $quantity = $data['quantity'];
        $product = Product::find($data['id_product']);
        $product->update(['quantity' => $product->quantity - $quantity]);
        ProductsOrder::firstOrCreate($data);
        return redirect()->route('orders.index');
    }

    public function edit(Order $order){
        $users = User::all();
        return view('order.edit', compact('order', 'users'));
    }

    public function update(Order $order, UpdateRequest $request){
        $data = $request->validated();
        $order->update($data);
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect()->route('orders.index');
    }
}

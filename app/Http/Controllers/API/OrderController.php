<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Http\Requests\Order\AddProductRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductsOrder;

class OrderController extends Controller
{
    public function setOrder(OrderRequest $request){
        $data = $request->validated();
        $products = $data['products'];
        unset($data['products']);
        $order = Order::firstOrCreate($data);
        foreach ($products as $product){
            ProductsOrder::firstOrCreate(['id_order'=>$order->id, 'id_product'=>$product['id'], 'quantity' => $product['quantity']]);
        }
        return json_encode(['id' => $order->id]);
    }

    public function getOrders(){
        $orders = Order::where('id_user',auth()->user()->id)->get();
        return OrderResource::collection($orders);
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        Order::firstOrCreate($data);
        return redirect()->route('orders.index');
    }

    public function addProduct(AddProductRequest $request){
        $data = $request->validated();
        $quantity = $data['quantity'];
        $product = Product::find($data['id_product']);
        $product->update(['quantity' => $product->quantity - $quantity]);
        ProductsOrder::firstOrCreate($data);
        return redirect()->route('orders.index');
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
